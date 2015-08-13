<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link rel="stylesheet" type="text/css" href="/yijvhu/Public/css/admin.css" />
<script src="scripts/jquery-1.6.2.min.js"></script>
<script>
         function myClick(url) {
             if (confirm("你确定要删除吗？")) {
			  location.href=url;
             }
             else {
                 return false;
             }
         }
		 function logout(url) {
             if (confirm("你确定要退出吗？")) {
			  location.href=url;
             }
             else {
                 return false;
             }
         }

		</script><!--JS换肤特效  FD(change)-->
		<style>
body {
	background-image:url(/yijvhu/Public/images/gb5.jpg);
}
.head {
	background-image:url(/yijvhu/Public/images/topbar.png);
}
.module-body img {
	height: 120px;
	margin-left: 4px;
}
.content-body{
 height:480px;
}
<!--对教师照片定义大小 2014-12-08改-->
</style>
</head>
<body>
<div class="head">
  <ul>
    <li><a  class="add" href="javascript:logout('/yijvhu/index.php/Home/Login/logout')">退出登陆</a></li>
    <li><a href="<?php echo U('index/index');?>"  target="_blank">主页</a></li>
  </ul>
</div>
<!--头部end-->
<div id="picframe"> <a target="_blank" href="#"> <img src="/yijvhu/Public/images/skin1.png" style="width:130px;height:110px;margin-right:20px;"></a> <a target="_blank" href="#"> <img src="images/skin2.png" style="width:130px;height:110px;"></a> </div>
<!--logo&nav star-->
<div class="logonav" >
  <div class="webname">云无心以出岫</div>
  <div class="nav">
    <ul>
      <li><a href="<?php echo U('index/index');?>"  target="_blank">个人主页</a></li>  
       <li><a href="<?php echo U('Login/admin');?>">全部博文</a></li>
	   <li><a  href="/yijvhu/index.php/Home/Login/addarticle">添加文章</a></li>
	   <li><a  href="/yijvhu/index.php/Home/Login/note">查看留言</a></li>
	   <li><a  href="/yijvhu/index.php/Home/Login/photo">查看相册</a></li>
      </ul>
  </div>
</div>

<!--logo&nav end-->
<div class="mainnn">
<div class="main"> 
  <div class="content" style="float:right;border:1px solid #ccc;background: white;"><!--xinjia beijingyanse-->
    <div class="content-head" style="height: 25px;background-image:url(/yijvhu/Public/images/modelhead.png);"><span class="addblog">全部博文</span></div>
    <div class="content-body">
     
      <div class="content11" style="background: white;padding-top:20px;">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="reply">
		<span class="min-left"><?php echo ($vo["title"]); ?> </span>
		<span class="reply-time">
		<span><?php echo (date("Y-m-d i:s",$vo["time"])); ?></span>&nbsp&nbsp&nbsp&nbsp<a   href="javascript:myClick('/yijvhu/index.php/Home/Login/delete/id/<?php echo ($vo["id"]); ?>')">&nbsp&nbsp删除</a> 
		</span>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
		<div class="snPages"><?php echo ($page); ?></div>
      </div>

    </div>
    <!--右边内容end--> 
  </div>
</div>
<!--主体end--> 
<!--结尾-->
<div class="foot"”>
  <center>
    信息与电气工程学院方东 版权所有
  </center>
</div>
</body>
</html>