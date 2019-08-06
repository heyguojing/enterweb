<?php /*a:1:{s:60:"D:\wamp64\www\enterweb\application\admin\view\user\edit.html";i:1559093563;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PHP中文网后台管理系统</title>
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
    <div class="x-body">
        <form class="layui-form">
            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>登录名
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="username" name="username" value="<?php echo htmlentities($urlid['username']); ?>" required=""
                        lay-verify="required" autocomplete="off" class="layui-input">
                    <input type="hidden" id="userId" name="userId" value="<?php echo htmlentities($urlid['id']); ?>">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>将会成为您唯一的登入名
                </div>
            </div>
            <div class="layui-form-item">
                <label for="tel" class="layui-form-label">
                    <span class="x-red">*</span>手机
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="tel" name="tel" required="" lay-verify="phone" value="<?php echo htmlentities($urlid['tel']); ?>"
                        autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>将会成为您唯一的登入名
                </div>
            </div>
            <div class="layui-form-item">
                <label for="email" class="layui-form-label">
                    <span class="x-red">*</span>邮箱
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="email" name="email" required="" value="<?php echo htmlentities($urlid['email']); ?>" lay-verify="email"
                        autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="">
                    修改
                </button>
            </div>
        </form>
    </div>
    <script>
        layui.use(['form', 'layer'], function () {
            $ = layui.jquery;
            var form = layui.form,
                layer = layui.layer;

            //自定义验证规则
            form.verify({
                nikename: function (value) {
                    if (value.length < 5) {
                        return '昵称至少得5个字符啊';
                    }
                },
            });

            //监听提交
            form.on('submit(add)', function (data) {
                //发异步，把数据提交给php
                $.ajax({
                    type: 'post',
                    url: '<?php echo url('User/DoEdit'); ?>',
                    dataType: 'json',
                    data: {
                        'id': $('#userId').val(),
                        "username": $('#username').val(),
                        'tel': $('#tel').val(),
                        'email': $('#email').val(),
                    },
                    success: function (data) {
                        console.log(data);
                        if (data.res == 1) {
                            layer.alert(data.msg, {
                                icon: 6
                            }, function () {
                                // 获得frame索引
                                var index = parent.layer.getFrameIndex(
                                    window.name);
                                //关闭当前frame
                                parent.layer.close(index);
                                // 刷新页面
                                // location.replace(location.href);
                                parent.location.reload();
                            }, );
                        } else {
                            layer.alert(data.msg, {
                                icon: 6
                            }, function () {
                                // 获得frame索引
                                var index = parent.layer.getFrameIndex(window.name);
                                //关闭当前frame
                                parent.layer.close(index);
                                parent.location.reload();
                            });
                        }
                    },
                })
                return false;
            });
        });
    </script>
</body>

</html>