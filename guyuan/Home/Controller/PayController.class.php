<?php
namespace Home\Controller;
use AlipaySubmit;
use Home\API\UserAPI;
use Think\Controller;
class PayController extends Controller
{

    function notifyurl()
    {
        //这有
    }

    function returnurl()
    {
        //这有
    }
    function submit()
    {
        //同样这里要做 用户判断，省略
        $get_orderno=I("post.order_no","","/\d+/");
        $order_main=M("order_main");
        $ret=$order_main->join('5000_order_detail on 5000_order_main.order_id=5000_order_detail.order_id')
            ->where("5000_order_main.order_no=".$get_orderno)->select();
        if(count($ret)==0)
        {
            exit();
        }
        else
        {
            header("Content-type:text/html;charset=utf-8");
            $alipay_config['partner']= '2088911865488859';

            //收款支付宝账号，以2088开头由16位纯数字组成的字符串，一般情况下收款账号就是签约账号
            $alipay_config['seller_id']	= $alipay_config['partner'];

            // MD5密钥，安全检验码，由数字和字母组成的32位字符串，查看地址：https://b.alipay.com/order/pidAndKey.htm
            $alipay_config['key']			= 'bsa9hlq344semntxrammap3wjz3tu9cg';

            // 服务器异步通知页面路径  需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
            $alipay_config['notify_url'] = "http://www.jtthink.com/Home/Pay/notifyurl";

            // 页面跳转同步通知页面路径 需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
            $alipay_config['return_url'] = "http://www.jtthink.com/Home/Pay/returnurl";

            //签名方式
            $alipay_config['sign_type']    = strtoupper('MD5');

            //字符编码格式 目前支持 gbk 或 utf-8
            $alipay_config['input_charset']= strtolower('utf-8');

            //ca证书路径地址，用于curl中ssl校验
            //请保证cacert.pem文件在当前文件夹目录中
            $alipay_config['cacert']    = getcwd().'\\cacert.pem';
          //  echo $alipay_config['cacert']  ;
            //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
            $alipay_config['transport']    = 'http';

            // 支付类型 ，无需修改
            $alipay_config['payment_type'] = "1";

            // 产品类型，无需修改
            $alipay_config['service'] = "create_direct_pay_by_user";

            // 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
            $alipay_config['anti_phishing_key'] = "";

            // 客户端的IP地址 非局域网的外网IP地址，如：221.0.0.1
            $alipay_config['exter_invoke_ip'] = "";
            $parameter = array(
                "service"       =>  $alipay_config['service'],
                "partner"       => $alipay_config['partner'],

                "payment_type"	=> $alipay_config['payment_type'],
                "notify_url"	=> $alipay_config['notify_url'],
                "return_url"	=> $alipay_config['return_url'],
                "anti_phishing_key"=>$alipay_config['anti_phishing_key'],
                "exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
                "out_trade_no"	=> $get_orderno,
                "subject"	=> "购买订单号为".$get_orderno."的商品",
                "total_fee"	=> $ret[0]["order_price"],
                "body"	=> "订单描述，备注等",
                "_input_charset"	=> trim(strtolower($alipay_config['input_charset'])),
                "exter_invoke_ip"	=> "127.0.0.1",
                "show_url"	=> "http://www.jtthink.com",
                //其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
                //如"参数名"=>"参数值"

            );

            require(dirname(__FILE__)."/../Lib/alipay/lib/alipay_submit.class.php");
            $alipaySubmit = new AlipaySubmit($alipay_config);
            $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");

            echo $html_text;
        }
    }

}