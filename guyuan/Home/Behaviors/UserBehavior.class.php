<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/20
 * Time: 16:28
 */
namespace Home\Behaviors;
use Home\API\UserAPI;
use Think\Controller;

class UserBehavior extends BaseBehavior{
    //行为执行入口
    public function run(&$param){
        //setcookie("userin",null,time()-3600,"/");
      
        $user = new UserAPI();
        $get_login_config=C("need_login");
        
        if (array_key_exists(CONTROLLER_NAME, $get_login_config) &&
            in_array(ACTION_NAME , $get_login_config[CONTROLLER_NAME]) && !$user->isLogin())
        {
            //echo "这个页面需要登录";
            //$this->error('这个页面需要登录','/Home/login');
            redirect('/Home/login?from='.urldecode(__SELF__) , 1, '页面跳转中...');
            exit();
        }
        if ($user->isLogin())
        {
            $this->assign("global_user",$user->getUser());
        }
        
    }
}