<?php if (!defined('THINK_PATH')) exit();?>
  <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/club/Public/css/mystyle.css">
<script src="/club/Public/js/jquery-1.6.2.min.js"></script>
<title>社团管理</title>
</head>
<body>
<div class="group_left">
    <div class="head_logo">
        <div class="head_logoimg">
            <img src="/club/Public/images/lddxlogo.jpg">
        </div>
    </div>
    <div class="head_ziti">
        <h2>社团百科</h2>
    </div>
    <ul>
        <li>
            <img src="/club/Public/images/computer.jpg">
            <a href="<?php echo U('Club/index');?>">社团管理</a>
        </li>
        <li style="background:#4695d0">
            <img src="/club/Public/images/add.jpg">
            <a href="<?php echo U('Activity/index');?>">活动管理</a>
        </li>
    </ul>
</div>
<div class="group_right">
    <div class="head_right">
        <div class="right_kinds">
            <p>您好，欢迎访问社团百科</p>
        </div>
        <div class="head_rig">
            <div class="abox"  onmouseover="demOver()" onmouseout="demOut()">
                <ul id="code">
                    <li>
                        <a href="#">更换头像</a>
                    </li>
                    <li>
                        <a href="#">修改密码</a>
                    </li>
                </ul>
            </div>
            <div class="abox_out">
                <a href="<?php echo U('Index/loginOut');?>">退出</a>
            </div>
        </div>
    </div>
    <div class="content">
          <ul class="content-nav">
          	 <li><a href="/club/index.php/Admin/Activity/index" style="background:#6CA5D3">待审核活动</a></li>
          	 <li><a href="/club/index.php/Admin/Activity/passedActivity">已审核活动</a></li>
          	 <li><a href="/club/index.php/Admin/Activity/recycle">回收站</a></li>
          </ul>
          <ul class="content-list">
              <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                  <span ><a href="/club/index.php/Admin/Activity/showActivity/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["theme"]); ?></a></span>
                  <span ><?php echo ($vo["club_name"]); ?></span>
                  <span >时间：<?php echo (date("Y-m-d",$vo["time"])); ?></span>
                  <span ><a href="/club/index.php/Admin/Activity/showActivity/id/<?php echo ($vo["id"]); ?>">查看详细</a></span>
          	  </li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>

    </div>
    <div class="bottom_cen">
        <a>友情链接：</a>
        <a href="http://www.ldu.edu.cn">鲁东大学</a>
        <a href="http://www.ldustu.com">鲁大学生网</a>
        <a href="http://sailboat.ldustu.com">团队博客</a>
        <a href="http://xunji.ldustu.com">寻迹-鲁东大学失物招领</a>
        <a href="http://www.ldustu.com/a/tongzhi/2014/0619/4590.html">鲁东大学新生群</a>
        <a href="http://stbk.ldustu.com">社团百科</a>
        <a href="http://tieba.baidu.com/f?kw=%C2%B3%B6%AB%B4%F3%D1%A7">鲁东大学百度贴吧</a>
    </div>
    <div class="bottom_last">
        <p>2013 LDSN.鲁大学生网. All rights reservel 鲁ICP备13008791 站长统计</p>
    </div>
</div>
</body>
</html>