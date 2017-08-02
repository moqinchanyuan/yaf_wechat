<?php

use Illuminate\Database\Capsule\Manager as DB;

class UserModel extends BaseModel
{
    protected $table = 'user';
    public $timestamps = false;

    public function __construct(){}
    
    //插入
	public function Insert($username, $password, $repassword){
        
        //用户名长度不正确
		if(strlen($username) < 3 || strlen($username) > 32){
			return -1;
		}

        //密码长度不正确
        if(strlen($password) < 3 || strlen($password) > 32){
        	return -2;
        }
   
        //两次密码不一致
        if($password != $repassword){
        	return -3;
        }
        
        //用户已存在
        $res = $this->where('username', $username)->first();
        if($res){
        	return -4;
        }

        $this->salt = substr(md5($username),0,4);

        $this->username = $username;
        $this->password = md5(md5($password).$this->salt);
        
        $this->save();

        
        Yaf_Session::getInstance()->set('username', $username);

        return 1;
	}
    
    //登陆
    public function login($username, $password){
        $res = $this->where('username', $username)->first();
        
        //用户不存在
        if(!$res){
            return -1;
        }
         
        //密码不正确
        $pwd = md5(md5($password).$res['salt']);

        if($pwd != $res['password']){
            return -2;
        }

        Yaf_Session::getInstance()->set('username', $res['username']);

        return 1;
    }

    //注册
    public function logout(){
        Yaf_Session::getInstance()->del('username');
    }

    public function getUsername(){
        return Yaf_Session::getInstance()->get('username');
    }
}