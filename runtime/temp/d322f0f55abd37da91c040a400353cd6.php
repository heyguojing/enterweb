<?php /*a:1:{s:59:"C:\wamp\www\enterweb\application\admin\view\user\index.html";i:1559664637;}*/ ?>
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
        <cite>导航元素</cite>
      </a>
    </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);"
      title="刷新">
      <i class="layui-icon" style="line-height:30px">ဂ</i>
    </a>
  </div>
  <xblock>
    <button class="layui-btn" onclick="x_admin_show('添加管理员','<?php echo url('User/add'); ?>')">
      <i class="layui-icon"></i>添加</button>
    <span class="x-right" style="line-height:40px">共有数据：88 条</span>
  </xblock>
  <table class="layui-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>登录名</th>
        <th>手机</th>
        <th>邮箱</th>
        <!-- <th>角色</th> -->
        <th>加入时间</th>
        <th>操作</th>
    </thead>
    <tbody>
      <?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
      <tr>
        <td><?php echo htmlentities($v['id']); ?></td>
        <td><?php echo htmlentities($v['username']); ?></td>
        <td><?php echo htmlentities($v['tel']); ?></td>
        <td><?php echo htmlentities($v['email']); ?></td>
        <!-- <td>超级管理员</td> -->
        <td><?php echo htmlentities(date('Y-m-d H:i',!is_numeric($v['time'])? strtotime($v['time']) : $v['time'])); ?></td>
        <td class="td-manage">
          <a class="layui-btn layui-btn layui-btn-sm" title="编辑" onclick="x_admin_show('编辑','<?php echo url('User/edit'); ?>?id=<?php echo htmlentities($v['id']); ?>')" href="javascript:;">
            <i class="layui-icon"> &#xe642;</i>编辑
          </a>
          <a class="layui-btn-danger layui-btn layui-btn-sm" title="删除" onclick="member_del(this,'<?php echo htmlentities($v['id']); ?>')" href="javascript:;">
            <i class="layui-icon">&#xe640;</i>删除
          </a>
        </td>
      </tr>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
  </table>
  <div class="page">
    <?php echo $page; ?>
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

    /*用户-停用*/
    function member_stop(obj, id) {
      layer.confirm('确认要停用吗？', function (index) {

        if ($(obj).attr('title') == '启用') {

          //发异步把用户状态进行更改
          $(obj).attr('title', '停用')
          $(obj).find('i').html('&#xe62f;');

          $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
          layer.msg('已停用!', { icon: 5, time: 1000 });

        } else {
          $(obj).attr('title', '启用')
          $(obj).find('i').html('&#xe601;');

          $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
          layer.msg('已启用!', { icon: 5, time: 1000 });
        }

      });
    }

    /*用户-删除*/
    function member_del(obj, id) {
      layer.confirm('确认要删除吗？', function (index) {
        //发异步删除数据
        $.ajax({
          type: 'post',
          url: '<?php echo url('User/del'); ?>',
          dataType: 'json',
          data: {
            'id': id,
          },
          success: function (data) {
            console.log(data);
            if (data.res == 1) {
              $(obj).parents("tr").remove();
              layer.msg(data.msg, { icon: 1, time: 1500 });
              location.reload();
            } else {
              $(obj).parents("tr").remove();
              layer.msg(data.msg, { icon: 1, time: 1500 },function(){
                location.reload();
              });
            }
          }
        });
      });
    }
    function delAll(argument) {

      var data = tableCheck.getData();

      layer.confirm('确认要删除吗？' + data, function (index) {
        //捉到所有被选中的，发异步进行删除
        layer.msg('删除成功', { icon: 1 });
        $(".layui-form-checked").not('.header').parents('tr').remove();
      });
    }
  </script>
</body>

</html>