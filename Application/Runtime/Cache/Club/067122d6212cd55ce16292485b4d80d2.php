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
       <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span class="min-left"><a href="/club/index.php/Club/Member/showMember/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?> &nbsp;&nbsp;</a></span>
          <a href="/club/index.php/Club/Member/recover/member_id/<?php echo ($vo["id"]); ?>">还原</a>  
          <a href="/club/index.php/Club/Member/reject/member_id/<?php echo ($vo["id"]); ?>">驳回</a><?php endforeach; endif; else: echo "" ;endif; ?>  
</div>
</body>
</html>