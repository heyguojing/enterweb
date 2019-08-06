<?php /*a:1:{s:61:"C:\wamp\www\enterweb\application\admin\view\carousel\add.html";i:1559664637;}*/ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>PHP中文网后台管理系统</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
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
        <div>
            <label class="layui-form-label">轮播图</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="upload" >图片上传</button><label>&nbsp;&nbsp;请上传尺寸1920*813的图片（jpg/jpeg/png）</label>
                <div class="layui-upload-list" id="thumbnail"></div>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="title" class="layui-form-label">
                <span class="x-red">*</span>轮播图标题
            </label>

            <div class="layui-input-inline">
                <textarea placeholder="请输入内容" id="title" name="title" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="state" class="layui-form-label">
                <span class="x-red">*</span>轮播图描述
            </label>

            <div class="layui-input-inline">
                <textarea placeholder="请输入内容" id="state" name="state" class="layui-textarea"></textarea>
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
    layui.use(['form', 'layer','upload'], function () {
        $ = layui.jquery;
        var form = layui.form
            ,layer = layui.layer,
            upload = layui.upload;

        upload.render({
            elem: '#upload',
            url: "<?php echo url('Carousel/uploads'); ?>",
            multiple: true,
            before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#thumbnail').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
                });
            },
            done: function(res){
                //上传完毕
                $('#thumbnail').append('<input type="hidden"  name="slide_pic" id="slide_pic" value="'+res.data +'" />')
            }
        });

        //监听提交
        form.on('submit(add)', function(data){
            console.log(data);
            //发异步，把数据提交给php
            $.ajax({
                type:'post',
                url:'<?php echo url('Carousel/DoAdd'); ?>',
                dataType:'json',
                data:{
                    'pic':$('#slide_pic').val(),
                    'title':$('#title').val(),
                    'desc':$('#state').val()
                },
                success:function(dat){
                    if(dat.stat == 1){
                        console.log(1);
                        layer.alert(dat.msg, {icon: 6},function () {
                        // 获得frame索引
                        var index = parent.layer.getFrameIndex(window.name);
                        //关闭当前frame
                        parent.layer.close(index);
                        // 刷新
                        parent.window.location.reload();
                        });
                    }else{
                        layer.alert(dat.msg, {icon: 6},function () {
                        // 获得frame索引
                        var index = parent.layer.getFrameIndex(window.name);
                        //关闭当前frame
                        layer.close(index);
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