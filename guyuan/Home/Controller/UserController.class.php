<?php
namespace Home\Controller;
use Home\API\UserAPI;
use Home\Lib\PasswordHash;
use Think\Controller;

class UserController extends Controller {
    public function reg()
    {
        //用户注册
        if ($_POST)
        {
            $userAPI=new UserAPI();
            $userAPI->reg();

            if ($userAPI->actionInfo!="")
            {
                eval($userAPI->actionInfo);
            }
        }

        $this->theme("5000")->display();
    }
    public function login(){
        if($_POST)
        {
            $userAPI=new UserAPI();
            $userAPI->login();

            if ($userAPI->actionInfo!="")
            {
                eval($userAPI->actionInfo);
            }
        }
        else
        {
            //setcookie("myname","tongkun",time()+20,"/");
            //echo $_COOKIE["myname"];
            
        }

        $this->theme("5000")->display();
    }

}