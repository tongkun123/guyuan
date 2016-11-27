<?php
namespace Home\Controller;
use Home\API\UserAPI;
use Think\Controller;
class CartController extends Controller {
    public function index()
    {
        $this->theme("5000")->display("/Info/cart");
    }
    public function cart_num()
    {
        $container_id=I("get.id","cart_num");
        $showcart=isset($_GET["show"])?true:false;//是否显示购物车内容
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
            exit("");
        }
        $cart_key="Cart_".$user_id;//缓存key
        //首先获取一下缓存
        $get_cart_cache=S($cart_key);
        if($get_cart_cache)
        {
            $get_cart_cache=json_decode($get_cart_cache,1);
            $pids="";//商品ID集合
            foreach ($get_cart_cache as $k=>$value)
            {
                if($pids!="") $pids.=",";
                $pids.=$k;
            }
            if($showcart)
            {
                $result=M("Info")->where("info_id in (".$pids.")")->field("info_id,info_title")->select();
                $result_meta=M("Info_meta")->where("info_id in (".$pids.")")->select();
                echo "prod_list=eval('('+'".json_encode($result)."'+')');";
                echo "prod_meta_list=eval('('+'".json_encode($result_meta)."'+')');";
                echo "prod_cart=eval('('+'".json_encode($get_cart_cache)."'+')');";
                exit();
            }
            else
            {
                exit("document.getElementById('".$container_id."').innerHTML='".count($get_cart_cache)."';");//打印出当前用户购物车商品数量
            }

        }
        exit("");

    }
    public function del_cart()
    {
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
        //判断商品ID是否符合类型
        $pid=I('get.pid',0,"/^\d+$/");
        $url=I("get.from","",validate_url);

        if($pid>0&&$url!="")
        {
            $cart_key="Cart_".$user_id;//缓存key
            //首先获取一下缓存
            $get_cart_cache=S($cart_key);
            $cart_cache_replace=array();
            if($get_cart_cache)//如果购物车有值则覆盖
            {
                $get_cart_cache=json_decode($get_cart_cache,1);//先反序列化为正常的PHP数组
                foreach ($get_cart_cache as $k=>$v)
                {
                    if($k==$pid) continue;
                    $cart_cache_replace[$k]=$v;
                }
                S($cart_key,null);
                S($cart_key,json_encode($cart_cache_replace),3600);
            }
            gotoUrl($url);
        }
    }
    public function add_cart()
    {
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
        $pid=I("post.pid",0,"/^\d+$/");
        $pmeta=I("post.pmeta","","/^(\d+_)+$/");

        if($pid>0&&$pmeta!="")
        {
            $pmeta=explode("_",$pmeta);
            $get_meta=M("info_meta")->where("info_id=".$pid)->select();
            $org_price=$this->getOrgPrice($get_meta);//获取商品的原始价格
            $final_price1=0;
            $final_price2=0;
            $priceResult=array();//匹配后的价格集合，包含im_key和im_value。其中im_key=ptype代表顶级元素
            foreach ($pmeta as $m)
            {
                if($m=="") continue;
                $get_result=$this->getPriceByIMPID($m,$get_meta);//只要取im_pid为传入的ID就可以取到价格
                $last_key="";//临时变量，存储上一个碰到的key
                $priceResult[]=$get_result;
            }
            //再次循环priceResult，如果里面取出的每一条元素都不为false，则取出key为非顶级元素（ptype）的值做为最终价格，
            //其中只要有一条数据为false就取原始价格
            foreach ($priceResult as $pr)
            {
                if (!$pr)
                {
                    $final_price1=$org_price[0];
                    $final_price2=$org_price[1];
                    break;
                }
                if ($last_key==""&&floatval($pr[1])>0&&floatval($pr[2])>0)
                {
                    $last_key=$pr[0];
                    $final_price1=$pr[1];
                    $final_price2=$pr[2];
                }
                else
                {
                    if(strlen($pr[0])>strlen($last_key)&&floatval($pr[1])>0&&floatval($pr[2])>0)
                    {
                        $last_key=$pr[0];
                        $final_price1=$pr[1];
                        $final_price2=$pr[2];
                    }
                }
            }
            if ($final_price1<=0||$final_price2<=0) exit("错误的页面参数");//做最后一次验证
            //开始插入缓存，设定一个临时类
            $cart_class=new \stdClass();
            $cart_class->userid=$user_id;
            $cart_class->pid=$pid;
            $cart_class->pmeta=$pmeta;
            $cart_class->price1=$final_price1;
            $cart_class->price2=$final_price2;
            $cart_key="Cart_".$user_id;//缓存key
            //首先获取一下缓存
            $get_cart_cache=S($cart_key);
            if($get_cart_cache)//如果购物车有值则覆盖
            {
                $get_cart_cache=json_decode($get_cart_cache,1);//先反序列化为正常的PHP数组
                $get_cart_cache[$pid]=$cart_class;
                S($cart_key,json_encode($get_cart_cache),3600);
            }
            else //如果没有创建一个新的数组插入缓存
            {
                S($cart_key,json_encode(array($pid=>$cart_class)),3600);
            }
            exit("OK");
        }
        else
        {
            exit("提交数据不符合规范！");
        }
        
    }

    private function getOrgPrice($get_meta)
    {
        $price1=0;
        $price2=0;
        foreach ($get_meta as $m)
        {
            if($m['im_key']=="price1"&&$m['im_pid']==0)
            {
                $price1 =  $m['im_value'];
            }
            if($m['im_key']=="price2"&&$m['im_pid']==0)
            {
                $price2 =  $m['im_value'];
            }
        }
        return array($price1,$price2);
    }
    private function getPriceByIMPID($m,$get_meta)
    {
        $im_key="";
        $im_value1=0;
        $im_value2=0;
        foreach ($get_meta as $mate)
        {
            if($mate['im_id']==$m)
            {
                $im_key=$mate['im_key'];
            }
            if($mate['im_key']=="price1"&&$mate['im_pid']==$m)
            {
                $im_value1=$mate['im_value'];
            }
            if($mate['im_key']=="price2"&&$mate['im_pid']==$m)
            {
                $im_value2=$mate['im_value'];
            }
        }
        if ($im_key!=""&&$im_value1!=0&&$im_value2!=0)
        {
            //var_export(array($im_key,$im_value1,$im_value2));
            return array($im_key,$im_value1,$im_value2);
        }
        else
        {
            return false;
        }
    }
}