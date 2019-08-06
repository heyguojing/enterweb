<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/static/plugins/layui/css/layui.css">
	<script type="text/javascript" src="/static/plugins/layui/layui.js"></script>
	<style type="text/css">
		.header span{background: #009688;margin-left: 30px;padding: 10px;color: #ffffff;}
		.header button{float: right;margin-top: -5px;}
		.header div{border-bottom: solid 2px #009688;margin-top: 8px;}
	</style>
</head>
<body style="padding: 10px;">
	<div class="header">
		<span>商品列表</span>
		<button class="layui-btn layui-btn-sm" onclick="add()">添加</button>
		<div></div>
	</div>
	<div class="layui-form-item" style="margin-top: 5px;">
		<div class="layui-input-inline">
			<input type="text" class="layui-input" name="wd" value="{$wd}" placeholder="商品名称/商品编码">
		</div>
		
		<button class="layui-btn layui-btn-sm" onclick="search()">搜索</button>
	</div>
	<table class="layui-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>商品名称</th>
				<th>商品分类</th>
				<th>商品编码</th>
				<th>价格</th>
				<th>原价</th>
				<th>成本</th>
				<th>PV</th>
				<th>状态</th>
				<th>商品分布时间</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			{volist name='$lists.lists' id="vo"}
			<tr>
				<td>{$vo.id}</td>
				<td>{$vo.title}</td>
				<td>{:isset($cates[$vo.cid])?$cates[$vo.cid]['title']:""}</td>
				<td>{$vo.pro_no}</td>
				<td>{$vo.price}</td>
				<td>{$vo.orignal_price}</td>
				<td>{$vo.cost}</td>
				<td>{$vo.pv}</td>
				<td>{:isset($status_list[$vo.status])?$status_list[$vo.status]:''}</td>
				<td>{:date('Y-m-d H:i:s',$vo.add_time)}</td>
				<td>
					<button class="layui-btn layui-btn-xs" onclick="add({$vo.id})">编辑</button>
					<button class="layui-btn layui-btn-danger layui-btn-xs" onclick="del({$vo.id})">删除</button>
				</td>
			</tr>
			{/volist}
		</tbody>
	</table>
	<div id="pages"></div>
</body>
</html>
<script type="text/javascript">
	layui.use(['layer','laypage'],function(){
		layer = layui.layer;
		$ = layui.jquery;
		var laypage = layui.laypage;
		laypage.render({
		    elem: 'pages' //注意，这里的 test1 是 ID，不用加 # 号
		    ,count: {$lists.total}
		    ,limit:10
		    ,curr:{$page}
		    ,jump: function(obj, first){
			    //首次不执行
			    if(!first){
			    	search(obj.curr);
			    }
			  }
		  });
	});

	// 添加
	function add(id){
		window.location.href = '/index.php/admins/product/add?pro_id='+id;
	}

	// 删除
	function del(id){
		layer.confirm('确定要删除吗？',{
			icon:3,
			btn:['确定','取消']
		},function(){
			$.post('/index.php/admins/product/delete',{'id':id},function(res){
				if(res.code>0){
					layer.alert(res.msg,{'icon':2});
				}else{
					layer.msg(res.msg,{'icon':1});
					setTimeout(function(){window.location.reload();},1000);
				}
			},'json');
		});
	}

	// 搜索
	function search(page){
		var wd = $.trim($('input[name="wd"]').val());
		window.location.href = '/index.php/admins/product/index?page='+page+'&wd='+wd;
	}
</script>