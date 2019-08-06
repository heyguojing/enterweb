<?php /*a:1:{s:61:"C:\wamp\www\enterweb\application\admin\view\system\index.html";i:1559664637;}*/ ?>
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
                <cite>导航元素</cite></a>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"
            href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
        <form class="layui-form">
            <div class="layui-form-item">
                <label for="site_name" class="layui-form-label" style="width: 100px">
                    <span class="x-red">*</span>网站名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="site_name" name="site_name" value="<?php echo htmlentities($system['site_name']); ?>" required=""
                        lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="about_title" class="layui-form-label" style="width: 100px">
                    <span class="x-red">*</span>关于我们标题
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="about_title" name="about_title" value="<?php echo htmlentities($system['about_title']); ?>" required=""
                        lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="about_content" class="layui-form-label" style="width: 100px">
                    <span class="x-red">*</span>关于我们内容
                </label>

                <div class="layui-input-inline">
                    <textarea placeholder="请输入关于我们内容" id="about_content" name="about_content"
                        class="layui-textarea"><?php echo htmlentities($system['about_content']); ?></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="desc_title" class="layui-form-label" style="width: 100px">
                    <span class="x-red">*</span>公司介绍标题
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="desc_title" name="desc_title" value="<?php echo htmlentities($system['com_int_title']); ?>" required=""
                        lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="desc_content" class="layui-form-label" style="width: 100px">
                    <span class="x-red">*</span>公司介绍内容
                </label>

                <div class="layui-input-inline">
                    <textarea placeholder="请输入公司介绍内容" id="desc_content" name="desc_content"
                        class="layui-textarea"><?php echo htmlentities($system['com_int_content']); ?></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="publicity_title" class="layui-form-label" style="width: 100px">
                    <span class="x-red">*</span>公司宣传标题
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="publicity_title" name="publicity_title" value="<?php echo htmlentities($system['com_x_title']); ?>"
                        required="" lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="publicity_content" class="layui-form-label" style="width: 100px">
                    <span class="x-red">*</span>公司宣传内容
                </label>
                <div class="layui-input-inline">
                    <textarea placeholder="请输入公司宣传内容" id="publicity_content" name="publicity_content"
                        class="layui-textarea"><?php echo htmlentities($system['com_x_cont']); ?></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label" style="width: 100px">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="">
                    保存
                </button>
            </div>
        </form>

    </div>

    <script>
        layui.use(['form'], function () {
            form = layui.form;
            //监听提交
            form.on('submit(add)', function (data) {
                //发异步，把数据提交给php
                console.log(data);
                $.ajax({
                    type: 'post',
                    url: '<?php echo url('System/edit'); ?>',
                    dataType: 'json',
                    data: {
                        'site_name': $('#site_name').val(),
                        'about_title': $('#about_title').val(),
                        'about_content': $('#about_content').val(),
                        'com_int_title': $('#desc_title').val(),
                        'com_int_content': $('#desc_content').val(),
                        'com_x_title': $('#publicity_title').val(),
                        'com_x_cont': $('#publicity_content').val()
                    },
                    success: function (dat) {
                        if (dat.status == 1) {
                            layer.msg(dat.msg, {
                                icon: 1,
                                time: 1000
                            }, function () {
                                location.reload();
                            });
                        } else {
                            layer.msg(dat.msg, {
                                icon: 5,
                                time: 1000
                            }, function () {
                                location.reload();
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