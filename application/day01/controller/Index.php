<?php
	namespace app\day01\controller;
	
	use think\Request;
	/**
	 *	学习Request参数的使用
	 */
	class Index{
		public function hello(Request $request){
			echo '请求参数：';
			dump($request->param());
			echo 'name:' . $request->param('name');
		}
	}
?>