<?php namespace Core\meetmeapi\Facades;

/* 
 * Copyright 2014 Core Tech Labs, Inc
 * Author: Rudy Jessop
 * Author URL: http://rudyjessop.com
 * Core Tech Labs, Inc is the sole owner of this software. No distribution no rediting without written concent.
 */

use Illuminate\Support\Facades\Facade;

class meetupFacades extends Facade{
    protected static function getFacadeAccessor() {
        return 'MeetMeUp';
    }
}
