<?php /*a:1:{s:65:"D:\wamp64\www\enterweb\application\admin\view\system\contact.html";i:1559616936;}*/ ?>
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
</head>

<body>
    <div class="x-nav">
        <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">演示</a>
            <a>
                <cite>导航元素</cite></a>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"
            href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
        <table class="layui-table layui-form">
            <thead>
                <tr>
                    <th width="70">ID</th>
                    <th width="200">姓名</th>
                    <th width="200">邮箱</th>
                    <th width="200">需求</th>
                    <th width="200">备注</th>
                    <th width="200">时间</th>
                    <th width="200">操作</th>
            </thead>
            <tbody>
                <?php if(is_array($cardata) || $cardata instanceof \think\Collection || $cardata instanceof \think\Paginator): $i = 0; $__LIST__ = $cardata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$carshow): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo htmlentities($carshow['id']); ?></td>
                    <td><?php echo htmlentities($carshow['name']); ?></td>
                    <td><?php echo htmlentities($carshow['email']); ?></td>
                    <td><?php echo htmlentities($carshow['need']); ?></td>
                    <td><?php echo htmlentities($carshow['desc']); ?></td>
                    <td><?php echo htmlentities(date("Y-m-d H:i",!is_numeric($carshow['time'])? strtotime($carshow['time']) : $carshow['time'])); ?></td>
                    <td class="td-manage">
                        <button class="layui-btn layui-btn layui-btn-xs" onclick="member_del('编辑','<?php echo url('System/edit'); ?>?id=')">
                            <i class="layui-icon">&#xe642;</i>编辑
                        </button>
                        <button class="layui-btn-danger layui-btn layui-btn-xs" onclick="member_del(this,'<?php echo htmlentities($carshow['id']); ?>')" href="javascript:;">
                            <i class="layui-icon">&#xe640;</i>删除
                        </button>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div class="page">
            <div>
                <?php echo $carpage; ?>
            </div>
        </div>
    </div>
    <script>
        layui.use(['form'], function () {
            form = layui.form;
            form.on('submit(sreach)', function (data) {
                $.post("<?php echo url('Sort/DoAdd'); ?>", {
                    'title': $('#title').val()
                }, function (data) {
                    if (data.status == 1) {
                        layer.msg(data.msg, {
                            icon: 1,
                            time: 1000
                        }, function () {
                            window.location.reload();
                        });
                    } else {
                        layer.msg(data.msg, {
                            icon: 1,
                            time: 1000
                        });
                    }
                })
                return false;
            })
        });
        /*用户-删除*/
        function member_del(obj, id) {
            //发异步删除数据
            layer.msg('不允许操作！', {
                icon: 1,
                time: 1000
            });
        }
    </script>
</body>

</html>