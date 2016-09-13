<?php
	namespace app\relation\controller;
	
	use app\relation\model\User;
	
	use app\relation\model\Profile;
	
	use app\relation\model\BankCard;
	
	class UserController{
		
		//-- one To one add
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
		
		public function test(){
			$bankCard = new BankCard;
			
			$bankCard['cardName'] = '民生信用卡';
			$bankCard['cardNo'] = '1922 3455 9981 4456';
			$bankCard['publish_time'] = '2016-09-13';
			$bankCard['user_id'] = 1;
			if($bankCard->save())
				return '添加成功';
			return $bankCard->getError();
		}
		
		//-- One To One Query
		public function read($id){
			/*
			//-- 1. 通过 User 拿 Profile
			$user = User::get($id);
			echo $user['name']  . '<br/>';
			echo $user['nickname']  . '<br/>';
			echo $user['profile']['truename']  . '<br/>';			
			echo $user['profile']['email']  . '<br/>';
			
			echo '----------------------------------------<br/>';
			
			//-- 2. 通过 Profile 拿 User
			$profile = Profile::get($id);
			echo $profile['truename'] . '<br/>';
			echo $profile['email'] . '<br/>';
			echo $profile['birthday'] . '<br/>';
			
			echo $profile['user']['name'] . '<br/>';
			echo $profile['user']['nickname'] . '<br/>';
			*/
			/*
			 *  以上关联查询的时候，只有在获取关联对象（$user->profile或则$user['profile']）的时候才会进行实际的关联查询，
			 *  缺点是会可能进行多次查询，但可以使用预载入查询来提高查询性能，
			 *  对于一对一关联来说，只需要进行一次查询即可获取关联对象数据,
			 *  如下
			 */
			
			//-- 查询User对象即把其关联的profile对象查询出来
			$user = User::get($id, 'profile');
			echo $user['name']  . '<br/>';
			echo $user['nickname']  . '<br/>';
			echo $user['profile']['truename']  . '<br/>';
			echo $user['profile']['email']  . '<br/>';
		}
		
		//-- One To One Update
		public function update($id){
			$user = User::get($id);
			$user->name = 'ranji';
			if($user->save()){
				//-- 更新关联数据
				$user->profile->email = 'ranji@163.com';
				$user->profile->save();
				return '用户[ ' . $user->name . ' ]更新成功';
			}
			return $user->getError();
		}
		
		//-- One To One Delete
		public function delete($id){
			$user = User::get($id);
			if($user->delete()){
				//-- 删除关联数据
				$user->profile->delete();
				return '用户[ ' . $user->name . ' ]删除成功';
			}
			return $user->getError();
		}
	}