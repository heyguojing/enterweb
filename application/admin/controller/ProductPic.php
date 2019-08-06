<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\ProductPicModel;
use app\admin\model\ProductModel;
use think\facade\Session;
use think\facade\Request;

class ProductPic extends Common
{
    public function index()
    {
        $num = 7;
        $type = false;
        $config = [
            'type' => 'bootstrap',
            'var_page' => 'page'
        ];
        $res = ProductPicModel::order('id','asc')->paginate($num,$type,$config);
        $page = $res->render();
        // 
        $this->view->assign('propic',$res);
        // 
        $this->view->assign('pagepic',$page);
        // 模板渲染
        return $this->view->fetch();
    }
    public function upload()
    {
        // 获取图片
        $img = Request::file('file');
        // 图片验证
        $file = $img->validate(['ext' => 'jpg,jpeg,png'])->move('uploads/productpic/');
        // 判断并返回结果
        if($file){
            return json([1,'产品图片上传成功~~','data' => ['/uploads/productpic/'.$file->getSaveName()]]);
        }else{
            return $file->getError();
        }
    }
    public function add()
    {
        // 根据主键id查询出产品表product种类
        $data = ProductModel::order('id','asc')->all();
        // $data = ProductModel::order('id','asc')->select();
        $this->view->assign('product',$data);
        // 渲染添加产品页面
        return $this->view->fetch();
    }
    public function DoAdd()
    {   
        $res = Request::param();
        $res['time'] = time();
        $res['username'] = Session::get('username');
        $info = ProductPicModel::insert($res);
        if($info){
            return ['res' => 1,'msg' => '产品图片添加成功~~'];
        }else{
            return ['res' => 0,'msg' => '产品图片添加失败！！'];
        }
        // return $this->view->fetch();
    }
    public function del()
    {
        $id = Request::param('id');
        $res = ProductPicModel::where('id',$id)->delete();
        if($res){
            return ['res' => 1,'msg' => '产品删除成功~~'];
        }else{
            return ['res' => 0,'msg' => '产品删除失败!'];
        }
    }
}