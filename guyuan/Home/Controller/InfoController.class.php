<?php
namespace Home\Controller;
use Home\API\InfoAPI;
use Think\Controller;
class InfoController extends Controller {
    public function index(){
        
        $get_info_type=I("get.type",1,"/^\d+$/");//如果没值就是1

        $ii=new InfoAPI($get_info_type);
        $ii->loadMainData();
        $this->assign("info_data_main",$ii->_main_data);//主表数据
        $this->assign("info_data_detail",$ii->_detail_data);//字表数据
        $this->assign("pagebar",$ii->_page_bar);//分页数据
        
        $this->theme("5000")->display();
    }
    
}