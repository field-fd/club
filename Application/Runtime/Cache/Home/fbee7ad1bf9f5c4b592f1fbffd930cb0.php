<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>方东博客登陆</title>
<meta name="description" content="slick Login">
<meta name="author" content="Webdesigntuts+">
<link rel="stylesheet" type="text/css" href="/think/Public/css/login.css" />
<script type="text/javascript" src="/think/Public/js/placeholder.js"></script>
</head>
<style>
.add-article{
  text-align:center;
  font-size:25px;
  color:blue;
  font-weight:bold;
  margin-top:100px;
}
.submit{
    width:100px;
	height:34px;
	border:none;
	background:#317ef3;
	color:#FFFFFF;
	text-align:center;
}
.content{
    width:300px;
	height:200px;
	margin-bottom:30px;
}
.title{
    width:300px;
	height:30px;
	margin-bottom:20px;
}
</style>
<body>
<form  class="add-article" method=post action=/think/index.php/Home/Login/add>
标题：<input type="text" name="title" class="title"><br>
内容：<input name="content" class="content" ><br>
<input type="submit" value="发表" class="submit">
</form>
</body>
</html>