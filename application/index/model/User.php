<?php

	namespace app\index\model;
	
	use think\Model;
	
	class User extends Model{
		//-- 前面读取用户生日的时候，使用了date方法进行日期的格式处理输出，但是每次读取数据后都需要这样处理就显得非常麻烦。
		//-- 使用读取器功能就可以简化类似的数据处理操作，例如，我们给User模型添加读取器的定义方法
		/*
		//-- 添加读取器的属性
		
		public function getBirthdayAttr($birthday){
			return date('Y-m-d',$birthday);
		}
		
		//-- 修改器

		public function setBirthdayAttr($birthday){
			return strtotime($birthday);
		}*/

		//-- 定义类型转换 (可以代替属性读取器和修改器的功能，较牛叉)
		protected $type = [
			'birthday' => 'timestamp:Y/m/d'
		];

		//-- 定义自动完成的属性 (配合读取器和修改器使用)
		protected $insert = ['status'];
		
		//-- status修改器
		protected function setStatusAttr($value,$data){
			return '流年' == $data['nickname'] ? 1 : 2;
		}

		//-- status读取器
		protected function getStatusAttr($value){
			$status = [-1 => '删除', 0 => '禁用',1 => '正常', 2 => '待审核'];
			return $status[$value];
		}
	}