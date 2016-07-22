<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/21
 * Time: 15:15
 */
namespace Home\API;
class UserAPI
{
    public $actionInfo;
    function __construct()
    {
        //echo "我是UserAPI";
    }
    function login()
    {
        $getUsername =  I("post.txtUsername","","/^\w{6,20}$/");
        $getUserpwd = I("post.txtPwd","","/^\w{6,20}$/");
        if ($getUsername==""||$getUserpwd=="")
        {
            $this->actionInfo='$this->assign("errorInfo","用户名密码格式不正确");';
            return;//下面的程序不运行
        }
        else
        {
            $result = M("users")->where("user_name='".$getUsername."'")->limit(1)->select();
            if ($result && count($result)==1)
            {
                $user_pwd=$result[0]["user_pwd"];
                if(md5($getUserpwd)==$user_pwd)
                {
                    echo "登录成功";
                    return;
                }
                else
                {
                    $this->actionInfo='$this->assign("errorInfo","用户名密码不正确");';
                    return;
                }
            }
            else
            {
                $this->actionInfo='$this->assign("errorInfo","用户名不存在");';
                return;
            }
        }
    }
}