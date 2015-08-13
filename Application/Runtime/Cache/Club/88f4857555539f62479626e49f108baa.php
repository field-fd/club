<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>方东</title>
<script type="text/javascript" src="/club/Public/js/jquery-1.6.2.min.js"></script>
</head>
<body>
<div id="slick-login" style="margin:80px auto;width:350px;">
  <form action="<?php echo U('Activity/publish');?>" method="post" enctype ="multipart/form-data">
    活动主题</label><input type="text" name="theme" placeholder="主题"><br>
    活动内容 <textarea name="content" style="width:200px;height:50px;"></textarea><br>
    宣传图片 <input type="file" name="image" /><br> <br>
  <button  id="submit" style="margin-left:50px;">发布</button>
</div>
</form>
</body>
</html>