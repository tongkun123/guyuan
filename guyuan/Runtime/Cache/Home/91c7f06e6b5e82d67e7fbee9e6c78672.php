<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link href="/Public/bs/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="/Public/bs/js/jq.js"></script>
    <script src="/Public/bs/js/bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">LOGO</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                
                <?php $navbar=W('Nav/def');?>
                <?php if(is_array($navbar)): foreach($navbar as $key=>$nav): ?><li><a href="<?php echo ($nav["nav_href"]); ?>"><?php echo ($nav["nav_title"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php if($global_user): ?>
<li><a ><?php echo ($global_user->user_name); ?></a></li>
<li><a href="?do=logout">注销</a></li>
<?php else: ?>
<li><a href="/Home/login">登录</a></li>
<li><a href="/Home/reg">注册</a></li>
<?php endif; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


    <style>
        .media{margin-bottom: 30px;border-bottom: solid 1px #ddd;}
        .pcontent{line-height: 18pt; padding: 10px;}
        .price li{border: 0;background: #f5f5f5;padding: 0;}
        .pmeta{border-top:dashed 1px #DDDDDD;border-bottom:dashed 1px #DDDDDD}
        .pmeta li{border: 0;}
        ._pmeta li:hover{background: #f5f5f5;cursor: pointer;}
        .pbtn button{width: 160px}
        .pmetalist{margin-bottom: 10px;display: inline-block;}
        .pmetalist li{float: left;margin-right: 8px;padding: 6px 15px;}
        .pmetalist li a{font-style: normal;text-decoration: none;}
        .pmetalist li:hover{background: #f5f5f5;cursor: pointer;}
        .pmetalist .pm_name{border: 0;}
        .pmetalist .pm_name:hover{background: none;}
        .choseli{border-color: red;}
    </style>
    <script type="text/html" id="tpl_ptype">
        <li class="list-group-item ptype" im_id="{im_id}">
            <span><a href="#"  >{pkey}</a> </span>
        </li>
    </script>
    <script>
        var detail_data=[
                <?php if(is_array($info_data_detail)): foreach($info_data_detail as $key=>$info): ?>[<?php echo ($info["info_id"]); ?>,"<?php echo ($info["im_key"]); ?>","<?php echo ($info["im_value"]); ?>",<?php echo ($info["im_pid"]); ?>,<?php echo ($info["im_id"]); ?>],<?php endforeach; endif; ?>
        [-1,"",""]//防止低版本浏览器以（,）结尾报错
        ];
        $(document).ready(function () {
            $(".ptype").click(function () {
                //点击规格时，切换价格
                if($(this).parents("ul").attr("primary") == "1")
                {
                    //代表主规格,清空子规格的选择
                    $("ul[primary='0']").find("li").removeClass("choseli");

                }

                $(this).parents("ul").find("li").removeClass("choseli");
                $(this).addClass("choseli");
                var im_id=$(this).attr("im_id");//属性主键ID
                var get_meta1=getMetaByPID(im_id, "price1");//市场价
                var get_meta2=getMetaByPID(im_id, "price2");//优惠价

                if (parseFloat(get_meta1)>0 && parseFloat(get_meta2)>0)
                {
                    $("#meta_price1").html("￥"+"<del>"+get_meta1+"</del>");
                    $("#meta_price2").html("￥"+get_meta2);
                }
                else
                {
                    $("#meta_price1").html("￥"+"<del>"+getMeta(<?php echo ($info["info_id"]); ?>,"price1",0)+"</del>");
                    $("#meta_price2").html("￥"+getMeta(<?php echo ($info["info_id"]); ?>,"price2",0));
                }

                return false;
            })
        })
        function getMetaByPID(im_id, im_key)//根据父ID获取属性值
        {
            for(var i=0;i<detail_data.length;i++)
            {
                if ( parseInt(detail_data[i][3])==im_id && detail_data[i][1] == im_key)
                {
                    return detail_data[i][2];
                }
            }
            return 0;
        }
        function getMetaList(info_id,im_key,tpl_id)
        {
            var result="";
            var tpl_content=$("#"+tpl_id).html();//模板内容
            tpl_content=tpl_content.replace("{pkey}","{"+im_key+"}");

            for(var i=0;i<detail_data.length;i++)
            {
                if (detail_data[i][0]==info_id && detail_data[i][1]==im_key)
                {
                    result+=tpl_content.replace("{"+im_key+"}", detail_data[i][2])
                    .replace("{im_id}",detail_data[i][4])
                }
            }
            return result;
        }
        function getMeta(info_id,im_key,def_val) {
            for(var i=0;i<detail_data.length;i++)
            {
                if (detail_data[i][0]==info_id && detail_data[i][1]==im_key && parseInt(detail_data[i][3])==0)
                {
                    return detail_data[i][2];
                }
            }
            return def_val;
        }

    </script>
    <div class="container">
        <div class="col-md-8 column">
            <?php if(is_array($info_data_main)): foreach($info_data_main as $key=>$info): ?><div class="row">
                    <div class="page-header">
                        <h2><?php echo ($info["info_title"]); ?></h2>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <script>document.write("<img src='"+getMeta(<?php echo ($info["info_id"]); ?>,
                            "pimg","","/Public/prod/none.jpg")+"'style='width:200px;height:200px'/>");</script>
                        </a>
                    </div>
                    <div class="col-md-8">
                        <ul class="well list-group price">
                            <li class="list-group-item">
                                <span class="text-muted">市场价：</span>
                                <span id="meta_price1">￥<del><script>document.write(getMeta(<?php echo ($info["info_id"]); ?>,"price1",0));</script></del></span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">优惠价：</span>
                                <span class="text-danger" style="font-size: 30px" id="meta_price2">￥<script>document.write(getMeta(<?php echo ($info["info_id"]); ?>,"price2",0));</script></span>
                            </li>
                        </ul>

                        <ul class="col-md-10 col-md-offset-1 list-group list-inline text-center pmeta">
                            <li class="list-group-item">
                                <span class="text-danger">月销量:</span><span>1000</span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-danger">人气数:</span><span><script>document.write(getMeta(<?php echo ($info["info_id"]); ?>,"views","",0));</script></span>
                            </li>
                        </ul>
                        <ul class="list-group list-inline text-center pmetalist" primary="1">
                            <li class="list-group-item pm_name">
                                <span class="text-danger">规格:</span>
                            </li>
                            <script>document.write(getMetaList(<?php echo ($info["info_id"]); ?>,"ptype","tpl_ptype"));</script>
                        </ul>
                        <ul class="list-group list-inline text-center pmetalist" primary="0">
                            <li class="list-group-item pm_name">
                                <span class="text-danger">产地:</span>
                            </li>
                            <script>document.write(getMetaList(<?php echo ($info["info_id"]); ?>,"ptype-addr","tpl_ptype"));</script>
                        </ul>
                        <p class="text-center list-inline pbtn">
                            <button class="btn btn-warning"><span class="glyphicon glyphicon-shopping-cart">加入购物车</span></button>
                            <button class="btn btn-danger">立即购买</button>
                        </p>
                    </div>

                </div><?php endforeach; endif; ?>
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#">商品介绍</a></li>
                <li role="presentation" ><a href="#">规格包装</a></li>
                <li role="presentation" ><a href="#">评价</a></li>
                <li role="presentation" ><a href="#">配送范围</a></li>
            </ul>
            <p class="pcontent">
                <?php echo ($info["info_content"]); ?>
            </p>

        </div>
        <div class="col-md-4 column">
            <?php echo W('Info/load',array(2));?>
        </div>
    </div>
    <script>
        $(".nav-tabs li").click(function () {
            $(".nav-tabs li").removeClass("active");
            $(this).addClass("active");
            return false;
        })
    </script>




<hr/>



 <div id="footer" style="margin-top: 50px">
     京ICP备 1234
 </div>
</body>
</html>