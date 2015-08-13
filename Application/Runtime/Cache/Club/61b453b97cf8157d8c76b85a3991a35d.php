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
    <a href="/club/index.php/Club/Member/index">返回</a>  <br>
       姓名：<?php echo ($member["name"]); ?><br>
       性别：<?php echo ($member["sex"]); ?><br>
       学院：<?php echo ($member["college"]); ?><br>
       班级：<?php echo ($member["class"]); ?><br>
       邮箱：<?php echo ($member["email"]); ?><br>
       手机号：<?php echo ($member["telephone"]); ?><br>
       qq号：<?php echo ($member["qq"]); ?><br> 
       申请加入部门：<?php echo ($member["department_name"]); ?><br>
       爱好：<?php echo ($member["hobby"]); ?><br>
       加入理由： <?php echo ($member["reason"]); ?> <br>
</div>
</body>
</html>