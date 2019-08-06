<?php /*a:1:{s:60:"D:\wamp64\www\enterweb\application\admin\view\news\edit.html";i:1559093563;}*/ ?>
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
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="x-body">
        <form class="layui-form">
            <div class="layui-form-item">
                <label for="title" class="layui-form-label">
                    <span class="x-red">*</span>新闻标题
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="title" name="title" required="" lay-verify="required" autocomplete="off"
                        class="layui-input" value="<?php echo htmlentities($news['title']); ?>">
                    <input id="newsId" value="<?php echo htmlentities($news['id']); ?>" type="hidden">
                </div>
            </div>
            <!-- <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>新闻分类
                </label>
                <div class="layui-input-inline">
                    <select id="shipping" name="shipping" class="valid">
                        <option value="shentong">热门新闻</option>
                        <option value="shunfeng">紧急新闻</option>
                    </select>
                </div>
            </div> -->
            <div class="layui-form-item">
                <label for="desc" class="layui-form-label">
                    <span class="x-red">*</span>简介
                </label>

                <div class="layui-input-inline">
                    <textarea placeholder="请输入内容" id="desc" name="desc" class="layui-textarea"><?php echo htmlentities($news['desc']); ?></textarea>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label for="desc" class="layui-form-label">
                    内容
                </label>
                <div class="layui-input-block" id="editor">
                    <?php echo htmlspecialchars_decode($news['content']); ?>
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
    <script type="text/javascript" src="/static/admin/js/wangEditor.js"></script>
    <script>
        layui.use(['form', 'layer'], function () {
            $ = layui.jquery;
            var form = layui.form,
                layer = layui.layer;

            //配置wangEditor富文本编辑器
            ////将要用到的对象添加到全局
            var E = window.wangEditor

            //生成editor对象
            var editor = new E('#editor')

            //设置图片上传的控件名称:类似于input的name属性,供接口获取图片信息使用
            editor.customConfig.uploadFileName = 'img'

            //设置服务上的图片上传处理接口脚本
            editor.customConfig.uploadImgServer = '<?php echo url("upload"); ?>'

            //创建出富文件编辑器
            editor.create()

            //自定义验证规则
            form.verify({
                nikename: function (value) {
                    if (value.length < 5) {
                        return '昵称至少得5个字符啊';
                    }
                },
                pass: [/(.+){6,12}$/, '密码必须6到12位'],
                repass: function (value) {
                    if ($('#L_pass').val() != $('#L_repass').val()) {
                        return '两次密码不一致';
                    }
                }
            });

            //监听提交
            form.on('submit(add)', function (data) {
                console.log(data);
                //发异步，把数据提交给php
                $.ajax({
                    type: 'post',
                    url: '<?php echo url('News/DoEdit'); ?>',
                    dataType: 'json',
                    data: {
                        'id':$('#newsId').val(),
                        'title': $('#title').val(),
                        'desc': $('#desc').val(),
                        'content': editor.txt.html(),
                    },
                    success: function (data) {
                        if (data.res == 1) {
                            layer.alert(data.msg, {
                                icon: 6
                            }, function () {
                                // 获得frame索引
                                var index = parent.layer.getFrameIndex(window.name);
                                //关闭当前frame
                                parent.layer.close(index);
                                parent.location.reload();
                            });
                        } else {
                            layer.alert(data.msg, {
                                icon: 5
                            }, function () {
                                // 获得frame索引
                                var index = parent.layer.getFrameIndex(window.name);
                                //关闭当前frame
                                parent.layer.close(index);
                            });
                        }
                    }
                })
                return false;
            });
        });
    </script>
</body>

</html>