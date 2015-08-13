<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>方东</title>
<meta name="description" content="slick Login">
<meta name="author" content="Webdesigntuts+">
<script type="text/javascript" src="/club/Public/js/jquery-1.6.2.min.js"></script>
</head>
<body>
<div id="slick-login" style="margin:80px auto;width:350px;">
<form action="<?php echo U('ApplyClub/applyJoin');?>" method="post">
   学院<input type="text" name="college" placeholder="学院"><br>
   班级<input type="text" name="class" /><br>
   性别<select name="sex">
           <option selected="" value="男">男</option>
           <option value="女">女</option>
          </select> <br>
   手机号 <input type="text" name="telephone" /><br>
   邮箱   <input type="text" name="email" /><br>
   QQ号码  <input type="text" name="qq"><br>
   申请加入的部门    
         <select name="department_name">
           <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select> <br>
   爱好    <textarea name="hobby" style="width:200px;height:50px;"></textarea><br>
   加入理由  <textarea name="reason" style="width:200px;height:50px;"></textarea><br>
   <input type="hidden" name="club_id" value="<?php echo ($club_id); ?>">
 <button  id="submit" >申请</button>
</form>
</div>
</body>
</html>