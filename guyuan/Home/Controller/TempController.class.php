<?php
namespace Home\Controller;

use Home\API\UserAPI;
use Think\Controller;
use Think\Model;

class TempController extends Controller
{
    public function test()
    {
        /*$m=new Model();
        $ret=$m->table("5000_info a") ->join("5000_info_meta b on a.info_id=b.info_id","left")
            ->where("a.info_type=1")->field("a.*,b.im_key,b.im_value")->order("a.info_id desc")->count();*/
        /*$ret=$m->query('SELECT * FROM 5000_info a, 5000_info_meta b WHERE a.info_id=b.info_id');*/
        $m=M("info");
        $count=$m->where("info_type=1")->count();

        $Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //$show       = $Page->show();// 分页显示输出
        $Page->setConfig('next','下一页');

        $info_data=M("info")->where("info_type=1")->order("info_id desc")
            ->limit($Page->firstRow.','.$Page->listRows)->select();
        
        //var_export($info_data);
        $info_id_set="";
        foreach ($info_data as $info)
        {
            if ($info_id_set!="")
                $info_id_set.=",";
            $info_id_set.=$info["info_id"];
        }
        $info_data_meta=M("info_meta")->where("info_id in (".$info_id_set.")")->select();
        var_export($info_data_meta);
        echo $Page->show();
        //var_export($ret);

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