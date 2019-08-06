<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Request;
use app\admin\model\UserModel;
use think\facade\Session;

class Login extends Controller
{
    // 渲染模板
    public function login()
    {
        // 渲染
        return $this->view->fetch();
    }
    // 验证登陆
    public function DoLogin()
    {
        $data = Request::param();
        $res = UserModel::where('username','=',$data['username'])->find();
        // 验证码
        $captcha = $data['captcha'];
        if($res != true){
            $info = ['res' => 0,'msg' => '用户名不存在'];
        }elseif($res['password'] != md5($data['password'])){
            $info = ['res' => 0,'msg' => '密码错误'];
        }elseif(!captcha_check($captcha)){
            $info = ['res' => 0,'msg' => '验证码错误！'];
        }else{
            $info = ['res' => 1,'msg' => '登陆成功'];
            Session::set('username',$res['username']);
        }
        return  $info;
    }
    public function LogOut()
    {
        // 删除用户
        Session::delete('username');
        // 跳转登陆界面
        $this->redirect('Login/login');
    }
}