<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>方东博客登陆</title>
<meta name="description" content="slick Login">
<meta name="author" content="Webdesigntuts+">
<link rel="stylesheet" type="text/css" href="/yijvhu/Public/css/login.css" />
<script type="text/javascript" src="/yijvhu/Public/js/placeholder.js"></script>
<script type="text/javascript" src="/yijvhu/Public/js/jquery-1.6.2.min.js"></script>
</head>
<body>
<div id="slick-login">
<label for="username">username</label><input type="text" name="username" id="username" class="placeholder" placeholder="帐号">
<label for="password">password</label><input type="password" name="password" id="password" class="placeholder" placeholder="密码">
<input type="text" name="verify" id="verify" class="placeholder" style="width:90px" placeholder="验证码"><img src="/yijvhu/index.php/Home/Login/verify" onClick="this.src+='?' + Math.random();" class="verify" title="点击刷新验证码!"/>
<button  id="submit" >登陆</button>
</div>
<script>
     $("#submit").click(function() {
  var username=$("#username").val();
  var password=$("#password").val();
  var verify=$("#verify").val();
  var info={"username":username,"password":password,"verify":verify};
 $.ajax({
                url:"<?php echo U('Login/handle');?>",
                data:info,
                type:"POST",
                dataType: "json",
                success:function(data) {
                    if (data.status == -1||data.status == 0) {
                      alert(data.msg);
                    }else {
                    	location.href="<?php echo U('Login/admin');?>";
                    }

                },
                error:function(){
                       alert('系统繁忙');
                }
            });
      })
</script>
</body>
</html>