<?php namespace Core\meetmeapi;

/* 
 * Copyright 2014 Core Tech Labs, Inc
 * Author: Rudy Jessop
 * Author URL: http://rudyjessop.com
 * Core Tech Labs, Inc is the sole owner of this software. No distribution no rediting without written concent.
 */

use Illuminate\Support\ServiceProvider;

class meetmeServiceProvider extends ServiceProvider{
    
    protected $defer = true;
   
    // registering service provider    
    public function register(){
        $this->app['MeetUpMe'] = $this->app->share(function($app){
            return new \Core\meetmeapi\meetmeConfig;
        });
    }
    
    
    public function boot(){
        $this->package('Core/meetmeapi', 'Core/meetmeapi');
    }


    // Get Service Provided by provider
    public function provides() {
        return array('MeetUpMe');
    }

}//Class end;