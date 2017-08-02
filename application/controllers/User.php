<?php

class UserController extends BaseController {
    public function init(){
    	parent::init();
    }

    //用户中心
    public function indexAction(){
        if(!$this->isLogin()){
            $this->redirect("/user/login");
        }
        
        $usermodel = new UserModel;
        $this->getView()->assign("username", $usermodel->getUsername());
        
        $this->display('../public/header');
        $this->display('index');
        $this->display('../public/footer');
        //echo "user index";
    }
    
    //登陆界面
    public function loginAction(){
   	    $this->display('../public/header');
        $this->display('login');
        $this->display('../public/footer');
    }

    //登陆操作
    public function dologinAction(){

        $status = array('state'=>1, 'msg'=>'');

        $usermodel = new UserModel;
        $status['state'] = $usermodel->login($_POST['username'], $_POST['password']);

        if($status['state'] > 0){
            $status['msg'] = '登陆成功';
        }
        else if($status['state'] == -1){
            $status['msg'] = '用户不存在';
        }
        else if($status['state'] == -2){
            $status['msg'] = '密码不正确';
        }
        else{
            $status['msg'] = '未知错误';
        }

        echo $status['msg'];
        
        if($status['state'] == 1){
            $this->redirect("/user/index");
        }

        return $status;
    }
    
    //注册界面
    public function registerAction(){

   	    $this->display('../public/header');
        $this->display('register');
        $this->display('../public/footer');
    }

    //注册操作
    public function doregisterAction(){

        $status = array('state'=>1, 'msg'=>'');

        $usermodel = new UserModel;

        $status['state'] = $usermodel->Insert($_POST['username'], $_POST['password'], $_POST['repassword']); 
        
        if($status['state'] > 0){
            $status['msg'] = '注册成功';
        }
        else if($status['state'] == -1){
            $status['msg'] = '用户名长度不正确';
        }
        else if($status['state'] == -2){
            $status['msg'] = '密码长度不正确';
        }
        else if($status['state'] == -3){
            $status['msg'] = '两次密码不一致';
        }
        else if($status['state'] == -4){
            $status['msg'] = '用户已存在';
        }
        else{
            $status['msg'] = '未知错误';
        }

        if($status['state'] == 1){
            $this->redirect("/user/index");
        }

        echo $status['msg'];
        
        return $status;
    }

    public function logoutAction(){
        $usermodel = new UserModel;
        $usermodel->logout();
        $this->redirect("/user/login");
    }
}