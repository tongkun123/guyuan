<?php
namespace Home\Controller;

use Home\API\UserAPI;
use Think\Controller;

class TempController extends Controller
{
    public function test()
    {
        $key="123";
        $str="MDAwMDAwMDAwMH-Ee92wfYtk";
        echo think_decrypt($str,$key);
        //echo think_encrypt("123456",$key);

    }

    public function valiCode()
    {
        $config =    array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $Verify =     new \Think\Verify($config);
        $Verify->entry();
    }
}