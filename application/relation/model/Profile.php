<?php
	namespace app\relation\model;
	
	use think\Model;
	/**
	 * One To One Config
	 * 
	 * 用户档案信息类（详细信息类）
	 * 对应数据库表think_profile
	 * 数据库表可以不需要建立主外键的关系，而依靠代码级来控制一对一
	 * @author Administrator
	 *
	 */
	class Profile extends Model{
		protected  $type = [
				'birthday' => 'timestamp:Y-m-d'
		];
		
		//-- 档案Belongs to属于关联用户
		public function user(){
			return $this->belongsTo('app\relation\model\User');
		}
	}