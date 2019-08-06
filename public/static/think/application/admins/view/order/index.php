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
		<span>订单列表</span>
		<div></div>
	</div>
	<table class="layui-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>订单号</th>
				<th>用户</th>
				<th>支付金额</th>
				<th>快递单号</th>
				<th>订单状态</th>
				<th>生成时间</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			{volist name='$lists.lists' id="vo"}
			<tr>
				<td>{$vo.id}</td>
				<td>{$vo.order_no}</td>
				<td>{$user_lists[$vo.uid]['username']}</td>
				<td>{$vo.pay_money}</td>
				<td>{$vo.ship_no}</td>
				<td>{$order_status[$vo.status]}</td>
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
		    ,limit:{$pageSize}
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
		layer.open({
			type:2,
			title:'编辑订单',
			shade:0.3,
			area:['480px','420px'],
			content:'/index.php/admins/order/add?id='+id
		});
	}

	// 删除
	function del(id){
		layer.confirm('确定要删除吗？',{
			icon:3,
			btn:['确定','取消']
		},function(){
			$.post('/index.php/admins/order/delete',{'id':id},function(res){
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
		window.location.href = '/index.php/admins/order/index?page='+page;
	}
</script>