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
<form action="<?php echo U('Login/handle');?>" method="post">
   社团名    <input type="text" name="name"><br>
    password<input type="password" name="password" id="password" class="placeholder" placeholder="密码"><br>
   
<button  id="submit" >登陆</button>
</form>
<br>
<a href="<?php echo U('Register/index');?>">注册</a>
</div>
</body>
</html>