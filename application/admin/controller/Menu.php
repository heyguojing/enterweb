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
            $where['pid'] = 0;
        }
        // 查询出菜单列表
        $list = MenuModel::where($where)->order('menu_id','asc')->all();
        $list['pid'] = $pid;
        // 子菜单
        if($pid > 0){
            $parent = MenuModel::where(array('ord'=>$pid))->order('menu_id','asc')->find();
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
        $mid = (int)input('get.mid');
        if($pid > 0){
            $where['menu_id'] = $pid;
        }else{
            $where['pid'] = 0;
        }
        $parent_menu = MenuModel::where($where)->order('ord','asc')->select();
        foreach($parent_menu as $v){
            $parent_menu = $v;
        }
        // 编辑菜单
        $edit = MenuModel::where('menu_id',$mid)->find();
        $this->assign('edit',$edit);
        $this->assign('pid',$pid);
        $this->assign('parent_menu',$parent_menu);
        return $this->fetch();
    }
    // 编辑菜单
    public function edit(){
        $mid = (int)input('get.mid');
        if($mid == null){
            return json_encode(array('code'=>0,'msg'=>'菜单不存在!'));
        }else{
            $data = MenuModel::where('menu_id',$mid)->find();
            $this-assign('editData',$data);
        }
    }
    public function save()
    {   
        $pid = (int)input('post.pid');
        $mid = (int)input('get.mid');
        $data['pid'] = (int)input('post.pid');
        $data['title'] = input('post.title');
        $data['controller'] = trim(input('post.controller'));
        $data['method'] = trim(input('post.method'));
        $data['ord'] = (int)input('post.ord');
        $data['pid'] = (int)input('post.pid');
        $data['ishidden'] = input('post.ishidden');
        $data['status'] = input('post.status');

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

        if($mid == '' || $mid == null){
            $info = MenuModel::insert($data);
        }else{
            $info = MenuModel::where('menu_id',$mid)->update($data);
        }
        
        if($info){
            exit(json_encode(array('code'=>0,'msg'=>'添加成功')));
        }else{
            exit(json_encode(array('code'=>1,'msg'=>'添加失败')));
        }
    }
    // 删除
    public function delete()
    {
        $mid = (int)input('post.mid');
        $res = MenuModel::where('menu_id',$mid)->delete();
        if($res){
            exit(json_encode(array('code'=>0,'msg'=>'删除成功')));
        }else{
            exit(json_encode(array('code'=>1,'msg'=>'删除失败')));
        }
    }
}
