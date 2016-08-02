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
    </style>
    <script>
        var detail_data=[
                <?php if(is_array($info_data_detail)): foreach($info_data_detail as $key=>$info): ?>[<?php echo ($info["info_id"]); ?>,"<?php echo ($info["im_key"]); ?>","<?php echo ($info["im_value"]); ?>"],<?php endforeach; endif; ?>
        [-1,"",""]//防止低版本浏览器以（,）结尾报错
        ];
        function getMeta(info_id,im_key,key_name,def_val) {
            for(var i=0;i<detail_data.length;i++)
            {
                if (detail_data[i][0]==info_id && detail_data[i][1]==im_key)
                {
                    return key_name+detail_data[i][2];
                }
            }
            return key_name+def_val;
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


                            <blockquote><?php echo ($info["info_des"]); ?></blockquote>
                            <p>
                                <span><script>document.write(getMeta(<?php echo ($info["info_id"]); ?>,"views","点击量:",0));</script></span>
                                <span><script>document.write(getMeta(<?php echo ($info["info_id"]); ?>,"review","评论数:",0));</script></span>
                            </p>
                        </div>


                </div><?php endforeach; endif; ?>

            <div class="pagination">
                <?php echo ($pagebar); ?>
            </div>
        </div>
        <div class="col-md-4 column">
            <?php echo W('Info/load',array(2));?>
        </div>
    </div>




<hr/>



 <div id="footer" style="margin-top: 50px">
     京ICP备 1234
 </div>
</body>
</html>