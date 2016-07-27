<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/21
 * Time: 15:15
 */
namespace Home\API;
use Home\Lib\PasswordHash;

class UserAPI
{
    public $actionInfo;
    function __construct()
    {
        //echo "我是UserAPI";
    }
    function reg()
    {
        $getUsername =  I("post.txtUsername","","/^\w{6,20}$/");
        $getUserpwd = I("post.txtPwd","","/^\w{6,20}$/");
        if ($getUsername==""||$getUserpwd=="")
        {
            $this->actionInfo='$this->assign("errorInfo","注册失败：用户名密码格式不正确");';
            return;//下面的程序不运行
        }
        $ph=new PasswordHash(8, false);
        $user=D("User");
        try
        {
            $user->user_name=$getUsername;
            $user->user_pwd=$ph->HashPassword($getUserpwd);
            $user->startTrans();
            $user_id=$user->add();
            if ($user_id)
            {
                $muer=M("user_meta");
                $muer->user_id=$user_id;
                $muer->umeta_key="reg_dae";
                $muer->umeta_value=date('Y-m-d H:i:s');
                $ret=$muer->add();
                if ($ret)
                {
                    $user->commit();
                    $this->actionInfo="header('location:/Home/index');";
                    return;
                }
                else
                {
                    $user->rollback();
                    $this->actionInfo='$this->assign("errorInfo","属性表插入失败");';
                    return;//下面的程序不运行
                }
            }
            else
            {

                $this->actionInfo='$this->assign("errorInfo","用户主表插入失败");';
                return;//下面的程序不运行
            }
        }
        catch (\Think\Exception $ex)
        {
            $user->rollback();
            $this->actionInfo='$this->assign("errorInfo","用户名被占用");';
            return;//下面的程序不运行
        }

    }
    //获取用户登录后的信息对象
    function getUser()
    {
        $get_coookie=$_COOKIE['userin'];
        $get_coookie=think_decrypt($get_coookie,C("ENCRYPT_KEY"));
        if (!$get_coookie ||$get_coookie=="") return false;
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
        $getCode = I("post.txtCode","");

        if ($getUsername==""||$getUserpwd=="")
        {
            $this->actionInfo='$this->assign("errorInfo","用户名密码格式不正确");';
            return;//下面的程序不运行
        }
        else
        {
            $verify = new \Think\Verify();
            if (!$verify->check($getCode))
            {
                $this->actionInfo='$this->assign("errorInfo","验证码错误");';
                return;//下面的程序不运行
            }

            $result = M("user")->where("user_name='".$getUsername."'")->limit(1)->select();
            if ($result && count($result)==1)
            {
                $user_pwd=$result[0]["user_pwd"];
                $ph=new PasswordHash();
                if($ph->CheckPassword($getUserpwd,$user_pwd ))
                {
                    $this->actionInfo='echo "登录成功";';
                    $user_log = new \stdClass();
                    $user_log->user_id = $result[0]["user_id"];
                    $user_log->user_name = $getUsername;
                    setcookie("userin",think_encrypt(serialize($user_log),C("ENCRYPT_KEY")),time()+3600,"/");
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