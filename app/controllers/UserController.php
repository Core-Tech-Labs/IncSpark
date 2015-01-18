<?php

class UserController extends BaseController{
    
    /*
     * Build User Profile page
     */
    
    public function fbIdUser(){
         $data = array();
            
            if(Auth::check()){
               $data = Auth::User();
            }
            
	return View::make('user.UserIndex', array('data'=>$data));
    }
    
    
    /*
     * --------
     * 
     */
    
    public function userPage(){
        $code = input::get('code');
    if (strlen($code) == 0) return Redirect::away('/')->with('error_message', 'There was an error in communicating with facebook');
    
    $facebookURL = new Facebook(Config::get('facebook'));
    $uid = $facebookURL->getUser();
    
    if($uid == 0 ) return Redirect::away('/')->with('error_message', 'There was an error');
   
    $us = $facebookURL->api('/{id}');
    
    
    $profile = Profile::uniqueUser($uid)->$first();
    if(empty($profile)){
        
        $user = new User;
        $user->name = $us['first_name'].' '.$us['last_name'];
        $user->email = $us['email'];
        $user->photo = 'https://graph.facebook.com/'.$us['username'].'/picture?type=large';
        
        $user->save();
        
        $profile = new Profile();
        $profile->uid = $uid;
        $profile->username = $us['username'];
        $profile = $user->Profiles()->save($profile);
    }
    
    $profile->access_token = $facebookURL->getAccessToken();
    $profile->save();
    
    $user = $profile->user;
    
    Auth::login($user);
    
    return Redirect::away('/')->with('success_essage', 'Login Was Successful');
      
    }
    
    /*
     *  ----
     */
    
    public function fbUserLogedin(){
        $facebookURL = new Facebook(Config::get('facebook'));
        $params = array(
            'redirect_url' => url('/login/fb/callback'),
            'scope'        => 'email',
         );
    return Redirect::to($facebookURL->getLoginUrl($params));
    }
    
    
    // Logout Controller Reference Route::get('/' 'UserControler@fbUserLogout');
    public function fbUserLogout(){
        Auth::Logout();
        return Redirect::to('/');
    }
    
    
}
