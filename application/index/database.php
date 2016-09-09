<?php 
   /*单独模块的数据库配置，只需要配置和application/database.php文件中不同的部分*/
return [
	//-- 数据库名
	'database' => 'demo',
	//-- 数据库表前缀
	'prefix' => 'think_',
	//-- 数据库连接参数
	'params' => [
		//-- 使用长连接
		PDO::ATTR_PERSISTENT => true
	],
];
