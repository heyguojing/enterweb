<?php
namespace app\index\controller;
use think\Controller;
use Util\SysDb;

class Member extends Controller{
	public function __construct(){
		parent::__construct();
		$this->member = session('member');
		if(!$this->member){
			if(request()->isAjax()){
				exit(json_encode(array('code'=>1,'msg'=>'您还没有登录，请先登录')));
			}
			exit($msg);
		}
		$this->db = new SysDb;
	}

	// 购物车
	public function add_carts(){
		$pro_no = input('post.pro_no');
		if(!$pro_no){
			exit(json_encode(array('code'=>1,'msg'=>'没有找到该商品')));
		}
		$product = $this->db->table('product')->where(array('pro_no'=>$pro_no))->item();
		if(!$product){
			exit(json_encode(array('code'=>1,'msg'=>'没有找到该商品')));
		}
		if($product['stock']<=0){
			exit(json_encode(array('code'=>1,'msg'=>'该商品暂时无货')));
		}
		if($product['status']!=0){
			exit(json_encode(array('code'=>1,'msg'=>'该商品已下架')));
		}
		$data['pro_id'] = $product['id'];
		$data['count'] = 1;
		$data['add_time'] = time();
		$data['uid'] = $this->member['uid'];
		$this->db->table('cart')->insert($data);
		exit(json_encode(array('code'=>0,'msg'=>'加入购物车成功')));
	}

	// 我的购物车
	public function carts(){
		$data['product_list'] = $this->db->table('cart')->where(array('uid'=>$this->member['uid']))->order('id desc')->lists();
		$data['product_cates'] = [];
		if($data['product_list']){
			$pro_ids = array_column($data['product_list'], 'pro_id');
			$data['product_cates'] = $this->db->table('product')->field('id,img,title,keywords,price,pro_no')->where('id in('.implode(',', $pro_ids).')')->cates('id');
		}

		return $this->fetch('',$data);
	}

	// 结算
	public function dosettement(){
		$data = input('post.data/a');
		if(!$data){
			exit(json_encode(array('code'=>1,'msg'=>'没有购买任何商品')));
		}
		$order['order_no'] = time().str_pad($this->member['uid'],4,'0',STR_PAD_LEFT).rand(100,599).rand(600,999);
		$order['money'] = 0;
		$order_product = [];
		foreach ($data as $item) {
			// 检查商品库存
			$product = $this->db->table('product')->field('id,title,stock,price')->where(array('pro_no'=>$item['pro_no']))->item();
			if($product['stock']<$item['num']){
				exit(json_encode(array('code'=>1,'msg'=>'商品'.$product['title'].'库存不足')));
			}
			$order['money'] += ($product['price']*$item['num']);
			$order_product[] = array('pro_id'=>$product['id'],'order_no'=>$order['order_no'],'price'=>$product['price'],'count'=>$item['num']);
		}
		
		$order['uid'] = $this->member['uid'];
		$order['pay_money'] = $order['money'];
		$order['add_time'] = time();
		$this->db->table('orders')->insert($order);
		$this->db->table('order_product')->insertAll($order_product);
		// 减库存
		foreach ($data as $item) {
			$this->db->table('product')->where(array('pro_no'=>$item['pro_no']))->setDec('stock');
		}
		exit(json_encode(array('code'=>0,'msg'=>'订单生成成功','order_no'=>$order['order_no'])));
	}

	// 我的订单
	public function order(){
		$data['order_list'] = $this->db->table('orders')->where(array('uid'=>$this->member['uid']))->order('id desc')->lists();
		$data['order_status'] = array(-1=>'未付款已关闭',0=>'未付款',1=>'已付款',2=>'已完成');
		foreach ($data['order_list'] as $key => $value) {
			$data['order_list'][$key]['order_product_list'] = $this->db->table('order_product')->where(array('order_no'=>$value['order_no']))->lists();
			foreach ($data['order_list'][$key]['order_product_list'] as $k => $item) {
				$data['order_list'][$key]['order_product_list'][$k]['product'] = $this->db->table('product')->where(array('id'=>$item['pro_id']))->item();
			}
		}
		
		return $this->fetch('',$data);
	}

	// 支付宝支付
	public function alipay(){
		$order_no = trim(input('get.order_no'));
		if(!$order_no){
			exit(json_encode(array('code'=>1,'msg'=>'订单号错误')));
		}
		$order = $this->db->table('orders')->where(array('order_no'=>$order_no))->item();
		if(!$order){
			exit(json_encode(array('code'=>1,'msg'=>'没有找到该订单')));
		}

		require_once EXTEND_PATH.'/Alipay/config.php';
		require_once EXTEND_PATH.'/Alipay/pagepay/service/AlipayTradeService.php';
		require_once EXTEND_PATH.'/Alipay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php';

		    //商户订单号，商户网站订单系统中唯一订单号，必填
		    $out_trade_no = $order_no;

		    //订单名称，必填
		    $subject = '商品订单';

		    //付款金额，必填
		    $total_amount = $order['pay_money'];

		    //商品描述，可空
		    $body = '商城商品';

			//构造参数
			$payRequestBuilder = new \AlipayTradePagePayContentBuilder();
			$payRequestBuilder->setBody($body);
			$payRequestBuilder->setSubject($subject);
			$payRequestBuilder->setTotalAmount($total_amount);
			$payRequestBuilder->setOutTradeNo($out_trade_no);

			$aop = new \AlipayTradeService($config);

			/**
			 * pagePay 电脑网站支付请求
			 * @param $builder 业务参数，使用buildmodel中的对象生成。
			 * @param $return_url 同步跳转地址，公网可以访问
			 * @param $notify_url 异步通知地址，公网可以访问
			 * @return $response 支付宝返回的信息
		 	*/
			$response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);
			//输出表单
			var_dump($response);
	}
}