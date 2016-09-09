<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
		'id' => '\d+',
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
	
	//-- 配置Index模块下的User Controller的路由
	//-- 由于user控制器是处于模块的Index模块下，所以可以省略掉'index'模块
	'[user]' => [
		'index' => 'index/user/index',
		'create' => 'index/user/create',
		'add' => 'index/user/add',
		'addList' => 'index/user/addList',
		'update/:id' => 'index/user/update',
		'delete/:id' => 'index/user/delete',
		':id' => 'index/user/read',
	],
	
	//-- 简化路由访问
	//'hello/[:name]' => 'index/index/hello',
	
	//-- 定义闭包
	/*'hello/[:name]' => function($name){
		return 'Hello, My Name is ' . $name;
	}*/
	
	//-- 由于'index'模块被配置为默认的模块，所以后面匹配的模块名可以省略
	/*'blog/:year/:month' => ['blog/archive',['method'=>'get'],['year'=>'\d{4}','month'=>'\d{2}']],
	'blog/:id' => ['blog/get',['method'=>'get'],['id'=>'\d+']],
	'blog/:name' => ['blog/read',['method'=>'get'],['name'=>'\w+']],*/
	
	//-- 上面的配置鉴于是同一模块（index模块）的同一控制器（blog）的配置，所以可以利用下面简化的配置
	'[blog]' =>[
		':year/:month' => ['blog/archive',['method'=>'get'],['year'=>'\d{4}','month'=>'\d{2}']],
		':id' => ['blog/get',['method'=>'get'],['id'=>'\d+']],
		':name' => ['blog/read',['method'=>'get'],['name'=>'\w+']],
	],
	
];
