<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Controller;
use app\admin\model\UserModel;
use think\facade\Request;
use think\Db;

class User extends Common
{
    public function index()
    {
        // 查询出管理员数据
        $num = 8;
        $type = false;
        $config = [
            'type' => 'bootstrap',
            'var_page' => 'page',
        ];
        // 获取数据
        $pagedata = UserModel::order('id','asc')->paginate($num,$type,$config);
        // 获取分页
        $page = $pagedata->render();
        $this->view->assign('user',$pagedata);
        $this->view->assign('page',$page);
        // 渲染管理员界面
        return $this->view->fetch();
    }
    public function add()
    {
        // 渲染添加界面
        return $this->fetch();
    }
    public function DoAdd()
    {
        // request
        $data = Request::param();
        $data['time'] = time();
        $username = $data['username'];
        // if
        $res = UserModel::where('username','=',$username)->find();
        if($res == true){
            return ['res' => 0,'msg' => '该用户名已经存在'];
        }
        // add
        $data['password'] = md5($data['password']);

        if(UserModel::insert($data)){
            return ['res' => 1,'msg' => '用户添加成功'];
        }else{ 
            return ['res' => 0,'msg' => '用户添加失败'];
        }
        // $user = new userModel();
        // if($user->save($data)){
        //     return ['res' => '1','msg' => '用户添加成功'];
        // }else{
        //     return ['res' => '0','msg' => '用户添加失败'];
        // }
    }
    public function edit()  //根据主键Id预查询一条数据在编辑页面上面
    {
        // 获取url传递Id
        $userId = Request::param('id');
        // 根据主键Id查询一条数据
        $res = UserModel::get($userId);
        // 赋值给页面
        $this->view->assign('urlid',$res);
        // 渲染页面
        return $this->view->fetch();
    }
    public function DoEdit()  //编辑更新操作
    {
        // 获取ajax提交的数据
        $data = Request::param();
        // 执行更行操作
        $dataId = $data['id'];
        $admin = UserModel::field('username')->where('id',$dataId)->find();
        if($admin['username'] == 'admin'){
            return ['res' => 0,'msg' => '公共管理员admin不能更改哈 ^_^，请修改其它管理员~~~'];
        }
        $res = UserModel::where('id',$dataId)->update([
            'username' => $data['username'],
            'tel' => $data['tel'],
            'email' => $data['email'],
            'time' => time(),
        ]);
        // 返回结果
        if($res){
            return ['res' => 1,'msg' => '编辑成功！'];
        }else{
            return ['res' => 0,'msg' => '编辑失败！'];
        }
    }
    public function del()
    {
        // 获取前台的主键id
        $delId = Request::param('id');
        // 执行删除
        $admin = UserModel::where('id',$delId)->find();
        if($admin['username'] == 'admin'){
            return ['res' => 0,'msg' => '公共管理员admin暂时不能删除哈 ^_^，请删除其它管理员~~~'];
        }
        $res = UserModel::where('id','=',$delId)->delete();
        // 返回结果
        if($res){
            return ['res' => 1,'msg' => '删除成功！'];
        }else{
            return ['res' => 0,'msg' => '删除失败!'];
        }
    }
}