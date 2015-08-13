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
       社团名：<?php echo ($club["name"]); ?><br>
       社团图标：<img src="/club/Public/Uploads/<?php echo ($club["image"]); ?>"><br>
       社团类型：<?php echo ($club["type"]); ?><br>
       介绍：<?php echo ($club["introduce"]); ?><br>
       负责人：<?php echo ($club["chief"]); ?><br>
       手机号：<?php echo ($club["telephone"]); ?><br>
       qq号：<?php echo ($club["qq"]); ?><br>
       <a href="/club/index.php/Home/ApplyClub/join/club_id/<?php echo ($club["id"]); ?>">申请加入</a>       
</div>
</body>
</html>