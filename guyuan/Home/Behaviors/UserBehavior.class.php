<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/20
 * Time: 16:28
 */
namespace Home\Behaviors;
use Home\API\UserAPI;
use Think\Cache;

class UserBehavior extends \Think\Behavior{
    //行为执行入口
    public function run(&$param){
        
        $user = new UserAPI();
        $get_login_config=C("need_login");
        
        if (array_key_exists(CONTROLLER_NAME, $get_login_config) &&
            in_array(ACTION_NAME , $get_login_config[CONTROLLER_NAME]))
        {
            echo "这个页面需要登录";
        }

        if (!$user->isLogin())
        {
            //echo "用户没有登录";
        }
    }
}