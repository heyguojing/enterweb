<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Test;
use think\controller;
use think\facade\Request;

class Test extends Common
{
    public function index()
    {
        // 
        return $this->fetch();
    }
}