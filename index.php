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
//3.引入核心文件
//require './Lib/thinkPHP/thinkPHP.php'


?>