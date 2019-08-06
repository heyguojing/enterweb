<?php /*a:1:{s:63:"D:\wamp64\www\enterweb\application\admin\view\news_pic\add.html";i:1559093563;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/static/admin/css/font.css">
    <link rel="stylesheet" href="/static/admin/css/xadmin.css">
    <script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
    <script type="text/javascript" src="/static/admin/js/wangEditor.js"></script>

</head>

<body>
    <div class="x-body">
        <form class="layui-form">
            <div class="layui-form-item">
                <label for="newsId" class="layui-form-label">
                    <span class="x-red">*</span>选择新闻
                </label>
                <div class="layui-input-inline">
                    <select name="newsId" id="newsId">
                        <?php if(is_array($news) || $news instanceof \think\Collection || $news instanceof \think\Paginator): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['title']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">产品图片</label>
                <div class="layui-input-block">
                    <button type="button" class="layui-btn" id="upload">图片上传</button>
                    <div class="layui-upload-list" id="thumbnail"></div>
                </div>

            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="">
                    增加
                </button>
            </div>
        </form>
    </div>
    <script src="/static/admin/lib/layui/layui.js"></script>
    <script>
        layui.use(['form', 'layer', 'upload'], function () {
            $ = layui.jquery;
            var form = layui.form,
                layer = layui.layer;

            var $ = layui.jquery,
                upload = layui.upload;

            upload.render({
                elem: '#upload',
                url: "<?php echo url('NewsPic/upload'); ?>",
                multiple: true,
                before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        $('#thumbnail').append('<img src="' + result + '" alt="' + file
                            .name + '" class="layui-upload-img">')
                    });
                },
                done: function (res) {
                    //上传完毕
                    $('#thumbnail').append('<input type="hidden" name="pic" id="pic" value="' + res
                        .data + '" />')
                }
            });
            //监听提交
            form.on('submit(add)', function (data) { 
                console.log(data);
                //发异步，把数据提交给php
                $.ajax({
                    type: 'post',
                    url: '<?php echo url('NewsPic/DoAdd'); ?>',
                    dataType: 'json',
                    data: {
                        'news_id': $('#newsId').val(),
                        'picurl': $('#pic').val(),
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
                                // 刷新当前frame
                                parent.window.location.reload();
                            });
                        } else {
                            layer.alert(data.msg, {
                                icon: 5
                            }, function () {
                                // 获得frame索引
                                var index = parent.layer.getFrameIndex(window.name);
                                //关闭当前frame
                                parent.layer.close(index);
                                // 刷新当前frame
                                parent.window.location.reload();
                            });
                        }
                    }
                });
                return false;
            });
        });
    </script>
</body>

</html>