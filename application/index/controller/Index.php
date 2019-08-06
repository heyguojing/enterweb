<?php
namespace app\index\controller;
use app\admin\model\CarouselModel;
use app\admin\model\ContactModel;
use think\facade\Request;
use think\facade\Session;
use think\Controller;
use think\Db;
class Index extends Controller
{
    public function index()
    {
        $carousel = CarouselModel::order('id','asc')->select();
        foreach($carousel as $key => $val){
            $carousel[$key]['pic'] = str_replace('\\','/',$val['pic']);
        }
        $this->view->assign('carousel',$carousel);
        // 模板渲染
        return $this->view->fetch();
    }
    public function about()
    {
        
        // 模板渲染
        return $this->fetch();
    }
    public function contact()
    {

        // 模板渲染
        return $this->fetch();
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
    }   
    public function taoBao()
    {
        $c = new TopClient;
        $c->appkey = $appkey;
        $c->secretKey = $secret;
        $req = new ProductsSearchRequest;
        $req->setFields("product_id,name,pic_url,cid,props,price,tsc");
        $req->setQ("优衣库 1234");
        $req->setCid("50011999");
        $req->setProps("pid:vid;pid:vid");
        $req->setStatus("3");
        $req->setPageNo("1");
        $req->setPageSize("40");
        $req->setVerticalMarket("4");
        $req->setCustomerProps("20000:优衣库:型号:001:632501:1234");
        $req->setSuiteItemsStr("1000000062318020:1;1000000062318020:2;");
        $req->setBarcodeStr("6924343550791,6901028180559");
        $req->setMarketId("2");
        $resp = $c->execute($req);
    } 
}
