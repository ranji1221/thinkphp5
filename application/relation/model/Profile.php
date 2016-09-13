<?php
	namespace app\relation\model;
	
	use think\Model;
	
	class Profile extends Model{
		protected  $type = [
				'birthday' => 'timestamp:Y-m-d'
		];
		
		//-- 档案Belongs to属于关联用户
		public function user(){
			return $this->belongsTo('app\relation\model\User');
		}
	}