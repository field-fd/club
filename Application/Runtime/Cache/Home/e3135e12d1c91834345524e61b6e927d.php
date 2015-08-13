<?php if (!defined('THINK_PATH')) exit();?>  <div class="sidebar">
    <div class="news">
      <h3>
        <p>最新<span>文章</span></p>
      </h3>
      <ul class="rank">
	     <?php if(is_array($new)): $i = 0; $__LIST__ = $new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/yijvhu/index.php/Home/Public/article/id/<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	  </ul>
      <h3 class="ph">
        <p>点击<span>排行</span></p>
      </h3>
      <ul class="paih">
        <?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/yijvhu/index.php/Home/Public/article/id/<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
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