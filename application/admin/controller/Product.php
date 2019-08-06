<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\ProductModel;
use app\admin\model\SortModel;
use think\Controller;
use think\facade\Session;
use think\facade\Request;

class Product extends Common
{
    public function index()
    {
        $num = 8;
        $type = false;
        $config = [
            'type' => 'bootstrap',
            'var_page' => 'page'
        ];
        // 分页
        $data = ProductModel::order('id','asc')->paginate($num,$type,$config);
        $page = $data->render();
        // 分页数据
        $this->view->assign('pagedata',$data);
        // 分页
        $this->view->assign('page',$page);
        // 模版渲染
        return $this->view->fetch();
    }
    public function add()
    {
        // 获取分类模块的种类
        $res = SortModel::all();
        // 添加模板赋值
        $this->view->assign('sort_title',$res);
        // 模版渲染
        return $this->view->fetch();
    }
    public function DoAdd()
    {
        // 添加
        $data = Request::param();
        // 判断产品标题是否重复
        $title = $data['title'];
        $titles = ProductModel::where('title',$title)->find();
        if($titles){
            return ['res' => 0,'msg' => '产品标题重复'];
        }
        // time session
        $data['time'] = time();
        $data['username'] = Session::get('username');
        // insert
        $res = ProductModel::insert($data);
        // return
        if($res){
            return ['res' => 1,'msg' => '产品添加成功~~~'];
        }else{
            return ['res' => 0,'msg' => '产品添加失败!'];
        }
    }    
    public function edit()
    {
        // 根据id查询出当前编辑页面数据
        $id = Request::param('id');
        // 不能用select
        $data = ProductModel::where('id',$id)->find();
        if($data){
            //赋值给编辑页面
            $this->view->assign('data',$data);
        }else{
            return ['res' => 0,'msg' => '不存在该条数据！'];
        }
        // 模版渲染
        return $this->view->fetch();
    }
    public function DoEdit()
    {
        // 获取数据
        $data = Request::param();
        $id = $data['id'];
        // session
        $username = Session::get('username');
        // 更新操作
        $res = ProductModel::where('id',$id)->update([
            'title' => $data['title'],
            'sort' => $data['sort'],
            'desc' => $data['desc'],
            'content' => $data['content'],
            'once' => $data['once'],
            'over_night' => $data['over_night'],
            'time' => time(),
            'username' => $username,
        ]);
        // 结果返回
        if($res){
            return ['res' => 1,'msg' => '产品修改成功'];
        }else{
            return ['res' => 0,'msg' => '修改失败！'];
        }
    }
    public function upload()
    {
        // 图片上传
        $img = Request::file('img');
        // 验证
        $res = $img->validate(['ext' => 'jpg,jpeg,png'])->move('uploads/product');
        // 返回name名称
        if($res){
            return json(['errno' => 0,'data' => ['/uploads/product/'.$res->getSaveName()]]);
        }else{
            return $res->getError();
        }
    }
    public function del()
    {
        // 获取del Id
        $id = Request::param('id');
        // 删除操作
        $res = ProductModel::where('id',$id)->delete();
        if($res){
            return ['res' => 1,'msg' => '删除成功!'];
        }else{
            return ['res' => 0,'msg' => '删除失败'];
        }
    }
}