<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\NewsModel;
use app\admin\model\NewsPicModel;
use think\facade\Request;
use think\facade\Session;

class NewsPic extends Common
{
    public function index()
    {
        // 分页数据
        $num = 5;
        $type = false;
        $config = [
            'type' => 'bootstrap',
            'var_page' => 'page',
        ];
        $newspic = NewsPicModel::order('id')->paginate($num,$type,$config);
        // 模板赋值
        $newspage = $newspic->render();
        $this->view->assign('newspic',$newspic);
        $this->view->assign('newspage',$newspage);
        // 渲染模板
        return $this->view->fetch();
    }
    public function add()
    {
        // 查询所有数据
        $news = NewsModel::order('id','asc')->all();

        // foreach($news as $k => $v){
        //     print_r($v->title);
        // }

        // 模板赋值
        $this->view->assign('news',$news);
        // 渲染添加模板
        return $this->view->fetch();
    }
    // 图片上传
    public function upload()
    {
        // 获取图片
        $res = Request::file('file');
        // 验证图片并移动到文件夹
        $file = $res->validate(['ext' => 'jpg,jpeg,png'])->move('uploads/newspic/');
        
        // 判断 
        if($file){
            return json([1,'上传成功','data' => ['/uploads/newspic/'.$file->getSaveName()]]);
        }else{
            return $file->getError();
        }
    }
    public function DoAdd()
    {
        // 添加图片信息到表news_pic
        $res = Request::param();
        // time
        $res['time'] = time();
        // session
        $res['username'] = Session::get('username');
        // insert
        $info = NewsPicModel::insert($res);
        // if result
        if($info){
            return ['res' => 1,'msg' => '上传成功~~'];
        }else{
            return ['res' => 0,'msg' => '上传失败!'];
        }
    }
    public function del()
    {
        // delete
        $id = Request::param('id');
        $res = NewsPicModel::where('id',$id)->delete();
        if($res){
            return ['res' => 1,'msg' => '删除成功!'];
        }else{
            return ['res' => 0,'msg' => '删除失败!'];
        }
    }
}