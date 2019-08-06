<?php
namespace app\admins\controller;
use think\Controller;
use Util\SysDb;

class Setting extends Base{
	// 网站设置
	public function index(){
		$data['item'] = $this->db->table('setting')->where(array('names'=>'site_setting'))->item();
		if($data['item']){
			$data['item']['values'] = json_decode($data['item']['values'],true);
		}
		return $this->fetch('',$data);
	}

	public function save(){
		$names = trim(input('post.names'));
		$data['values'] = json_encode(input('post.values'));

		$item = $this->db->table('setting')->where(array('names'=>$names))->item();
		if($item){
			$this->db->table('setting')->where(array('names'=>$names))->update($data);
		}else{
			$data['names'] = $names;
			$this->db->table('setting')->insert($data);
		}
		exit(json_encode(array('code'=>0,'msg'=>'保存成功')));
	}
}