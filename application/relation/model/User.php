<?php
	namespace app\relation\model;
	
	use think\Model;
	/**
	 * One To One Config
	 * 
	 * 用户类包含登录名、登录密码、昵称等信息
	 * 对应数据库表think_user
	 * 代码中的类级别来建立一对一关系，而表think_user和think_profile只在
	 * 形式上建立一对一的关系，而不强求建立一对一的关系。当然也可以自己
	 * 建立，看需要把。
	 * @author Administrator
	 *
	 */
	class User extends Model{
		
		//-- 开启自动写入时间戳
		protected $autoWriteTimestamp = true;
		
		//-- 定义自动完成的属性
		protected $insert = ['status' => 1];
		
		//-- 定义一对一的关联方法(方法名可以随意)
		public function profile(){
			return $this->hasOne('app\relation\model\Profile');
		}
		
		//-- 定义一对多的关联方法
		public function bankcards(){
			return $this->hasMany('app\relation\model\BankCard');
		}
	}