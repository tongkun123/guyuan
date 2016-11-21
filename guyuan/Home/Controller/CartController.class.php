<?php
namespace Home\Controller;
use Home\API\UserAPI;
use Think\Controller;
class CartController extends Controller {
    public function add_cart(){
        //echo "加入购物车";
        $cart=S(array(
                'type'=>'memcache',
                'host'=>'127.0.0.1',
                'port'=>'11211'
                )
        );
        $user_id=0;
        $user_api=new UserAPI();
        $get_user=$user_api->getUser();

        if($get_user)
        {
            $user_id=$get_user->user_id;
        }
        else
        {
            exit("-1");
        }
        //判断商品ID是否符合类型，同时判断属性ID是否符合规则
        $pid=I("post.id",0,"/^\d+$/");
        $pmeta=I("post.pmeta","","/^(\d+_)+$/");
        
        if($pid>0&&$pmeta!="")
        {
            exit("OK");
        }
        else
        {
            exit("提交数据不符合规范！");
        }
        
    }

}