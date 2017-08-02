<?php
class LoginController extends BaseController {
    public function init(){
    	parent::init();

    	echo "Login init";
    }

    public function indexAction() {
   	    $this->display('../public/header');
        $this->display('index');
        $this->display('../public/footer');
        return false;
    }

    public function dologinAction(){
    	
    	return false;
    }
}




