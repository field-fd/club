<?php
return array(
	'Ok' 		=> 1000,
	'Continue'  => 1001,
	'Error'		=> 1002,
	'NoLogin'   => 1003, //未登陆
	'VerifyError'  =>1004,  //验证码错误
	 // 登陆验证
    'LoginError' => 1005,   // 用户名或者密码错误
    'EmailEmpty' => 1006,    //邮箱为空
    'PasswdEmpty'=> 1007,   //密码为空
    'LoginSuccess'=>1008,
	//注册验证
	'NameEmpty'     => 2000, //姓名为空
	'PasswdError'	=> 2001, //密码格式错误
	'EmailError'	=> 2002, //邮箱格式错误
	'RePasswdEmpty'	=> 2003, //重复密码为空
	'RePasswdError'	=> 2004, //重复密码错误
	'LeaderError'	=> 2005, //负责人错误
	'PhoneEmpty'	=> 2006, //手机号码为空
	'PhoneError'    => 2007, //手机号格式错误
	'QQEmpty'		=> 2008, //QQ为空
	'QQError'		=> 2009, //QQ号格式错误
	'NoClub'		=> 2010, //社团名称错误
	'HavaClub'		=> 2011, //该社团已注册
	'NoLogo'		=> 2012, //logo错误
	'TypeError'		=> 2013, //社团类型错误
	'RelationError' => 2014, //所属院系错误
	'IntroError'	=> 2015, //社团简介错误
	'TeacherError'	=> 2016, //指导教师错误
	//部门
	'TypeEmpty'     => 2017,   //部门操作类型错误
	'DepartEmpty'   => 2018,  //部门错误
	'NoData'        => 2019 ,  //未获取到数据
	'NoSearchCondition' => 2020, //缺少查询条件
	//学生简历申请
	'CollegeError'   => 2021,  //学院错误
	'ClassError'     => 2022,  //班级错误
	'HobbyError'     => 2023,  //爱好错误
	'ReasonError'    => 2024,  //理由错误
	//活动
	'ThemeError'     => 2025,  //活动主题错误
	'ActivityError'  => 2026,  //活动内容错误
	'UploadError'    => 2027,  //上传图片错误
	//学生登陆
	'HavaStudent'    => 2028,  //该学生邮箱已注册
	// 管理员
	'UserEmpty'      => 2029,  //用户名为空
	);