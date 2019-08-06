<?php
namespace app\admins\controller;
use think\Controller;
use Util\SysDb;
// 用户管理
class Member extends Base{
	// 用户列表
	public function index(){
		$data['pageSize'] = 10;
		$data['member_list'] = $this->db->table('member')->pages($data['pageSize']);
		$data['page'] = max(1,(int)input('get.page'));
		return $this->fetch('',$data);
	}

	// 禁用用户
	public function disables(){
		$uid = (int)input('post.uid');
		$this->db->table('member')->where(array('uid'=>$uid))->update(array('status'=>1));

		exit(json_encode(array('code'=>0,'msg'=>'禁用成功')));
	}
}