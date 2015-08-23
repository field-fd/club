<?php
return array(
	'Ok' 		=> 1000,
	'Continue'  => 1001,
	'Error'		=> 1002,
	'NoLogin'   => 1003, //未登陆
	'VerifyError'  =>1004,  //验证码错误
	 // 登陆验证
    'LoginError' => 1005,   // 用户名或者密码错误
    'EmailEmpty' => 1006,
    'PasswdEmpty'=> 1007,
    'LoginSuccess'=>1008,
	//注册验证
	'PasswdError'	=> 2001, //密码错误
	'EmailError'	=> 2002, //邮箱错误
	'RePasswdError'	=> 2003, //重复密码错误
	'LeaderError'	=> 2004, //负责人错误
	'PhoneError'	=> 2005, //手机号码错误
	'QQError'		=> 2006, //QQ错误
	'NoClub'		=> 2007, //社团名称错误
	'HavaClub'		=> 2008, //该社团已注册
	'NoLogo'		=> 2009, //logo错误
	'TypeError'		=> 2010, //社团类型错误
	'IntroError'	=> 2011, //社团简介错误
	'TeacherError'		=> 2012, //指导教师错误
	//部门
	'DepartEmpty'  => 2013,  //部门错误
	//学生简历申请
	'ConllegeError'  => 2014,  //学院错误
	'ClassError'     => 2015,  //班级错误
	'HobbyError'     => 2016,  //爱好错误
	'ReasonError'    => 2017,  //理由错误
	'ThemeError'     => 2018,  //活动主题错误
	'ActivityError'  => 2019,  //活动内容错误
	'UploadError'    => 2020,  //上传图片错误
	//学生登陆
	'HavaStudent'    => 2021,  //该学生邮箱已注册   
	);