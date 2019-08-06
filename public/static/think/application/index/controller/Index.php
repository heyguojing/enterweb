<?php
namespace app\index\controller;
use think\Controller;
use Util\SysDb;

class Index extends Controller{
	public function __construct(){
		parent::__construct();
		$this->db = new SysDb;
	}

	// 商城首页
    public function index(){
    	// 手机
    	$data['phone_list'] = $this->db->table('product')->where(array('cid'=>1,'status'=>0))->limit(8)->lists();
        return $this->fetch('',$data);
    }

    // 商品详情
    public function detail(){
    	$pro_no = input('get.prono');
    	$data['product'] = $this->db->table('product')->where(array('pro_no'=>$pro_no,'status'=>0))->item();
    	if(!$data['product']){
    		exit('该商品不存在');
    	}
    	$data['product_imgs'] = $this->db->table('product_img')->where(array('product_id'=>$data['product']['id']))->lists();
    	// 用户的收货地址
    	$member = session('member');
    	$data['address'] = $this->db->table('address')->where(array('uid'=>$member['uid']))->order('flag desc')->item();
    	if($data['address']){
    		$data['province'] = $this->db->table('citys')->field('name')->where(array('code'=>$data['address']['province']))->item();
    		$data['city'] = $this->db->table('citys')->field('name')->where(array('code'=>$data['address']['city']))->item();
    	}
    	return $this->fetch('',$data);
    }
}
