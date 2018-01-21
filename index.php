<?php
//超时时间
@set_time_limit(120);
//内存限制 取消内存限制
@ini_set("memory_limit",'-1');
//ThinkPHP路径
define('THINK_PATH','./Lib/ThinkPHP');
//缓存路径
define('RUNTIME_PATH','./Runtime/');
//项目名称
define('APP_NAME','feifeicms');
//项目路径
define('APP_PATH','./Lib/');
//加载入口文件
require(THINK_PATH.'/ThinkPHP.php');
//实例化项目
$App = new App();
//初始化
$App->run();
//1.确定应用名称Home,死记硬背的
//define('APP_NAME','Home');
//2确定应用路径.死记硬背的
//define('APP_PATH','./Home')
//3是否开启debug模式
//define('APP_DEBUG',true);
//4.引入核心文件
//require './Lib/thinkPHP/thinkPHP.php '
//访问路径去掉index.php
//1.在apache服务器配置文件http.conf中修改rewrite.去掉#号
//2.在项目根目录添加h..重写文件.


?>