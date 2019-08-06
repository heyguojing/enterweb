<?php /*a:1:{s:65:"D:\wamp64\www\enterweb\application\admin\view\carousel\index.html";i:1559266445;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/static/admin/css/font.css">
    <link rel="stylesheet" href="/static/admin/css/xadmin.css">
    <script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
    <!-- <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script> -->
</head>

<body>
    <div class="x-nav">
        <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">演示</a>
            <a>
                <cite>导航元素</cite>
            </a>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"
            href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">ဂ</i>
        </a>
    </div>
    <div class="x-body">
        <xblock>
            <button class="layui-btn" onclick="x_admin_show('添加轮播图','<?php echo url('Carousel/add'); ?>')">
                <i class="layui-icon"></i>添加</button>
            <span class="x-right" style="line-height:40px">共有数据：88 条</span>
        </xblock>
        <table class="layui-table layui-form">
            <thead>
                <tr>
                    <th width="70">轮播图ID</th>
                    <th>轮播图</th>
                    <th>轮播图标题</th>
                    <th width="200">轮播图描述</th>
                    <th width="200">管理员</th>
                    <th width="200">发布时间</th>
                    <th width="200">操作</th>
            </thead>
            <tbody>
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$datav): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo htmlentities($datav['id']); ?></td>
                    <td>
                        <img src="<?php echo htmlentities($datav['pic']); ?>">
                    </td>
                    <td><?php echo htmlentities($datav['title']); ?></td>
                    <td><?php echo htmlentities($datav['desc']); ?></td>
                    <td><?php echo htmlentities($datav['username']); ?></td>
                    <td><?php echo htmlentities(date('Y-m-d H:i',!is_numeric($datav['time'])? strtotime($datav['time']) : $datav['time'])); ?></td>
                    <td class="td-manage">
                        <button class="layui-btn-danger layui-btn layui-btn-xs" onclick="member_del(this,'<?php echo htmlentities($datav['id']); ?>')"
                            href="javascript:;">
                            <i class="layui-icon">&#xe640;</i>删除
                        </button>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div class="page">
            <div>
                <?php echo $page; ?>
            </div>
        </div>
    </div>
    <script>
        layui.use('laydate', function () {
            var laydate = layui.laydate;
            //执行一个laydate实例
            laydate.render({
                elem: '#start' //指定元素
            });

            //执行一个laydate实例
            laydate.render({
                elem: '#end' //指定元素
            });
        });

        /*用户-删除*/
        function member_del(obj, id) {
            layer.confirm('确认要删除吗？', function (index) {
                //发异步删除数据
                $.ajax({
                    type: 'post',
                    url: '<?php echo url('Carousel/del'); ?>',
                    dataType: 'json',
                    data: {
                        'id': id
                    },
                    success: function (dat) {
                        if (dat.status == 1) {
                            layer.msg(dat.msg, {
                                icon: 1,
                                time: 1000
                            }, function () {
                                window.location.reload();
                            });
                        } else {
                            $(obj).parents("tr").remove();
                            layer.msg(dat.msg, {
                                icon: 1,
                                time: 1000
                            }, function () {
                                window.location.reload();
                            });
                        }
                    }
                })
            });
        }
    </script>

</body>

</html>