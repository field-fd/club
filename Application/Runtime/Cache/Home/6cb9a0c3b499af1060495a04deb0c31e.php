<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>方东个人博客</title>
<meta name="keywords" content="方东个人博客,响应式博客，响应式，" />
<meta name="description" content="方东个人博客，是一个后端php程序员的个人网站，交流技术，记录生活" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link href="/yijvhu/Public/css/base.css" rel="stylesheet">
<link rel="stylesheet" href="/yijvhu/Public/css/zzsc.css"/>
<script type="text/javascript" src="/yijvhu/Public/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
      $(".navbar-toggle").click(function(){
       $("header").slideToggle("slow");
  });
});
</script>
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
<body>
<div class="wap-top" >
    <button type="button" class="navbar-toggle" >
        <span></span><span></span><span></span>
    </button>方东
    <a href="<?php echo U('Index/index');?>"><img class="navbar-home" src="/yijvhu/Public/images/home.png"></a>
</div>
<div class="wrapper">
  <header>
    <h1 id="logo"><a href="/"><img src="/yijvhu/Public/images/logo.png" width="260" height="60" alt="方东个人博客"></a></h1>
    <nav>
      <ul>
        <li ><a href="<?php echo U('Index/index');?>">网站首页</a></li>
        <li><a href="<?php echo U('Index/aboutme');?>">关于我</a></li>
        <li ><a href="<?php echo U('Index/applife');?>">程序人生</a></li>
        <li><a href="<?php echo U('Index/slowlife');?>">慢生活</a></li>
        <li><a href="<?php echo U('Index/sui');?>">碎言碎语</a></li>
        <li id="active"><a href="<?php echo U('Index/note');?>">留言版</a></li>
      </ul>
    </nav>
  </header>
  <div class="banner">
    <div class="headerPic"><a href="<?php echo U('Index/index');?>"><span>方东个人博客</span></a></div>
    <div class="websiteDescription">
      <h2>渡人如渡己，渡已，亦是渡</h2>
      <p>当我们被误解时，会花很多时间去辩白。 但没有用，没人愿意听，大家习惯按自己的所闻、理解做出判别，每个人其实都很固执。与其努力且痛苦的试图扭转别人的评判，不如默默承受，给大家多一点时间和空间去了解。而我们省下辩解的功夫，去实现自身更久远的人生价值。其实，渡人如渡己，渡已，亦是渡人。</p>
    </div>
  </div>
  <div class="mainContent">
    <h2 class="title_tj">
       <h1 class="t_nav">
		     <span>您当前的位置：<a href="<?php echo U('Index/index');?>">首页</a>&nbsp;>&nbsp;<a href="<?php echo U('Index/note');?>">留言板</a></span>
		 </h1>
    </h2>
    <div class="bloglist">
      
	  <!-- 多说评论框 start -->
	<div class="ds-thread" data-thread-key="1" data-title="留言板" data-url="http://www.wickedread.cn/Index/note"></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"fd8"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		 || document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	</script>
<!-- 多说公共JS代码 end -->  
    </div>
  </div>
  <div class="sidebar">
    <div class="news">
      <h3>
        <p>最新<span>文章</span></p>
      </h3>
     <ul class="rank">
	     <?php if(is_array($new)): $i = 0; $__LIST__ = $new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/yijvhu/index.php/Home/Index/article/id/<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	  </ul>
      <h3 class="ph">
        <p>点击<span>排行</span></p>
      </h3>
      <ul class="paih">
        <?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/yijvhu/index.php/Home/Index/article/id/<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      <h3 class="links">
        <p>友情<span>链接</span></p>
      </h3>
      <ul class="website">
        <li><a href="<?php echo U('Index/index');?>">个人博客</a></li>
        <li><a href="http://www.ldustu.com" target="blank">鲁大学生网</a></li>
        <li><a href="http://www.zhujiwu.com/" target="blank">主机屋</a></li>
      </ul>
      <div class="guanzhu">扫描二维码关注<span>方东博客</span>官方微信账号</div>
       <a href="https://wx.qq.com/" class="weixin"><img src="/yijvhu/Public/images/weixin.png"></a>
          <div style="text-align:center" class="contact">
              <a href="http://wpa.qq.com/msgrd?v=3&uin=375373223&site=qq&menu=yes" target="_blank" title="qq"><img style="width:40px;" src="/yijvhu/Public/images/qq.jpg"></a>
              <a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=375373223@qq.com" target="_blank" title="email"><img style="width:40px;"  src="/yijvhu/Public/images/mail.jpg"></a>
              <a href="http://t.qq.com/Fangdong8" title="腾讯微博" target="_blank"><img style="width:42px;"  src="/yijvhu/Public/images/weibo.png"></a>
           </div>
      </div>
  </div>
  <div class="clearfloat"></div>




<div id="leftsead">
	<ul>
		<li>
			<a href="javascript:void(0)" class="youhui">
				<img src="/yijvhu/Public/images/l02.png" width="47" height="49" class="shows" />
				<img src="/yijvhu/Public/images/a.png" width="57" height="49" class="hides" />
				<img src="/yijvhu/Public/images/weixin.png" width="145" class="2wm" style="display:none;margin:-100px 57px 0 0" />
			</a>
		</li>
		<li>
			<a href="http://wpa.qq.com/msgrd?v=3&uin=375373223&site=qq&menu=yes" target="_blank">
				<div class="hides" style="width:161px;display:none;" id="qq">
					<div class="hides" id="p1">
						<img src="/yijvhu/Public/images/ll04.png">
					</div>
					<div class="hides" id="p2"><span style="color:#FFF;font-size:13px">375373223</span>
					</div>
				</div>
				<img src="/yijvhu/Public/images/l04.png" width="47" height="49" class="shows" />
			</a>
		</li>
        <li id="tel">
        <a href="javascript:void(0)">
            <div class="hides" style="width:161px;display:none;" id="tels">
                <div class="hides" id="p1">
                    <img src="/yijvhu/Public/images/ll05.png">
                </div>
                <div class="hides" id="p3"><span style="color:#FFF;font-size:12px">15552235713</span>
                </div>
            </div>
        <img src="/yijvhu/Public/images/l05.png" width="47" height="49" class="shows" />
        </a>
        </li>
        <li id="btn">
        <a id="top_btn">
            <div class="hides" style="width:161px;display:none">
                <img src="/yijvhu/Public/images/ll06.png" width="161" height="49" />
            </div>
            <img src="/yijvhu/Public/images/l06.png" width="47" height="49" class="shows" />
        </a>
    </li>
    </ul>
</div>

<!--wap go top-->
<script src="/yijvhu/Public/js/side.js"></script>
</div>
<footer>
    <ul>
      &copy2015 方东 版权所有 Designed by <a href="<?php echo U('Index/index');?>" title="方东个人博客">Fang Dong</a>
    </ul>
  </footer>
</body>
</html>