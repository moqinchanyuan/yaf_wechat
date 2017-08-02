<?php
define("APP_PATH",  realpath(dirname(__FILE__) . '/../')); /* 指向public的上一级 */
$app  = new Yaf_Application(APP_PATH . "/conf/application.ini");

$app->bootstrap() //选择性调用，调用APP_PATH目录下的Bootstrap.php
    ->run();
