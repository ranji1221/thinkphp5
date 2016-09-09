<?php
	namespace app\day02\controller;
	
	use think\Request;
	use think\Db;
	
	class Index{
		
		
		public function getRequestParams1(Request $request){
			echo '请求参数：';
			dump($request->param());
			return '';
		}
		
		//-- 系统提供了一个input助手来简化Request对象的param方法
		public function getRequestParams2(){
			echo '请求参数：';
			dump(input());
			echo 'name: '.input('name');
		}
		
		public function testResponse1(){
			$data = ['name'=>'thinkphp','status'=>'1'];
			return $data;
		}
		
		//-- 原生数据库操作(直接执行SQL语句)
		
		public function testInsertDB(){
			//-- create
			$result = Db::execute('insert into think_data(id,name,status) values(5,"zhangsan",1)');
			dump($result);
			
			
		}
		public function testUpdateDB(){
			//-- 
			$result = Db::execute('update think_data set name = "wangwu" where id = 5');
			return $result;
			
		}
		
		public function testReadDB(){
			//-- 
			$result = Db::query('select * from think_data where id = 5');
			return dump($result);
			
		}
		
		public function testDeleteDB(){
			//-- 
			$result = Db::execute('delete from think_data where id = 5');
			return dump($result);
			
		}
		
		public function testOtherDB(){
			//-- 显示数据库表列表
			$result = Db::query('show tables from demo');
			dump($result);
			
			//-- 清空数据表
			$result = Db::execute('TRUNCATE table think_data');
			dump($result);
			
		}
	}
	
	
?>