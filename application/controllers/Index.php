<?php

class IndexController extends BaseController {
    public function init(){
    	parent::init();
    }

    public function indexAction() {
        
        // $usermodel = new UserModel;
        // $user = $usermodel->where(array('username'=>'molaifeng1'))->get();

        // var_dump($user);

        $this->getView()->assign("content", "Hello World");
        $this->display('../public/header');
        $this->display('index');
        $this->display('../public/footer');
    }
 
    public function index2Action() {
        $router = Yaf_Dispatcher::getInstance()->getRouter();
        var_dump($router);     
    }
}
?>
