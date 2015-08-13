<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>方东博客登陆</title>
<meta name="description" content="slick Login">
<meta name="author" content="Webdesigntuts+">
<script type="text/javascript" src="/club/Public/js/jquery-1.6.2.min.js"></script>
</head>
<body>
<div id="slick-login" style="margin:80px auto;width:350px;">
<form action="<?php echo U('Register/handle');?>" method="post" enctype ="multipart/form-data">
     姓名</label><input type="text" name="name" placeholder="姓名"><br>
   邮箱    <input type="text" name="email"><br>
    password<input type="password" name="password" id="password" class="placeholder" placeholder="密码"><br>
    确认密码<input type="password" name="repassword" id="password" class="placeholder" placeholder="确认密码"><br>
<img src="/club/index.php/Home/Register/verify" onClick="this.src+='?' + Math.random();" class="verify" title="点击刷新验证码!"/><br>
<input type="text" name="verify" id="verify" class="placeholder" style="width:90px" placeholder="验证码"><br>
<button  id="submit" >注册</button>
</div>
</form>
</body>
</html>