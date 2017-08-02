<?php
class IndexController extends BaseController {
    public function init(){
    	parent::init();

    	echo "index init";
    }

    public function indexAction() {//默认Action
        $this->getView()->assign("content", "Hello World");
        $this->display('../public/header');
        $this->display('index');
        $this->display('../public/footer');
        return false;
    }
 
    public function index2Action() {
        $router = Yaf_Dispatcher::getInstance()->getRouter();
        var_dump($router);     
    }
}
?>
