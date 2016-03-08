<?php
return array(
	//'配置项'=>'配置值'
	'URL_HTML_SUFFIX'=>'html|shtml', //伪静态
	'TMPL_TEMPLATE_SUFFIX'=>'.html',
    'VAR_FILTERS'=>'htmlspecialchars',
    'URL_MODEL'          => '2', //URL模式
    'SESSION_AUTO_START' => false, //是否开启session
	//分组配置
    'APP_GROUP_LIST' => 'Home,Admin', //项目分组设定
	'DEFAULT_GROUP'  => 'Home', //默认分组
	//模块方法的路径访问方式配置
	'TMPL_FILE_DEPR'=>'_',
	//数据库配置信息
    'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址  李杰电脑的IP
    'DB_NAME'   => 'wx', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'wqgy1234', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => 'wx_', // 数据库表前缀 
	
	//公共路径配置
	'TMPL_PARSE_STRING'=>array(  
			'__PUBLIC__'=>__ROOT__.'/Public',
			'__CSS__'=>__ROOT__.'/Public/Common/Css',
			'__JS__'=>__ROOT__.'/Public/Common/Js',
			'__IMG__'=>__ROOT__.'/Public/Common/Images',
			'__ADMINCSS__'=>__ROOT__.'/Public/Admin/Css',
			'__ADMINJS__'=>__ROOT__.'/Public/Admin/Js',
			'__ADMINIMG__'=>__ROOT__.'/Public/Admin/Images',
			'__HOMECSS__'=>__ROOT__.'/Public/Home/Css',
			'__HOMEJS__'=>__ROOT__.'/Public/Home/Js',
			'__HOMEIMG__'=>__ROOT__.'/Public/Home/Images',
            '__HOMECSS1__'=>__ROOT__.'/Public/Home/Css/css',
			'__HOMEJS1__'=>__ROOT__.'/Public/Home/Js/js',
			'__HOMEIMG1__'=>__ROOT__.'/Public/Home/Images/img',
	),
	"appid"=>"wx8729e10b23fd1fc4",
	"appsecret"=>"3a607bd9f203c83944fa28087787a7a1"
);
?>
