<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\SystemModel;
use app\admin\model\ContactModel;
use think\facade\Request;
use think\facade\Session;

class System extends Common
{
    public function index()
    {
        // 首页查询出数据
        $res = SystemModel::all();
        foreach($res as $val){
            // 模板赋值
            $this->view->assign('system',$val);
        }
        // 模板渲染
        return $this->view->fetch();
    }
    /**
     * System
     */
    public function edit()
    {
        // 系统更新
        $data = Request::param();
        $datas = [
            'site_name' => $data['site_name'],
            'about_title' => $data['about_title'],
            'about_content' => $data['about_content'],
            'com_int_title' => $data['com_int_title'],
            'com_int_content' => $data['com_int_content'],
            'com_x_title' => $data['com_x_title'],
            'com_x_cont' => $data['com_x_cont'],
            'time' => time(),
            'username' => Session::get('username')
        ];
        $res = SystemModel::where('id',1)->update($datas);
        if($res){
            return ['status' => 1,'msg' => '修改成功~~'];
        }else{
            return ['status' => 0,'msg' => '修改失败!'];
        }
    }
    /**
     * 后台contact查看
     */
    public function contact()
    {
        $data = ContactModel::order('id','asc')->paginate(8);
        // $datas = ContactModel::order('id')->select();
        $page = $data->render();
        $this->view->assign('cardata',$data);
        $this->view->assign('carpage',$page);
        // 页面渲染
        return $this->view->fetch();
    }
    /**
     * 前台contact提交,数据库添加
     */
    public function AddContact()
    {
        $data = Request::param();
        $email = ContactModel::where('email',$data['email'])->find();
        if($email){
            return ['stat' => 0,'msg' => '邮箱已经提交过，请更换邮箱'];
        }
        $data['time'] = time();
        $data['ip'] = 'customer';
        $res = ContactModel::insert($data);
        if($res){
            return ['stat' => 1,'msg' => '提交成功，我们会在第一时间联系您~~'];
        }else{
            return ['stat' => 0,'msg' => '提交失败，请重新提交'];
        }
        // 页面渲染
        return $this->view->fetch();
    }
    public function creatCard()
    {
        return $this->view->fetch();
    }
}
