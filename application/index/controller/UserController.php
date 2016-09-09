<?php
	namespace app\index\controller;
	
	use app\index\model\User;
	
	class UserController{
		public function index(){
			
			//-- 查询全部（无条件）
			$list = User::all();
			foreach($list as $user){
				echo $user->nickname . '<br/>';
				echo $user->email . '<br/>';
				echo date('Y/m/d',$user->birthday) . '<br/>';
				echo '---------------------------------<br/>';
			}
			//-- 查询全部带条件
			$list = User::all(['status'=>0]);
			foreach($list as $user){
				echo $user->nickname . '<br/>';
				echo $user->email . '<br/>';
				echo date('Y/m/d',$user->birthday) . '<br/>';
				echo '---------------------------------<br/>';
			}
			
			
			return 'Hello User Controller';
		}
		
		public function create(){
			return 'Create User';
		}
		
		public function add(){
			$user = new User;
			
			$user->nickname = '流年';
			$user->email = 'thinkphp5@163.com';
			$user->birthday = strtotime('1977-03-05');
			if($user->save())
				return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功';
			return $user->getError();
		}
		
		public function addList(){
			
			$user = new User;
			
			$list = [
				['nickname'=>'天尊','email'=>'tian@163.com','birthday'=>strtotime('1988-01-15')],
				['nickname'=>'甲鱼腿','email'=>'jiayu@163.com','birthday'=>strtotime('1988-01-15')],
			];
			
			if($user->saveAll($list))
				return '用户批量新增成功';
			return $user->getError();
		}
		
		public function update($id){
			return 'id = ' . $id;
		}
		
		public function delete($id){
			return 'id = ' . $id;
		}
		
		public function read($id){
			$user = User::get($id);
			echo $user['nickname'] . '<br/>';
			echo $user->email . '<br/>';
			echo date('Y/m/d',$user->birthday).'<br/>';
		}
	}