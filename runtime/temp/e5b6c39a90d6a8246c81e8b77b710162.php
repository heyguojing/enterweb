<?php /*a:1:{s:65:"D:\wamp64\www\enterweb\application\admin\view\news_pic\index.html";i:1559093563;}*/ ?>
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
    <xblock>
      <button class="layui-btn" onclick="x_admin_show('添加新闻图','<?php echo url('NewsPic/add'); ?>')"><i
          class="layui-icon"></i>添加</button>
      <span class="x-right" style="line-height:40px">共有数据：88 条</span>
    </xblock>
    <table class="layui-table">
      <thead>
        <tr>
          <!-- <th>
            <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i>
            </div>
          </th> -->
          <th>图片Id</th>
          <th>所属新闻</th>
          <!-- <th>新闻分类</th> -->
          <th>图片</th>
          <th>发布管理员</th>
          <th>发布日期</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($newspic) || $newspic instanceof \think\Collection || $newspic instanceof \think\Paginator): $i = 0; $__LIST__ = $newspic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$newsv): $mod = ($i % 2 );++$i;?>
        <tr>
          <!-- <td>
            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'>
              <i class="layui-icon">&#xe605;</i>
            </div>
          </td> -->
          <td><?php echo htmlentities($newsv['id']); ?></td>
          <td><?php echo GetPicTitle($newsv['news_id']); ?></td>
          <!-- <td>7829.10</td> -->
          <td><img src="<?php echo htmlentities($newsv['picurl']); ?>" alt=""></td>
          <td><?php echo htmlentities($newsv['username']); ?></td>
          <td><?php echo htmlentities(date( 'Y-m-d H:i',!is_numeric($newsv['time'])? strtotime($newsv['time']) : $newsv['time'])); ?></td>
          <td class="td-manage">
            <!-- <a title="编辑" onclick="x_admin_show('编辑','<?php echo url('News/edit'); ?>?)" href="javascript:;">
              <i class="layui-icon">&#xe63c;</i>
            </a> -->
            <a title="删除" onclick="member_del(this,'<?php echo htmlentities($newsv['id']); ?>')"  href="javascript:;">
              <i class="layui-icon">&#xe640;</i>
            </a>
          </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
    </table>
    <div class="page">
      <div>
        <?php echo $newspage; ?>
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

    /*用户-停用*/
    function member_stop(obj, id) {
      layer.confirm('确认要停用吗？', function (index) {

        if ($(obj).attr('title') == '启用') {

          //发异步把用户状态进行更改
          $(obj).attr('title', '停用')
          $(obj).find('i').html('&#xe62f;');

          $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
          layer.msg('已停用!', {
            icon: 5,
            time: 1000
          });

        } else {
          $(obj).attr('title', '启用')
          $(obj).find('i').html('&#xe601;');

          $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
          layer.msg('已启用!', {
            icon: 5,
            time: 1000
          });
        }

      });
    }

    /*用户-删除*/
    function member_del(obj, id) {
      layer.confirm('确认要删除吗？', function (index) {
        //发异步删除数据
        $.ajax({
          type: 'post',
          url: '<?php echo url('NewsPic/del'); ?>',
          dataType: 'json',
          data: {
            'id': id,
          },
          success: function (dat) {
            console.log(dat);
            if (dat.res == 1) {
              $(obj).parents("tr").remove();
              layer.msg(dat.msg, {
                icon: 1,
                time: 1000
              });
              location.reload();
            } else {
              $(obj).parents("tr").remove();
              layer.msg(dat.msg, {
                icon: 1,
                time: 1000
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
        layer.msg('删除成功', {
          icon: 1
        });
        $(".layui-form-checked").not('.header').parents('tr').remove();
      });
    }
  </script>
</body>

</html>