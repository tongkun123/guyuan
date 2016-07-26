<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/26
 * Time: 17:04
 */
namespace Home\Behaviors;
use Think\Controller;
class BaseBehavior extends Controller
{
    function __construct()
    {
        parent::__construct();
        $get_do = trim(I("get.do"));
        if ($get_do!="")
        {
            method_exists($this,$get_do ) && $this->$get_do();
        }
    }
    function logout()
    {
        setcookie("userin",null,time()-3600,"/");
        redirect('/Home/index' , 1, '注销成功...');
        exit();
    }
}