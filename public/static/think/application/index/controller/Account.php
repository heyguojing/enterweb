<?php
namespace app\index\controller;
use think\Controller;
use Util\SysDb;

class Account extends Controller
{
	public function __construct(){
		parent::__construct();
		$this->db = new SysDb;
	}

	// 用户登录
	public function login(){
		$data['referer'] =  $_SERVER['HTTP_REFERER'];

		return $this->fetch('',$data);
	}

	public function dologin(){
		$username = trim(input('post.username'));
		$pwd = trim(input('post.pwd'));
		if($username==''){
			exit(json_encode(array('code'=>1,'msg'=>'用户名不能为空')));
		}
		if($pwd == ''){
			exit(json_encode(array('code'=>1,'msg'=>'密码不能为空')));
		}

		$member = $this->db->table('member')->where(array('username'=>$username))->item();
		if(!$member){
			exit(json_encode(array('code'=>1,'msg'=>'该用户不存在')));
		}
		if(md5($member['username'].$pwd) != $member['pwd']){
			exit(json_encode(array('code'=>1,'msg'=>'密码错误')));
		}
		if($member['status'] == 1){
			exit(json_encode(array('code'=>1,'msg'=>'该用户已被禁用')));
		}

		session('member',$member);
    	exit(json_encode(array('code'=>0,'msg'=>'登录成功')));
	}

	// 用户注册
    public function reg(){
    	return $this->fetch();
    }

    public function doreg(){
    	$data['username'] = trim(input('post.username'));
    	$pwd = trim(input('post.password'));

    	if($data['username']==''){
    		exit(json_encode(array('code'=>1,'msg'=>'用户名没能为空')));
    	}
    	if($pwd ==''){
    		exit(json_encode(array('code'=>1,'msg'=>'用户密码不能为空')));
    	}

    	$item = $this->db->table('member')->where(array('username'=>$data['username']))->item();
    	if($item){
    		exit(json_encode(array('code'=>1,'msg'=>'该用户已存在')));
    	}

    	$data['pwd'] = md5($data['username'].$pwd);
    	$data['add_time'] = time();

    	$uid = $this->db->table('member')->insert($data);
    	$member = $this->db->table('member')->where(array('uid'=>$uid))->item();
    	session('member',$member);
    	exit(json_encode(array('code'=>0,'msg'=>'注册成功')));
    }
}