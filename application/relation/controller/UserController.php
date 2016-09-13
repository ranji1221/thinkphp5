<?php
	namespace app\relation\controller;
	
	use app\relation\model\User;
	
	use app\relation\model\Profile;
	
	class UserController{
		
		public function add(){
			$user = new User;
			$user['name'] = 'jiran1221';
			$user['password'] = '123456';
			$user['nickname'] = '泥鳅也是鱼';
			
			if($user->save()){
				//-- 写入关联数据
				$profile = new Profile;
				$profile['truename'] = '张扬';
				$profile['birthday'] = '1977-03-08';
				$profile['address'] = '中国山西大同';
				$profile['email'] = 'zhangyang@thinphp.com';
				
				$user->profile()->save($profile);
				
				return '新用户增加成功！';
			}
			return $user->getError();
		}
	}