<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<title></title>
<meta name="description" content="slick Login">
<meta name="author" content="Webdesigntuts+">
<script type="text/javascript" src="/club/Public/js/jquery-1.6.2.min.js"></script>
</head>
<body>
<div id="slick-login" style="margin:80px auto;width:350px;">
    <a href="/club/index.php/Admin/Activity/index">主页</a> <br>
       活动主题：<?php echo ($activity["theme"]); ?><br>
       活动内容 ：<?php echo (str_to($activity["content"])); ?><br>
       宣传图片：<img src="/club/Public/Uploads/<?php echo ($activity["image"]); ?>"><br>
       发布时间 ：<?php echo (date("Y-m-d H:i",$activity["time"])); ?><br>
       <a href="/club/index.php/Admin/Activity/pass/activity_id/<?php echo ($activity["id"]); ?>">通过</a>  
       <a href="/club/index.php/Admin/Activity/reject/activity_id/<?php echo ($activity["id"]); ?>">驳回</a>   
       <a href="/club/index.php/Admin/Activity/delete/activity_id/<?php echo ($activity["id"]); ?>">删除</a>     
</div>
</body>
</html>