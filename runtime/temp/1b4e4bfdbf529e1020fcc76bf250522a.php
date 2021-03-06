<?php /*a:1:{s:60:"D:\wamp64\www\enterweb\application\admin\view\sort\edit.html";i:1559093563;}*/ ?>
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
    <div class="x-body">
        <form class="layui-form">
            <div class="layui-form-item">
                <label for="title" class="layui-form-label">
                    <span class="x-red">*</span>分类名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="title" name="title" required="" value="<?php echo htmlentities($sortid['title']); ?>" lay-verify="required"
                        autocomplete="off" class="layui-input">
                        <input type="hidden" id="sid" name="sid" value="<?php echo htmlentities($sortid['id']); ?>">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>将会成为您唯一分类名称
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button class="layui-btn" lay-filter="sortadd" lay-submit="">
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
                pass: [/(.+){6,12}$/, '密码必须6到12位'],
                repass: function (value) {
                    if ($('#password').val() != $('#L_repass').val()) {
                        return '两次密码不一致';
                    }
                }
            });

            //监听提交
            form.on('submit(sortadd)', function (data) {
                //发异步，把数据提交给php
                $.ajax({
                    type: 'post',
                    url: '<?php echo url('Sort/DoEdit'); ?>',
                    dataType: 'json',
                    data: {
                        "title": $('#title').val(),
                        "sid": $('#sid').val(),
                    },
                    success: function (data) {
                        console.log(data);
                        if (data.status == 1) {
                            layer.alert(data.msg, {
                                icon: 6
                            }, function () {
                                // 获得frame索引
                                var index = parent.layer.getFrameIndex(
                                    window.name);
                                //关闭当前frame
                                parent.layer.close(index);
                                parent.location.reload();
                            });
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