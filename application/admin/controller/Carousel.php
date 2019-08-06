<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\CarouselModel;
use think\facade\Request;
use think\facade\Session;

class Carousel extends Common
{
    /**
     * 首页查询
     */
    public function index()
    {
        // 分页
        $data = CarouselModel::order('id','asc')->paginate(8);
        // 分页脚
        $page = $data->render();
        // 模板赋值
        $this->view->assign('data',$data);
        $this->view->assign('page',$page);
        // 模板渲染
        return $this->view->fetch();
    }
    /**
     * 添加界面模板渲染
     */
    public function add()
    {
        // 模板渲染
        return $this->view->fetch();
    }
    /**
     * 图片上传
     */
    public function uploads()
    {
        // 获取图片
        $img = Request::file('file');
        // 验证并移动
        $file = $img->validate(['ext' => 'jpg,jpeg,png'])->move('uploads/carousel');
        // 结果返回
        if($file){
            return json(['errno' => 1,'data' => '/uploads/carousel/'.$file->getSaveName()]);
        }else{
            return $file->getError();
        }
    }
    /**
     * 添加
     */
    public function DoAdd()
    {
        // 获取参数
        $data = Request::param();
        // 当前时间
        $data['time'] = time();
        // session
        $data['username'] = Session::get('username');
        // 添加操作
        $res = CarouselModel::insert($data);
        // 结果返回
        if($res){
            return ['stat' => 1,'msg' => '轮播图添加成功~~'];
        }else{
            return ['stat' => 0,'msg' => '轮播图添加失败!'];
        }
    }
    /**
     * 删除
     */
    public function del()
    {
        // 获取id
        $id = Request::param('id');
        // 删除
        $res = CarouselModel::where('id',$id)->delete();
        // 
        if($res){
            return ['status' => 1,'msg' => '轮播图删除成功~~'];
        }else{
            return ['status' => 0,'msg' => '轮播图删除失败！'];
        }
    }
}