<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\SortModel;
use think\facade\Session;
use think\facade\Request;

class Sort extends Common
{
    public function index()
    {
        // 分页查询
        $res = SortModel::order('id','asc')->paginate(8);
        // 模板赋值
        $this->view->assign('pagedata',$res);
        // 渲染
        return $this->view->fetch();
    }
    public function DoAdd()
    {
        // 获取submit参数
        $data = Request::param();
        if($data['title'] == ""){
            return ['status' => 0,'msg' => '产品标题为空'];
        }
        // 设置时间
        $data['time'] = time();
        // 获取session
        $data['username'] = Session::get('username');
        // 添加操作
        $res = SortModel::insert($data);
        // 结果返回
        if($res){
            return ['status' => 1,'msg' => '分类添加成功~~'];
        }else{
            return ['status' => 0,'msg' => '添加失败!'];
        }
        // 渲染
        return $this->view->fetch();
    }
    public function edit()
    {
        // 根据id查询出数据
        $id = Request::param('id');
        $res = SortModel::where('id',$id)->find();
        $this->view->assign('sortid',$res);
        // 模板渲染
        return $this->view->fetch();
    }
    public function DoEdit()
    {
        // 获取ajax
        $data = Request::param();
        // 更新操作
        $res = SortModel::where('id',$data['sid'])->update([
            'title' => $data['title'],
            'time' => time(),
            'username' => Session::get('username')
        ]);
        // 判断
        if($res){
            return ['status' => 1,'msg' => '产品名称修改成功~~'];
        }else{
            return ['status' => 0,'msg' => '修改失败！！'];
        }
    }
    public function del()
    {
        // 获取id
        $id = Request::param('id');
        $res = SortModel::where('id',$id)->delete();
        if($res){
            return ['status' => 1,'msg' => '产品种类名称删除成功~~'];
        }else{
            return ['status' => 0,'msg' => '删除失败'];
        }
    }
}
