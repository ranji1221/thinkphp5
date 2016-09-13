<?php
	namespace app\relation\model;
	
	use think\Model;
	/**
	 * 银行卡类 
	 * 有些属性的名字和意义可能不是很合适，但是为了学习，请大家不要太关注
	 * @author Administrator
	 *
	 */
	class BankCard extends Model{
		
		//-- 这里指定了对应数据库的表名称，否则它默认是和think_bank_card表对应
		protected $table = 'think_bankcard';
		
		protected $type = [
				'publish_time' => 'timestamp:Y-m-d'
		];
		
		//-- 开启自动写入时间戳
		protected $autoWriteTimestamp = true;
		
		//-- 定义自动完成的属性
		protected $insert = ['status' => 1];
		
		//-- 定义关联方法
		public function user(){
			return $this->belongsTo('app\relation\model\User');
		}
	}