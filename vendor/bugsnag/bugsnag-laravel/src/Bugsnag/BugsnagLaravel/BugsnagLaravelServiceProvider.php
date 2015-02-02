<?php namespace Bugsnag\BugsnagLaravel;

use Illuminate\Support\ServiceProvider;

class BugsnagLaravelServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('bugsnag/bugsnag-laravel', 'bugsnag');

        $app = $this->app;

        // Register for exception handling
        $app->error(function (\Exception $exception) use ($app) {
            if ('Symfony\Component\Debug\Exception\FatalErrorException'
                !== get_class($exception)
            ) {
                $app['bugsnag']->notifyException($exception);
            }
        });

        // Register for fatal error handling
        $app->fatal(function ($exception) use ($app) {
            $app['bugsnag']->notifyException($exception);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('bugsnag', function ($app) {
            $config = $app['config']['bugsnag'] ?: $app['config']['bugsnag::config'];

            $client = new \Bugsnag_Client($config['api_key']);
            $client->setStripPath(base_path());
            $client->setProjectRoot(app_path());
            $client->setAutoNotify(false);
            $client->setBatchSending(false);
            $client->setReleaseStage($app->environment());
            $client->setNotifier(array(
                'name'    => 'Bugsnag Laravel',
                'version' => '1.2.1',
                'url'     => 'https://github.com/bugsnag/bugsnag-laravel'
            ));

            if (isset($config['notify_release_stages']) && is_array($config['notify_release_stages'])) {
                $client->setNotifyReleaseStages($config['notify_release_stages']);
            }

            if (isset($config['endpoint'])) {
                $client->setEndpoint($config['endpoint']);
            }

            if (isset($config['filters']) && is_array($config['filters'])) {
                $client->setFilters($config['filters']);
            }

            if (isset($config['proxy']) && is_array($config['proxy'])) {
                $client->setProxySettings($config['proxy']);
            }

            // Check if someone is logged in.
            if ($app['auth']->check()) {
                // User is logged in.
                $user = $app['auth']->user();

                // If these attributes are available: pass them on.
                $client->setUser(array('id' => $user->getAuthIdentifier()));
            }

            return $client;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array("bugsnag");
    }
}
