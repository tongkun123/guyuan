<?php

namespace Home\Widget;
use Think\Controller;
use Think\Model;

class InfoWidget extends Controller {
    public function load($id){

        $cache = S(array('type'=>'File','prefix'=>'think_file','expire'=>600));
        //$cache->name = 'tongkun'; // 设置缓存
        //echo $value = $cache->name; // 获取缓存
        $get_widget_conf=M("info_widget")->where("wig_id=".$id)->limit(1)->select();
        if ($get_widget_conf)
        {
            $get_widget_conf=$get_widget_conf[0];

            $get_widget_data=array();
            $m=new Model();
            //echo '$get_widget_data=$m->'.$get_widget_conf["wig_model"].';';

            //var_export($cache->lastnews[0]["info_type"]==$id);

            if (!$cache->lastnews || $cache->lastnews[0]["info_type"]!=$id)
            {
                eval('$get_widget_data=$m->'.$get_widget_conf["wig_model"].';');
                $cache->lastnews=$get_widget_data;
            }

            $this->assign("w_title",$get_widget_conf["wig_title"]);
            $this->assign("w_data",$cache->lastnews);
            $this->theme("5000")->display("W:list");
        }

    }
}