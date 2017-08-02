<?php
class RegisterController extends BaseController {
    public function init(){
    	parent::init();

    	echo "Register init";
    }

    public function indexAction() {
   	    $this->display('../public/header');
        $this->display('index');
        $this->display('../public/footer');
        return false;
    }

    public function dorigisterAction(){
    	
    	return false;
    }
}




