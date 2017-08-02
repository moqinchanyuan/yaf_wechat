<?php

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */

class Bootstrap extends Yaf_Bootstrap_Abstract{
	//加载第三方类库
	public function _initLoader()
    {
    	//Yaf_Loader::import 返回是否加载成功 bool
        Yaf_Loader::import(APP_PATH . "/vendor/autoload.php");  
    }

    //初始化配置
    public function _initConfig() {
        $config = Yaf_Application::app()->getConfig();
        Yaf_Registry::set("config", $config);
        Yaf_Dispatcher::getInstance()->autoRender(false);  // 关闭自动加载模板  
    }

    public function _initDefaultName(Yaf_Dispatcher $dispatcher) {
        $dispatcher->setDefaultModule("Index")->setDefaultController("Index")->setDefaultAction("index");
    }
    
    //载入数据库ORM
    public function _initDatabaseEloquent()
    {
        $capsule = new Capsule;

        // 创建默认链接
        $capsule->addConnection(Yaf_Application::app()->getConfig()->database->toArray());

        // 设置全局静态可访问
        $capsule->setAsGlobal();

        // 启动Eloquent
        $capsule->bootEloquent();

    }
    
}
