<?php /*a:1:{s:60:"C:\wamp\www\enterweb\application\admin\view\login\login.html";i:1564554797;}*/ ?>
<!Doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/static/admin/css/font.css">
    <link rel="stylesheet" href="/static/admin/css/xadmin.css">
    <script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
    <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
    <style>
        #captcha {
            width: 170px;
            float: left;
        }

        #verify-img {
            float: left;
            margin-left: 20px;
        }
        /* input[name=username]:focus {border: 1px solid #DCDEE0 !important;} */
    </style>
</head>

<body class="login-bg">

    <div class="login layui-anim layui-anim-up">
        <div class="message">后台管理系统登录</div>
        <div id="darkbannerwrap"></div>
        <!-- at 23:30 shutdown -s -->
        <form method="post" class="layui-form">
            <input name="username" placeholder="用户名" type="text" id="username" lay-verify="required"
                class="layui-input">
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码" id="password" type="password"
                class="layui-input">
            <hr class="hr15">
            <input type="text" class="layui-input-inline" name="captcha" id="captcha" placeholder="验证码">
            <img class="layui-input-inline" id="verify-img" onclick="reloadCapt()" src="<?php echo captcha_src(); ?>" />
            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20">
        </form>
    </div>

    <script>
        $(function () {
            layui.use('form', function () {
                var form = layui.form;
                $('#username').focus();
                $('input').keydown(function (e) {
                    if (e.keyCode == 13) {
                        //监听提交
                        form.on('submit(login)', function (data) {
                            $.ajax({
                                type: 'post',
                                url: '<?php echo url('Login/DoLogin'); ?>',
                                dataType: 'json',
                                data: {
                                    'username': $('#username').val(),
                                    'password': $('#password').val(),
                                    'captcha': $('#captcha').val()
                                },
                                success: function (data) {
                                    if (data.res == 1) {
                                        layer.msg(data.msg, {
                                            icon: 1,
                                            time: 1500
                                        }, function () {
                                            location.href =
                                                "<?php echo url('Index/index'); ?>";
                                        });
                                        // layer.msg(data.msg,{icon:1,time:1000});
                                    } else {
                                        reloadCapt();
                                        layer.msg(data.msg, {
                                            icon: 1,
                                            time: 2000
                                        }, function () {});
                                    }
                                }
                            });
                            return false;
                        });
                    }
                })

            });
        })
        function reloadCapt() {
            $('#verify-img').attr('src', '<?php echo captcha_src(); ?>?rand=' + Math.random());
        }
    </script>
</body>

</html>