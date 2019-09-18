<?php /*a:3:{s:60:"C:\wamp\www\enterweb\application\admin\view\index\index.html";i:1567737632;s:60:"C:\wamp\www\enterweb\application\admin\view\public\head.html";i:1559267158;s:60:"C:\wamp\www\enterweb\application\admin\view\public\left.html";i:1568274016;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>企业网站后台管理系统</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/static/admin/css/font.css">
	<link rel="stylesheet" href="/static/admin/css/xadmin.css">
    <script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
    <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>

</head>
<body>
    <!-- 头部开始 -->
        <!-- 顶部开始 -->
    <div class="container">
        <div class="logo"><a href="./index.html">后台管理系统</a></div>
        <ul class="layui-nav right" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;"><?php echo htmlentities($username); ?></a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <!-- <dd><a onclick="x_admin_show('个人信息','')">个人信息</a></dd>
              <dd><a onclick="x_admin_show('切换帐号','<?php echo url('Login/LogOut'); ?>')">切换帐号</a></dd> -->
              <dd><a href="./index.html">个人信息</a></dd>
              <dd><a href="<?php echo url('Login/LogOut'); ?>">切换帐号</a></dd>
              <dd><a href="<?php echo url('Login/LogOut'); ?>">退出</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item to-index"><a href="/" target="_blank">前台首页</a></li>
        </ul>
        
    </div>
    <!-- 顶部结束 -->
    
    <!-- 左侧菜单开始 -->
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe726;</i>
                    <cite>管理员管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('User/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>管理员列表</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a2;</i>
                    <cite>新闻管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('News/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>新闻列表</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="<?php echo url('NewsPic/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>新闻列表图</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6f6;</i>
                    <cite>产品管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('Product/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>产品列表</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="<?php echo url('ProductPic/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>产品列表图</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe699;</i>
                    <cite>分类管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('Sort/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>分类列表</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6ae;</i>
                    <cite>系统设置</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('System/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>系统设置</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="<?php echo url('Carousel/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>首页轮播图</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="<?php echo url('System/contact'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>表单(Contact)</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="<?php echo url('System/creatCard'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>微信接口调用测试</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont layui-icon layui-icon-username"></i>
                    <cite>权限管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('Menu/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>菜单列表</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="<?php echo url('Menu/Roles'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>角色列表</cite>
                        </a>
                    </li>                    
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- <div class="x-slide_left"></div> -->
<!-- 左侧菜单结束 -->
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
          <ul class="layui-tab-title">
            <li class="home"><i class="layui-icon">&#xe68e;</i>我的桌面</li>
          </ul>
          <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src='<?php echo url('welcome'); ?>' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
          </div>
        </div>
    </div>

    <!-- 底部结束 -->

</body>
</html>