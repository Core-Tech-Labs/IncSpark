<?php ;

use Eloquent;

class Profile extends Eloquent {
        
        public function user(){
            return $this->profile('User');
        }

}