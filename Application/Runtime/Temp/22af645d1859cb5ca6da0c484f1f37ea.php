<?php
//000000000060a:5:{i:0;a:6:{s:2:"id";s:1:"6";s:4:"p_id";s:1:"3";s:5:"title";s:30:"博客启用 ★  欢迎骚扰";s:7:"content";s:531:"    今天我的个人博客正式上线，原先的博客因为实在太难看，所以这次进行了全新的页面布局，而且利用响应式布局做了手机端。这次上线的比较匆忙，遗留了很多问题，我也会尽量利用业余时间抓紧完善，同时，为了可以搜集更多的反馈建议，大家可以随时给我提出建议。
   博客还是利用的Thinkphp框架写的，这次主要是对前端进行了优化，后端几乎没什么改变。以后会不断优化不断努力，come on！";s:4:"time";s:10:"1431419904";s:3:"zan";s:1:"3";}i:1;a:6:{s:2:"id";s:1:"5";s:4:"p_id";s:1:"1";s:5:"title";s:16:"SMTP邮件发送";s:7:"content";s:4589:"  前几天一直在做网页制作大赛的邮件发送的项目，开始没用ajax，每次都得等到全部发送完成才能显示成功界面，一直想着用ajax来实现，最后我花了很长时间终于实现了。
  首先需要引进smtp邮件发送的类库email.class.php：


然后是send.php
注意：不同的邮箱发送要注意邮箱服务器地址

&lt;?php 
    header(&quot;Content-type: text/html; charset=utf-8&quot;);
	require_once &quot;email.class.php&quot;;
	require_once &quot;filter.php&quot;;
	$smtpserver = &quot;邮箱服务器地址&quot;;
	$smtpserverport =25;
	$smtpusermail = &quot;用户帐号&quot;;//
	$smtpuser = &quot;用户名&quot;;//
	$smtppass = &quot;密码&quot;;//
	$mailtitle =$_POST['mailtitle'];
	$mailcontent = $_POST['mailcontent'];
	$currentIndex = $_POST['num']+1;
	$mailnum = $_POST['mailnum'];
	$mailtype = &quot;HTML&quot;;
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
	$smtp-&gt;debug = false;
    require &quot;conn.php&quot;;
   		$smtpemailto = $_POST['smtpemailto'];
		$state = $smtp-&gt;sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
		  
      echo &quot;&lt;div style='width:700px; margin:20px auto;'&gt;&quot;;
	  if($state==&quot;&quot;){
		  echo &quot;共&quot;.$mailnum.&quot;封邮件，正在发送第&quot;.$currentIndex.&quot;封给$smtpemailto......&quot;.&quot;对不起，邮件发送失败！&quot;;
		  echo &quot;&lt;a href='index.html'&gt;点此返回&lt;/a&gt;&quot;;
		  echo &quot;&lt;/div&gt;&quot;;
	  }else{
	   echo &quot;共&quot;.$mailnum.&quot;封邮件，正在发送第&quot;.$currentIndex.&quot;封给$smtpemailto......&quot;.&quot;恭喜！邮件发送成功！！&quot;;
	   echo &quot;&lt;a href='index.html'&gt;点此返回&lt;/a&gt;&quot;;
	   echo &quot;&lt;/div&gt;&quot;;
	}
?&gt;




最后是邮件发送的sendmail.php


&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD XHTML 1.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd&quot;&gt;
&lt;html xmlns=&quot;http://www.w3.org/1999/xhtml&quot;&gt;
&lt;head&gt;
&lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot; /&gt;
&lt;title&gt;网页制作大赛邮件发送&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;h3 style=&quot;margin-top:100px;text-align:center&quot;&gt;正在发送，请稍候.......&lt;/h3&gt;
&lt;?php
    header(&quot;Content-type: text/html; charset=utf-8&quot;);
    require_once &quot;filter.php&quot;;
   	$mailtitle =fliter_script($_POST['title']);
	$mailcontent = fliter_script($_POST['content']);
    require &quot;conn.php&quot;;
    $result = mysqli_query($con,&quot;select email from baoming&quot;);
    $mailnum = mysqli_num_rows($result);
    $time  = time();
    //$sql   = &quot;INSERT INTO sended (title, content, time, goalmail) VALUES ('{$mailtitle}','{$mailcontent}','{$time}','{$smtpemailto}')&quot;;	
    $i=0;
    while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
		$result_array[$i]=$row[0];
		$i++;//将邮箱存入数组
	}
?&gt;

&lt;script type=&quot;text/javascript&quot;&gt;
var result_array=eval('&lt;?php echo json_encode($result_array);?&gt;');//邮箱
var mailtitle=&quot;&lt;?php echo $mailtitle ?&gt;&quot;;//邮件标题
var mailcontent=&quot;&lt;?php echo $mailcontent ?&gt;&quot;;//邮件内容
var mailnum=&quot;&lt;?php echo $mailnum ?&gt;&quot;;//邮件总数
var currentIndex=0;//递归条件变量
var XHR; 
function createXHR(){  
if(window.ActiveXObject){
XHR=new ActiveXObject('Microsoft.XMLHTTP');
}else if(window.XMLHttpRequest){
XHR=new XMLHttpRequest(); 
} 
} 
function send(){ 
	if(currentIndex&gt;=result_array.length){ 
           alert('发送完成');
            return;
        }//递归结束条件
var smtpemailto=result_array[currentIndex]; 
createXHR(); 
XHR.open(&quot;POST&quot;,&quot;send.php&quot;,true);//POST方法发送
XHR.setRequestHeader(&quot;Content-type&quot;,&quot;application/x-www-form-urlencoded&quot;);
XHR.send(&quot;smtpemailto=&quot;+smtpemailto+&quot;&amp;mailtitle=&quot;+mailtitle+&quot;&amp;mailcontent=&quot;+mailcontent+&quot;&amp;num=&quot;+currentIndex+&quot;&amp;mailnum=&quot;+mailnum);//ajax发送
XHR.onreadystatechange=byhongfei;
} 
function byhongfei(){ 
if(XHR.readyState == 4){ 
if(XHR.status == 200){ 
var textHTML=XHR.responseText; 
document.write(textHTML);
currentIndex++;
send();//递归调用
} 
} 
}
window.onload=send();
&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;
";s:4:"time";s:10:"1431416292";s:3:"zan";s:1:"1";}i:2;a:6:{s:2:"id";s:1:"4";s:4:"p_id";s:1:"1";s:5:"title";s:51:"纯js的Ajax实时验证用户名是否已经存在";s:7:"content";s:2438:"   一个网站采用Ajax技术，不仅可以改善网站的用户体验性，而且大大节约了宝贵的带宽，减轻了服务器负荷（不再需要交互整个网页内容，而是局部）。
  
代码解释： 
①实现该功能的核心代码在ajax.js，需要另外引进 
②给form命名，因为后面我们需要利用JS来取得input框中的value 
③给input框添加一个“onblur”事件，即当“焦点”失去时触发该事件(即流程图的“触发控件”) 
④&lt;span id=&quot;checkbox&quot;&gt;&lt;/span&gt;用来放从服务器发送回来的数据（即“用户名已存在”等） 
 &lt;?php 
mysql_connect(&quot;localhost&quot;,'root',''); 
mysql_select_db('test'); 
$sql=&quot;select * from ajax where name='$_GET[id]'&quot;; 
$query=mysql_query($sql); 
if(is_array(mysql_fetch_array($query))){ 
echo &quot;&lt;font color=red&gt;用户名已存在&lt;/font&gt;&quot;; 
}else{ 
echo &quot;&lt;font color=green&gt;用户名可以使用&lt;/font&gt;&quot;; 
} 
?&gt; 

代码解释： 
通过ajax的open方法，将用户输入”用户名“通过id传递给进来（即$_GET[id]），此时将对指定的数据库表中进行查询，检查是否有存在该“用户名” 

// JavaScript Document 
var XHR; //定义一个全局对象 
function createXHR(){ //首先我们得创建一个XMLHttpRequest对象 
if(window.ActiveXObject){//IE的低版本系类 
XHR=new ActiveXObject('Microsoft.XMLHTTP');//之前IE垄断了整个浏览器市场，没遵循W3C标准，所以就有了这句代码。。。但IE6之后开始有所改观 
}else if(window.XMLHttpRequest){//非IE系列的浏览器，但包括IE7 IE8 
XHR=new XMLHttpRequest(); 
} 
} 
function checkname(){ 
var username=document.myform.user.value; 
createXHR(); 
XHR.open(&quot;GET&quot;,&quot;checkname.php?id=&quot;+username,true);//true:表示异步传输，而不等send()方法返回结果，这正是ajax的核心思想 
XHR.onreadystatechange=byhongfei;//当状态改变时，调用byhongfei这个方法，方法的内容我们另外定义 
XHR.send(null); 
} 
function byhongfei(){ 
if(XHR.readyState == 4){//关于Ajax引擎对象中的方法和属性，可以参考我的另一篇博文：http://www.cnblogs.com/hongfei/archive/2011/11/29/2265377.html 
if(XHR.status == 200){ 
var textHTML=XHR.responseText; 
document.getElementById('checkbox').innerHTML=textHTML; 
} 
} 
} ";s:4:"time";s:10:"1431415663";s:3:"zan";s:1:"2";}i:3;a:6:{s:2:"id";s:1:"3";s:4:"p_id";s:1:"2";s:5:"title";s:27:"在PHP的路上义无反顾";s:7:"content";s:1756:"  从大一刚入学的时候开始接触网站，以前还从来没想过自己会走上这条路。说起这个还得从高考后不久说起，当时填志愿就填了鲁东大学的电子信息专业然后是机械，以为信心满满的能进入电子专业，所以加了学校信电学院的官方群，在里面也结交了一些朋友，当时王杰学长在群里，然后说起了鲁大学生网这个社团和暑期实习，我感觉挺好的，然后就试了试，就做了初试题目，刚开始也是什么都不懂，就不断得看视频，问度娘，最后没几天就做完了。最后到了学校后进行了面试，当时面试的题目好像我一个都没答上来，没想到最后还是进了学生网。
  现在好像该说说我的专业了，唉，以为信心满满的能进入电子专业，最后却被第三个志愿计算机专业录取了，当时还是有点失望的，不过想着还能转专业嘛，也没想那么多了。后来在王杰学长的带领下（其实是逼迫下）不断的学习WEB技术，没想到就这样完全被这一行给迷住了，最后决定以后就从事这一行了，然后经常熬夜的日子也就开始了。
  大一下学期开始进行转专业，我想了下，虽然我对一些硬件感兴趣，但是我现在学的php和电子有些冲突，感觉不太好，而且和舍友们相处了这么长时间，转走了也舍不得，最后还是决定不转了。
   在网站建设这条路上，我最要感谢的还是学生网的王奉新（王杰）学长，是他给了我学习的动力，他让我人生有了目标，我觉得他是我的伯乐。
  以前连作文读从来不写的我，感觉这是第一次写这么长的文章，哈哈，纯属闲聊。";s:4:"time";s:10:"1431415426";s:3:"zan";s:1:"0";}i:4;a:6:{s:2:"id";s:1:"2";s:4:"p_id";s:1:"1";s:5:"title";s:23:"thinkphp自定义函数";s:7:"content";s:772:"  今天在做博客内容添加的时候，开始用的Ueditor，但是感觉用它的作用不是很大，而且如果内容有代码的时候就容易乱，最后还是用了原始的textarea，用它需要对内容进行一些处理，比如空格，换行等等，因为用的TP框架，需要在模版自定义函数。
注意：自定义函数我放在根目录/Thinkphp/Common/function.php中。 这里是关键。

function str_to($str){
$str=str_replace(&quot; &quot;, &quot;&amp;nbsp;&quot;, $str);
$str=str_replace(&quot;&lt;&quot;, &quot;&amp;lt;&quot;, $str);
$str=str_replace(&quot;&gt;&quot;, &quot;&amp;gt;&quot;, $str);
$str=nl2br($str);
return $str;

} 

模板变量的函数调用格式：{$varname|function1|function2=arg1，arg2，### } ";s:4:"time";s:10:"1431414027";s:3:"zan";s:1:"1";}}
?>