<?php
namespace app\admins\controller;
use think\Controller;
use Util\SysDb;
// 订单管理
class Order extends Base{
	// 订单列表
	public function index(){
		$data['order_status'] = array(-1=>'未付款已关闭',0=>'未付款',1=>'已付款',2=>'已完成');

		$data['pageSize'] = 10;
		$data['lists'] = $this->db->table('orders')->order('id desc')->pages($data['pageSize']);
		$data['page'] = max(1,(int)input('get.page'));
		$uids = array_column($data['lists']['lists'], 'uid');
		$data['user_lists'] = [];
		if($uids){
			$data['user_lists'] = $this->db->table('member')->where('uid in('.implode(',',$uids).')')->cates('uid');
		}
		return $this->fetch('',$data);
	}


	// 订单编辑
	public function add(){
		$id = (int)input('get.id');
		$data['order'] = $this->db->table('orders')->where(array('id'=>$id))->item();
		$data['member'] = $this->db->table('member')->where(array('uid'=>$data['order']['uid']))->item();
		return $this->fetch('',$data);
	}

	public function save(){
		$id = (int)input('post.id');
		$ship_no = trim(input('post.ship_no'));
		$status = (int)input('post.status');

		$data['ship_no'] = $ship_no;
		if($status){
			$data['status'] = $status;
		}
		$this->db->table('orders')->where(array('id'=>$id))->update($data);
		exit(json_encode(array('code'=>0,'msg'=>'保存成功')));
	}

	// 订单删除
	public function delete(){
		$id = (int)input('post.id');
		$this->db->table('orders')->where(array('id'=>$id))->update(array('status'=>-1));
		exit(json_encode(array('code'=>0,'msg'=>'删除成功')));
	}
}