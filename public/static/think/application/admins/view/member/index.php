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
		<span>用户列表</span>
		<div></div>
	</div>
	<table class="layui-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>用户名</th>
				<th>手机号</th>
				<th>状态</th>
				<th>注册时间</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			{volist name='$member_list.lists' id="vo"}
			<tr>
				<td>{$vo.uid}</td>
				<td>{$vo.username}</td>
				<td>{$vo.phone}</td>
				<td>{$vo.status==0?'正常':'<span style="color: red;">禁用</span>'}</td>
				<td>{:date('Y-m-d H:i:s',$vo.add_time)}</td>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-xs" onclick="disables({$vo.uid})">禁用</button>
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
		    ,count: {$member_list.total}
		    ,limit:{$pageSize}
		    ,curr:{$page}
		    ,jump: function(obj, first){
			    //首次不执行
			    if(!first){
			    	window.location.href = '/index.php/admins/member/index?page='+obj.curr;
			    }
			  }
		  });
	});

	// 禁用
	function disables(uid){
		layer.confirm('确定要禁用吗？',{
			icon:3,
			btn:['确定','取消']
		},function(){
			$.post('/index.php/admins/member/disables',{'uid':uid},function(res){
				if(res.code>0){
					layer.alert(res.msg,{'icon':2});
				}else{
					layer.msg(res.msg,{'icon':1});
					setTimeout(function(){window.location.reload();},1000);
				}
			},'json');
		});
	}
</script>