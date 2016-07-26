<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/19
 * Time: 13:57
 */
/*
 * 跳转地址安全防护
 */
function gotoUrl($url)
{
    //允许localhost www.baidu.com
    $url=trim($url);
    if (preg_match("/^http/i",$url))
    {
        if (preg_match("/^http:\/\/(localhost)|(www\.baidu\.com)/i",$url))
        {
            redirect($url);
        }
        else
        {
            redirect("/Home/index");
        }
    }
    else
    {
        redirect($url);
    }
}
function get_navbar()
{
    $navbar = M("navbar");
    $ret = $navbar->where("nav_isshow=1")->order("nav_index")->select();
    return $ret;
}