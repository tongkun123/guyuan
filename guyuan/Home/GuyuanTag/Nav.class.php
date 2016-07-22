<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/20
 * Time: 14:19
 */
namespace Home\GuyuanTag;
use Think\Template\TagLib;
class Nav extends TagLib
{
    // 标签定义
    protected $tags = array(
        "load" => array()
    );
    function _load($tag,$content)
    {
        $str = '<?php ';
        $str .= 'echo "aaa"; ';
        $str .= '?>';

        return $str;
    }
}