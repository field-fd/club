<?php if (!defined('THINK_PATH')) exit();?>﻿ <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link rel="stylesheet" type="text/css" href="/yijvhu/Public/css/admin.css" />
<script src="/yijvhu/Public/js/jquery-1.6.2.min.js"></script>
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
      
		</script>
		<script type="text/javascript">
$(document).ready(function() {
 $("div li:has(img)").click(function() {
  $("#showphoto").fadeIn(300);
   var photo_url = $(this).find("img").attr("src");
   $("#photo").find("img").attr("src",photo_url);
  $("#photo").click( function(){
  $("#showphoto").fadeOut(300);
 });
 });
});
</script>
		<style>
body {background-image:url(/yijvhu/Public/images/gb5.jpg);}
.head {background-image:url(/yijvhu/Public/images/topbar.png);}
.module-body img {height: 120px;margin-left: 4px;}
.content-body{ height:535px;}
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
    <div class="content-head" style="height: 25px;background-image:url(/yijvhu/Public/images/modelhead.png);"><span class="addblog">上传照片</span></div>
    <div class="content-body">
     <div class="content11" style="background: white;padding-top:20px;">
      <form class="add-photo" action="<?php echo U('Login/addphoto');?>" method="post" enctype="multipart/form-data">
      <input type="file" name="photo" />
      <input type="submit" value="提交" >
      </form>
        <div class="photo">
          <ul>
		  <?php if(is_array($photo)): $i = 0; $__LIST__ = $photo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><li><img src="/yijvhu/Public/Uploads/<?php echo ($p["name"]); ?>"><a href="javascript:myClick('/yijvhu/index.php/Home/Login/deletephoto/id/<?php echo ($p["id"]); ?>')">删除</a><span class="photo-time" ><?php echo (date("Y-m-d i:s",$p["time"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
		  </ul>
		  <!--点击图片放大-->
		  <div id="showphoto" class="showphoto" style="display:none;">
            <div id="photo" style=""><img  style="height:600px;"/></div>
        </div>
		<!---end---->
		</div>
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