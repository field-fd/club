<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>方东博客登陆</title>
<meta name="description" content="slick Login">
<meta name="author" content="Webdesigntuts+">
<link rel="stylesheet" type="text/css" href="/club/Public/css/login.css" />
<script type="text/javascript" src="/club/Public/js/placeholder.js"></script>
<script type="text/javascript" src="/club/Public/js/jquery-1.6.2.min.js"></script>
</head>
<body>
<div id="slick-login" style="margin:80px auto;width:350px;">
<form action="<?php echo U('Register/handle');?>" method="post" enctype ="multipart/form-data">
   社团名</label><input type="text" name="name" placeholder="社团名"><br>
   社团类型<select name="type">
                                <option selected="" value="院级社团">院级社团</option>
                                <option value="校级社团">校级社团</option>
          </select> <br>
   社团介绍 <textarea name="introduce" style="width:200px;height:50px;"></textarea><br>
   社团图标        <input type="file" name="image" /><br>
   挂靠院系  <input type="text" name="relation"><br>
    指导老师    <input type="text" name="guidence"><br>
   负责人名字  <input type="text" name="chief"><br>
    电话    <input type="text" name="phone"><br>
    qq  <input type="text" name="qq"><br>
<label for="password">password</label><input type="password" name="password" id="password" class="placeholder" placeholder="密码"><br>
    确认密码<input type="password" name="repassword" id="password" class="placeholder" placeholder="确认密码"><br>
<img src="/club/index.php/Club/Register/verify" onClick="this.src+='?' + Math.random();" class="verify" title="点击刷新验证码!"/><br>
<input type="text" name="verify" id="verify" class="placeholder" style="width:90px" placeholder="验证码"><br>
<button  id="submit" >注册</button>
</div>
</form>
</body>
</html>