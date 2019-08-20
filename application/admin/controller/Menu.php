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
        // 查询出菜单
        $list = MenuModel::order('menu_id','asc')->all();
        $this->view->assign('list',$list);
        return $this->fetch();
    }
    // 添加菜单
    public function add()
    {
        return $this->fetch();
    }
    // 保存菜单
    public function save()
    {
        $data['title'] = input('post.title');
        $data['controller'] = trim(input('post.controller'));
        $data['method'] = trim(input('post.method'));
        $data['ord'] = (int)input('post.ord');
        $data['pid'] = (int)input('post.pid');
        $data['ishidden'] = (int)input('post.ishidden');
        $data['status'] = (int)input('post.status');

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
