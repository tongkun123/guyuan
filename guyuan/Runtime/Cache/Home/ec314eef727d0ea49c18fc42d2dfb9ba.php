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


    <div class="container">
        <form method="post">
            <div class="form-group">
                <label >用户名:</label>
                <input type="text" class="form-control" name="txtUsername" id="txtUsername" placeholder="填入用户名">
            </div>
            <div class="form-group">
                <label >密码:</label>
                <input type="password" class="form-control" name="txtPwd" id="txtPwd" placeholder="填入密码">
            </div>
            <div class="form-inline">
                <label >验证码:</label>
                <input type="text" class="form-control" name="txtCode" id="txtCode" placeholder="填入验证码">
                <img src="/Home/Temp/valiCode" style="height: 40px;width: 160px;cursor: pointer"
                onclick="this.src='/Home/Temp/valiCode?aa='+Math.random();"/>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="saveUser">保存一周
                </label>
            </div>
            <button type="submit" class="btn btn-default">登录</button>
            <span style="color:red"><?php echo ($errorInfo); ?></span>
        </form>
    </div>

<hr/>



 <div id="footer" style="margin-top: 50px">
     京ICP备 1234
 </div>
</body>
</html>