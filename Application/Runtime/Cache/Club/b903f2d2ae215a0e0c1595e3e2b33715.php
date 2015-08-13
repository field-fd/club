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
    <a href="/club/index.php/Club/Member/index">主页</a> <br>
       社团名：<?php echo ($club["name"]); ?><br>
       社团图标：<img src="/club/Public/Uploads/<?php echo ($club["image"]); ?>"><br>
       社团类型：<?php echo ($club["type"]); ?><br>
       介绍：<?php echo ($club["introduce"]); ?><br>
       负责人：<?php echo ($member["chief"]); ?><br>
       手机号：<?php echo ($member["telephone"]); ?><br>
       qq号：<?php echo ($member["qq"]); ?><br>
       <a href="/club/index.php/Club/Member/pass/member_id/<?php echo ($member["id"]); ?>">通过</a>  
       <a href="/club/index.php/Club/Member/reject/member_id/<?php echo ($member["id"]); ?>">驳回</a>   
       <a href="/club/index.php/Club/Member/delete/member_id/<?php echo ($member["id"]); ?>">删除</a>     
</div>
</body>
</html>