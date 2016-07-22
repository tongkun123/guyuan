<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/20
 * Time: 16:28
 */
namespace Home\Behaviors;
class NavBehavior extends \Think\Behavior{
    //行为执行入口
    public function run(&$param){
        echo "我的钩子";
    }
}