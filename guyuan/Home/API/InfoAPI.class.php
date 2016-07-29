<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/28
 * Time: 16:39
 */
namespace Home\API;
class InfoAPI
{
    public $_info_type=1;//1新闻，2商品
    public $_page_size=5;//每页显示数据
    public $_page_bar="";//分页组件所显示的内容
    public $_main_data=array();//主表数据
    public $_detail_data=array();//字表数据
    function __construct($infoType,$pageSize=5)
    {
        $this->_info_type=$infoType;
        $this->_page_size=$pageSize;
    }
    function loadMainData($where_main="",$where_detail="")//加载主表数据
    {
        if ($where_main!="") $where_main=" and ".$where_main;
        $info_count=M("info")->where("info_type=".$this->_info_type.$where_main)->count();
        $Page       = new \Think\Page($info_count,$this->_page_size);
        $this->_page_bar=$Page->show();//把分页的内容赋值给变量
        /*$this->_main_data=M("info")->where("info_type=".$this->_info_type)->order("info_id desc")
            ->where($where_main)->limit($Page->firstRow.','.$Page->listRows)->select();*///主表数据取值完成
        $this->_main_data=M("info")->where("info_type=".$this->_info_type.$where_main)->order("info_id desc")
            ->limit($Page->firstRow.','.$Page->listRows)->select();
        
        
        //下面的内容为循环取出主表数据集合
        $info_id_set="";
        foreach ( $this->_main_data as $info)
        {
            if ($info_id_set!="")
                $info_id_set.=",";
            $info_id_set.=$info["info_id"];
        }

        if ($info_id_set!="")
        {
            if ($where_detail!="") $where_detail=" and ".$where_detail;
            //取出字表数据
            $this->_detail_data=$info_data_meta=M("info_meta")->where("info_id in (".$info_id_set.")".$where_detail)->select();

        }
    
        
    }
}