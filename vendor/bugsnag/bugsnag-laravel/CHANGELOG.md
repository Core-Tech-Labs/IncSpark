Changelog
=========

1.2.1
-----
-   Protect against missing configuration variables (thanks @jasonlfunk!)

1.2.0
-----
-   Update `bugsnag-php` dependency to enable support for code snippets on
    your Bugsnag dashboard
-   Allow configuring of more Bugsnag settings from your `config.php`
    (thanks @jacobmarshall!)

1.1.1
-----
-   Fix issue where sending auth information with complex users could fail (thanks @hannesvdvreken!)

1.1.0
-----
-   Send user/auth information if available (thanks @hannesvdvreken!)

1.0.10
------
-   Laravel 5 support

1.0.9
------
-   Split strip paths from `inProject`

1.0.8
-----
-   Bump the bugsnag-php dependency to include recent fixes

1.0.7
-----
-   Fix major notification bug introduced in 1.0.6

1.0.6
-----
-   Fix incompatibility with PHP 5.3

1.0.5
-----
-   Identify as Laravel notifier instead of PHP

1.0.4
-----
-   Allow configuration of notify_release_stages from config file

1.0.3
-----
-   Fix bug when setting releaseStage in the ServiceProvider

1.0.2
-----
-   Fix laravel requirement to work with 4.1
-   Add a `Bugsnag` facade for quick access to $app["bugsnag"]

1.0.1
-----
-   Fixed fatal error handling
-   Set release stage based on laravel's `App::environment` setting

1.0.0
-----
-   Initial release
