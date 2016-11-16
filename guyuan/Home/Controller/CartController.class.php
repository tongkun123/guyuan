<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller {
    public function add_cart(){
        //echo "加入购物车";
        $cart=S(array(
                'type'=>'memcache',
                'host'=>'192.168.1.10',
                'port'=>'11211'
                )
        );
        $cart->username="tongkun";
    }

}