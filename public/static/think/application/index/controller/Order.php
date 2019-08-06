<?php
namespace app\index\controller;
use think\Controller;
use Util\SysDb;
// 订单
class Order extends Controller
{
	public function __construct(){
		parent::__construct();
		$this->member = session('member');
		$this->db = new SysDb;
	}

	// 订单确认页面
	public function confirm(){
		$order_no = input('get.order_no');

		$uid = (int)$this->member['uid'];
		$data['address_list'] = $this->db->table('address')->where(array('uid'=>$uid))->order('flag desc')->lists();
		$province_codes = $city_codes = $province_cates = $city_cates = [];
		foreach ($data['address_list'] as $address) {
			if(!in_array($address['province'],$province_codes)){
				$province_codes[] = $address['province'];
			}
			if(!in_array($address['city'],$city_codes)){
				$city_codes[] = $address['city'];
			}
		}
		if($province_codes){
			$province_cates = $this->db->table('citys')->field('code,name')->where('code in('.implode(',', $province_codes).')')->cates('code');
		}
		if($city_codes){
			$city_cates = $this->db->table('citys')->field('code,name')->where('code in('.implode(',', $city_codes).')')->cates('code');
		}
		$data['province_cates'] = $province_cates;
		$data['city_cates'] = $city_cates;
		$data['member'] = $this->member;
		// 订单中的商品
		$data['product_list'] = $this->db->table('order_product')->where(array('order_no'=>$order_no))->lists();
		$data['product_count'] = 0;
		foreach ($data['product_list'] as $key => $value) {
			$data['product_count'] += $value['count'];
			$data['product_list'][$key]['product'] = $this->db->table('product')->where(array('id'=>$value['pro_id']))->item();
		}
		// 订单
		$data['order'] = $this->db->table('orders')->where(array('order_no'=>$order_no))->item();

		return $this->fetch('',$data);
	}

	// 添加收货地址
	public function add_address(){
		$id = (int)input('get.id');
		$data['address'] = $this->db->table('address')->where(array('id'=>$id,'uid'=>$this->member['uid']))->item();

		$data['province_list'] = $this->db->table('citys')->where('province>0 and city=0')->lists();

		return $this->fetch('',$data);
	}

	// 获取城市数据
	public function getcity(){
		$province = (int)input('get.province');
		$data = $this->db->table('citys')->field('city,name')->where('province='.$province.' and city>0')->lists();
		exit(json_encode(array('code'=>0,'msg'=>$data)));
	}

	// 保存收货地址
	public function save_address(){
		if(!$this->member){
			exit(json_encode(array('code'=>2,'msg'=>'您还未登录，请登录后重试')));
		}
		$count = $this->db->table('address')->where(array('uid'=>$this->member['uid']))->count();
		if($count>5){
			exit(json_encode(array('code'=>1,'msg'=>'您最多只能创建5个收货地址')));
		}

		$id = (int)input('post.id');


		$data['name'] = trim(input('post.name'));
		$data['phone'] = trim(input('post.phone'));
		$data['province'] = (int)input('post.province');
		$data['city'] = (int)input('post.city');
		$data['address'] = trim(input('post.address'));
		$data['code'] = trim(input('post.code'));
		$data['uid'] = $this->member['uid'];
		if($data['name']==''){
			exit(json_encode(array('code'=>1,'msg'=>'姓名不能为空')));
		}
		if($data['phone']==''){
			exit(json_encode(array('code'=>1,'msg'=>'电话不能为空')));
		}
		if($data['province']==''){
			exit(json_encode(array('code'=>1,'msg'=>'省不能为空')));
		}
		if($data['address']==''){
			exit(json_encode(array('code'=>1,'msg'=>'地址不能为空')));
		}
		if($data['code']==''){
			exit(json_encode(array('code'=>1,'msg'=>'邮政编码不能为空')));
		}
		if($id){
			$this->db->table('address')->where(array('id'=>$id,'uid'=>$this->member['uid']))->update($data);
		}else{
			$data['flag'] = 1;
			$this->db->table('address')->where(array('uid'=>$this->member['uid']))->update(array('flag'=>0));
			$this->db->table('address')->insert($data);
		}
		
		exit(json_encode(array('code'=>0,'msg'=>'保存成功')));
	}

	// 删除地址
	public function del_address(){
		$id = (int)input('post.id');
		$res = $this->db->table('address')->where(array('id'=>$id,'uid'=>$this->member['uid']))->delete();
		if(!$res){
			exit(json_encode(array('code'=>1,'msg'=>'删除失败')));
		}

		exit(json_encode(array('code'=>0,'msg'=>'删除成功')));
	}
}