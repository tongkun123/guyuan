<?php
namespace Home\Controller;
use Home\API\InfoAPI;
use Think\Controller;
class InfoController extends Controller {
    public function index(){
        
        $get_info_type=I("get.type",1,"/^\d+$/");//如果没值就是1
        //1.新闻 2.商品
        $ii=new InfoAPI($get_info_type);
        $ii->loadMainData();
        $this->assign("info_data_main",$ii->_main_data);//主表数据
        $this->assign("info_data_detail",$ii->_detail_data);//字表数据
        $this->assign("pagebar",$ii->_page_bar);//分页数据


        if ($get_info_type==1)
        {
            
            $this->theme("5000")->display();
        }
        else if ($get_info_type==2)
        {
            
            $this->theme("5000")->display("prod");
        }
    }
    public function detail()
    {
        $info_id=I("get.pid",0,"/^\d+$/");
        if($info_id<=0) exit("没有这个商品");
        $ii=new InfoAPI(2);
        $ii->loadMainData(" info_id=".$info_id);

        $this->assign("info_data_main",$ii->_main_data);//主表数据
        $this->assign("info_data_detail",$ii->_detail_data);//字表数据

        $this->theme("5000")->display("prod_detail");
    }
    
}