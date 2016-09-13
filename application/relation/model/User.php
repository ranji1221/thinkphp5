<?php
	namespace app\relation\model;
	
	use think\Model;
	
	class User extends Model{
		
		//-- 开启自动写入时间戳
		protected $autoWriteTimestamp = true;
		
		//-- 定义自动完成的属性
		protected $insert = ['status' => 1];
		
		//-- 定义关联方法(方法名可以随意)
		public function profile(){
			return $this->hasOne('app\relation\model\Profile');
		}
	}