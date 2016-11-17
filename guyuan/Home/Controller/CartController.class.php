<?php
namespace Home\Controller;
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
        exit("hello");
    }

}