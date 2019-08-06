<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/static/plugins/layui/css/layui.css">
	<script type="text/javascript" src="/static/plugins/layui/layui.js"></script>
	<style type="text/css">
		.header span{background: #009688;margin-left: 30px;padding: 10px;color: #ffffff;}
		.header div{border-bottom: solid 2px #009688;margin-top: 8px;}
	</style>
</head>
<body style="padding: 10px;">
	<div class="header">
		<span>分类列表</span>
		<div></div>
	</div>

	<form class="layui-form">
		<table class="layui-table">
			<thead>
				<tr>
					<th>ID</th>
					<th>排序</th>
					<th>分类名称</th>
					<th>是否禁用</th>
				</tr>
			</thead>
			<tbody>
				{volist name="$cates" id="vo"}
				<tr>
					<td>{$vo.id}</td>
					<td><input type="text" class="layui-input" name="ords[{$vo.id}]" value="{$vo.ord}"></td>
					<td><input type="text" class="layui-input" name="titles[{$vo.id}]" value="{$vo.title}"></td>
					<td><input type="checkbox" lay-skin="primary" name="status[{$vo.id}]" title="禁用" {$vo.status==1?'checked':''} value="1"></td>
				</tr>
				{/volist}
				<tr>
					<td></td>
					<td><input type="text" class="layui-input" name="ords[0]"></td>
					<td><input type="text" class="layui-input" name="titles[0]"></td>
					<td><input type="checkbox" lay-skin="primary" name="status[0]" title="禁用" value="1">
				</tr>
			</tbody>
		</table>
	</form>

	<button class="layui-btn" onclick="save()">保存</button>
</body>
</html>
<script type="text/javascript">
	
	layui.use(['layer','form'],function(){
		var form = layui.form;
		$ = layui.jquery;
		layer = layui.layer;
	});

	function save(){
		$.post('/index.php/admins/cates/save',$('form').serialize(),function(res){
			if(res.code>0){
				layer.msg(res.msg,{'icon':2});
			}else{
				layer.msg(res.msg,{'icon':1});
				setTimeout(function(){window.location.reload();},1000);
			}
		},'json');
	}
</script>