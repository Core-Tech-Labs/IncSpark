<?php


class EventsController extends BaseController{
    
    // Page setup
    public function eventsPage(){
        return View::make('event.EventsIndex');
    }
    
    // API For events from other sources.
    public function eventSets(){
        
    }
    
}