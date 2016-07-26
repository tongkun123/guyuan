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
    //获取用户登录后的信息对象
    function getUser()
    {
        $get_coookie=$_COOKIE['userin'];
        if (!$get_coookie) return false;
        $get_user_log=unserialize($get_coookie);
        if (!$get_user_log) return false;
        if ($get_user_log->user_id && intval($get_user_log->user_id)>0)
        {
            return $get_user_log;
        }
        return false;
    }
    function isLogin()
    {
        if ($this->getUser())
        {
            return true;
        }
        return false;
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
                    $this->actionInfo='echo "登录成功";';
                    $user_log = new \stdClass();
                    $user_log->user_id = $result[0]["user_id"];
                    $user_log->user_name = $getUsername;
                    setcookie("userin",serialize($user_log),time()+3600,"/");
                    if (I("get.from")!="")
                    {
                        $this->actionInfo="gotoUrl('".I("get.from")."');";
                    }
                    else
                    {
                        $this->actionInfo="header('location:/Home/index');";
                    }

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