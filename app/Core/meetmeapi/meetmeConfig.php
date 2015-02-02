<?php namespace Core\meetmeapi;

/* 
 * Copyright 2014 Core Tech Labs, Inc
 * Author: Rudy Jessop
 * Author URL: http://rudyjessop.com
 * Core Tech Labs, Inc is the sole owner of this software. No distribution no rediting without written concent.
 */

use meetme;


class meetmeConfig{
    
    
    private $default;
    
    public function __construct($config = array()) {
        $this->default = array();
        
        $this->default['consumer_key']          = meetme::get('Core/meetmeapi::CONSUMER_KEY');
        $this->default['consumer_secret']       = meetme::get('Core/meetmeapi::CONSUMER_SECRET');
        $this->default['token']                 = meetme::get('Core/meetmeapi::ACCESS_TOKEN');
        $this->default['secret']                = meetme::get('Core/meetmeapi::ACCESS_TOKEN_SECRET');
        
        if (Session::has('access_token')){
            
            $access_token = Session::get('access_token');
            
            if(is_array($access_token) && isset($access_token['oauth_token']) && isset($access_token['oauth_token_secret']) && !empty($access_token['oauth_token']) && !empty($access_token['oauth_token_secret'])){
                
                $this->default['token']     = $access_token['oauth_token'];
                $this->default['secret']    = $access_token['oauth_token_secret'];
            }
        }//if Session statement end;
        $this->default['use_ssl']          = meetme::get('Core/meetmeapi::USE_SSL');
        $this->default['user_agent']       = 'TW-L4' .parent::VERSION;
        
        $config = array_merge($this->default, $config);
        
        parent::__construct($config);
        
    }//public function __construct end;
    
    public function set_new_config($config){
            //
            $config = array_merge($this->default, $config);
            parent::reconfigure($config);
    }//public function set_new_config end;
    
    function getRequestToken($auth_callback = NULL){
        $parameter = array();
        if(!empty($oauth_callback)){
            $parameters['oauth_callback'] = $oauth_callback;
        }
        parent::request('GET', parent::url(meetme:get('Core/meetmeapi::REQUEST_TOKEN_URL'), ''), $parameters);
        
        $response = $this->response;
        if(isset($response['code']) && $response['code'] == 200 && !empty($response)){
            $get_parameters = $response['response'];
            $token = array();
            parse_str($get_parameters, $token);
        }
        
        if(isset($token['oauth_token'], $token['oauth_token_secret']) ){
            return $token;
        }
        else{
            return FALSE;
        }
        
    }// function getRequestToken end;
    
    function getAccessToken($oauth_verifier = FALSE){
        $parameters = array();
        if(!empty($oauth_verifier)){
            $parameters['oauth_verifier'] = $oauth_verifier;
        }
        
        parent::request('GET', parent::url(meetme:get('Core/meetmeapi::ACCESS_TOKEN_URL'), ''), $parameters);
        
        $response = $this->response;
        if(isset($response['code']) && $response['code'] == 200 && !empty($response)){
            $get_parameters = $response['response'];
            $token = array();
            parse_str($get_parameters, $token);
        }
        
        return FALSE;
    }//function getAccessToken end;
    
    function getAuthorizeURL($token, $sign_in_with_meetup = TRUE, $force_login = FALSE){
        if (is_array($token)){
            $token = $token['oauth_token'];
        }
        if ($force_login){
            return meetme:get('Core/meetmeapi::AUTHENTICATE_URL') . "?oauth_token={$token}&force_login=true";
        }
        else if(empty ($sign_in_with_meetup)){
            return meetme::get('Core/meetmeapi::AUTHORIZE_URL') . "oauth_token={$token}";
        }
        else{
            return meetme::get('Core/meetmeapi::AUTHENTICATE_URL') . "?oauth_token={$token}";
        }
    }
    
    public function query($name, $requestMethod = 'GET', $parameters = array(), $multipart = false){
        parent::user_request(array(
           'method'     =>$requestMethod,
           'url'        => parent::url(meetme::get('Core/meetmeapi::API_VERSION').'/'.$name),
           'params'     => $parameters,
           'multipart'  => $multipart
        ));
        
        $response = $this->response;
        
        $format = 'object';
        if(isset($parameters['format'])){
            $format = $parameters['format'];
        }
        
        switch ($format){
            default :
                case 'object' : $response = json_decode($response['response']);
                break;
                case 'json' : $response = $response['response'];
                break;
                case 'array' : $response = json_decode($response['response'], true);
                break;
        }
        return $response;
    }
    
    public function linkify($meetup){
        $meetup = '' .$meetup;
        
        $pattern               = array();
        $patterna['url']        = '(?xi)\b((?:https?://|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))';
        // Track one
        
        
        // Setup code
        $pattern = '(?xi)\b((?:https?://|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))';
        $meetup = preg_replace_callback('/'.$patterna['url'].'2/', function($matches){
            
            $input = $matches[0];
            $url = preg_match('!^https?://!i', $input) ? $input : "http://$input";
            
            return '<a href="'.$url.'" target="_blank" rel="nofollow">'.$input."</a>";
        },$meetup);
        
        $meetup = preg_replace('/'.$patterna['url'].'/i', "<a href=\"https://meetup.com/\\1\" target=\"_blank\">\\1</a>", $meetup);
        
        
        // Push function response.
        return trim($meetup);
    }
    
    public function linkEvent($event){
        return '//api.meetup.com/2/events/' . (is_object($event) ? $event->event_name : $event);
    }
    
    public function linkEventTime($eventTime){
        return '//api.meetup.com/2/events/' . (is_object($eventTime) ? $eventTime->event_time : $eventTime);
    }
    
    public function linkLocation($eventLocation){
        return '//api.meetup.com/2/events/' . (is_object($eventLocation) ? $eventLocation->event_Location : $eventLocation);
    }
    
    public function linkImage($eventImage){
        return '//api.meetup.com/2/events/' . (is_object($eventImage) ? $eventImage->event_Location : $eventImage);
    }
    
    
}//Class end;