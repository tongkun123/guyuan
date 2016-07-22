<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/19
 * Time: 13:57
 */
function get_navbar()
{
    $navbar = M("navbar");
    $ret = $navbar->where("nav_isshow=1")->order("nav_index")->select();
    return $ret;
}