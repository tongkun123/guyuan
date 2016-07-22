<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/19
 * Time: 17:07
 */

namespace Home\Widget;
use Think\Controller;
class NavWidget extends Controller {
    public function def(){
        $navbar = M("navbar");
        $ret = $navbar->where("nav_isshow=1")->order("nav_index")->select();
        return $ret;
    }
}