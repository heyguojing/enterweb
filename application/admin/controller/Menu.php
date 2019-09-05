<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\MenuModel;

use think\facade\Request;
use think\facade\Session;

class Menu extends Common
{
    public function index()
    {
        // 获取子菜单id
        $pid = (int)input('get.pid');
        if($pid){
            $where['pid'] = $pid;
        }else{
            $where['pid'] = true;
        }
        // 查询出菜单列表
        $list = MenuModel::where($where)->order('menu_id','asc')->all();
        $list['pid'] = $pid;
        // 子菜单
        if($pid > 0){
            $parent = MenuModel::where(array('menu_id'=>$pid))->order('menu_id','asc')->find();
            $backId = $parent['pid'];
            $this->view->assign('backId',$backId);
        }
        $this->view->assign('pid',$pid);
        $this->view->assign('list',$list);
        return $this->fetch();
    }
    // 添加菜单
    public function add()
    {
        $pid = (int)input('get.pid');
        if($pid > 0){
            $where['menu_id'] = $pid;
        }else{
            $where = true;
        }
        $parent_menu = MenuModel::where($where)->order('menu_id','asc')->select();
        foreach($parent_menu as $v){
            $parent_menu = $v;
        }
        
        $this->assign('pid',$pid);
        $this->assign('parent_menu',$parent_menu);
        return $this->fetch();
    }
    // 保存菜单background-image: linear-gradient(to right, #b8cbb8 0%, #b8cbb8 0%, #b465da 0%, #cf6cc9 33%, #ee609c 66%, #ee609c 100%);

    public function save()
    {   
        $pid = (int)input('post.pid');
        $data['pid'] = input('post.pid');
        $data['title'] = input('post.title');
        $data['controller'] = trim(input('post.controller'));
        $data['method'] = trim(input('post.method'));
        $data['ord'] = (int)input('post.ord');
        $data['pid'] = (int)input('post.pid');

        if(input('post.ishidden') == 'on'){
            $data['ishidden'] = 1;
        }else{
            $data['ishidden'] = 0;
        }
        if(input('post.status') == 'on'){
            $data['status'] = 1;
        }else{
            $data['status'] = 0;
        }

        if($data['title'] == ''){
            return json_encode(array('code'=>1,'msg'=>'菜单名称不能为空'));
        }
        if($data['controller'] == ''){
            return json_encode(array('code'=>1,'msg'=>'控制器名为空'));
        }
        if($data['method'] == ''){
            return json_encode(array('code'=>1,'msg'=>'方法名为空'));
        }
        
        $info = MenuModel::insert($data);
        if($info){
            exit(json_encode(array('code'=>0,'msg'=>'添加成功')));
        }else{
            exit(json_encode(array('code'=>1,'msg'=>'添加失败')));
        }
    }
}
