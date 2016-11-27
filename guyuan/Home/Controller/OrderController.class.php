<?php
namespace Home\Controller;
use Home\API\UserAPI;
use Think\Controller;
class OrderController extends Controller
{
    function index()
    {

        //结算方法
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
            exit("请登录");
        }
        $cart_key="Cart_".$user_id;//缓存key
        //首先获取一下缓存
        $get_cart_cache=S($cart_key);
        $sumprice=0;

        if($get_cart_cache)
        {
            $get_cart_cache = json_decode($get_cart_cache, 1);
            $prod_detail=array();
            foreach ($get_cart_cache as $k=>$v)
            {
                $sumprice+=$v["price2"];
                $detail['prod_id']=$v['pid'];
                $detail['prod_price']=$v['price2'];
                $prod_detail[]=$detail;
            }
            //插入主订单表
            $order_main=D("order_main");
            $order_main->order_price=$sumprice;
            $order_main->user_id=$user_id;
            $order_main->order_time=date('Y-m-d h:i:s');
            $order_main->startTrans();
            $order_id=$order_main->add();
            if($order_id && intval($order_id)>0)
            {
                $orderno_data["order_no"]=date('Y').date('m').date('d').$user_id.$order_id;
                $order_main->where('order_id='.$order_id)->save($orderno_data);
                foreach ($prod_detail as &$detail)//按引用遍历
                {
                    $detail['order_id']=$order_id;
                }
                $order_detail = M("order_detail");
                $ret=$order_detail->addAll($prod_detail);
                if ($ret)
                {
                    $order_main->commit();
                    exit(date('Y').date('m').date('d').$user_id.$order_id);
                }
                else
                {
                    $order_main->rollback();
                    exit("插入子订单失败");
                }
            }
            else
            {
                $order_main->rollback();
                exit("插入主订单失败");
            }
        }
        exit("0");
    }
    function loadorder()
    {
        $user_api=new userAPI();
        $get_user=$user_api->getUser();
        if($get_user)
        {
            $user_id=$get_user->user_id;
        }
        else
        {
            exit("请登录");
        }
        $get_orderno=I("get.order_no","","/\d+/");
        $order_main=M("order_main");
        $ret=$order_main->join('5000_order_detail on 5000_order_main.order_id=5000_order_detail.order_id')
            ->where("5000_order_main.order_no=".$get_orderno." and user_id=".$user_id)->select();
        //var_export($ret[0]);
        $this->assign("order_main",$ret[0]);
        $this->theme("5000")->display("/Info/order");

    }
}