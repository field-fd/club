<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Slick Login</title>
<meta name="description" content="slick Login">
<meta name="author" content="Webdesigntuts+">
<link rel="stylesheet" type="text/css" href="/think/Public/css/login.css" />
<script type="text/javascript" src="/think/Public/js/placeholder.js"></script>
</head>
<body>
<form id="slick-login" method=post action=/think/index.php/Home/Login/handle>
<label for="username">username</label><input type="text" name="username" class="placeholder" placeholder="me@tutsplus.com">
<label for="password">password</label><input type="password" name="password" class="placeholder" placeholder="password">
<input type="submit" value="Log In">
</form>
</body>
</html>