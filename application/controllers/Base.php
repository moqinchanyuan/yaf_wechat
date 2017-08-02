<?php
class BaseController extends Yaf_Controller_Abstract {
    public function init(){
    	// echo "base init <br />";
    }

    public function isLogin(){
    	$has = Yaf_Session::getInstance()->has('username');
    	return $has;
    }
}
?>
