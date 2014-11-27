<?php

class UserController extends BaseController{
    
    public function userPage(){
        return View::make('user.UserIndex');
    }
}
