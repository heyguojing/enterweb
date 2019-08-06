<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Controller;
use think\facade\Request;
use app\admin\model\NewsModel;
use think\facade\Session;
class News  extends Common
{
    public function index()
    {
        $num = 10;
        $type = false;
        $config = [
            'type' => 'bootstrap',
            'var_page' => 'page',
        ];
        $pagedata = NewsModel::order('id','asc')->paginate($num,$type,$config);
        $page = $pagedata->render();
        // 
        $this->view->assign('pagedata',$pagedata);
        $this->view->assign('page',$page);
        // 渲染
        return $this->view->fetch();
    }
    // 图片上传
    public function upload()
    {
        $res = Request::file('img');
        $file = $res->validate(['ext' => 'jpg,jpeg,png'])->move('uploads/news');
        if($file){
            return json(['errno' => 0,'data' => ['/uploads/news/'.$file->getSaveName()]]);
        }else{
            return $res->getError();
        }
    }
    public function add()
    {
        // 渲染
        return $this->view->fetch();
    }
    // 新闻添加
    public function DoAdd()
    {
        // param
        $data = Request::param();
        // 判断标题是否重复
        $title = NewsModel::where('title',$data['title'])->find();
        if($title){
            return ['res' => 0,'msg' => '新闻标题重复'];
        }
        // time
        $data['time'] = time();
        // session 管理员姓名
        $data['username'] = Session::get('username');
        $info = NewsModel::insert($data);
        if($info){
            return ['res' => 1,'msg' => '新闻添加成功！'];
        }else{
            return ['res' => 0,'msg' => '新闻添加失败'];
        }
    }
    public function edit()
    {
        $newsId = Request::param('id');
        $res = NewsModel::where('id','=',$newsId)->find();
        if($res){
            $this->view->assign('news',$res);
        }else{
            return ['res' => 0,'msg' => 'id不存在!'];
        }
        // 渲染
        return $this->view->fetch();
    }
    public function DoEdit()
    {
        // 获取param
        $data = Request::param();
        // 获取主键id
        $newsId = $data['id'];
        // 获取session
        $data['username'] = Session::get('username');
        // 执行更新操作
        $res = NewsModel::update([
            'title' => $data['title'],
            'desc' => $data['desc'],
            'content' => $data['content'],
            'username' => $data['username'],
            'time' => time(),
        ],function($query) use ($newsId){
            $query->where('id',$newsId);
        });
        // 结果返回
        if($res){
            return ['res' => 1,'msg' => '修改成功!'];
        }else{
            return ['res' => 0,'msg' => '修改失败！'];
        }
    }
    public function del()
    {
        // del
        $newsId = Request::param('id');
        $res = NewsModel::where('id',$newsId)->delete();
        if($res){
            return ['res' => 1,'msg' => '删除成功'];
        }else{
            return ['res' => 0,'msg' => '删除失败'];
        }
    }
}