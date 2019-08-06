<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/static/plugins/layui/css/layui.css">
	<script type="text/javascript" src="/static/plugins/layui/layui.js"></script>
</head>
<body style="padding: 10px;">
	<form class="layui-form">
		<input type="hidden" name="id" value="{$order.id}">
		<div class="layui-form-item">
			<label class="layui-form-label">订单号</label>
			<div class="layui-input-inline">
				<input type="text" class="layui-input" value="{$order.order_no}" readonly>
			</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">支付金额</label>
			<div class="layui-input-inline">
				<input type="text" class="layui-input" value="{$order.pay_money}" readonly>
			</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">用户</label>
			<div class="layui-input-inline">
				<input type="text" class="layui-input" value="{$member.username}" readonly>
			</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">快递单号</label>
			<div class="layui-input-inline">
				<input type="text" class="layui-input" name="ship_no" value="{$order.ship_no}">
			</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">状态</label>
			<div class="layui-input-inline">
				<input type="checkbox" name="status" value="2" lay-skin="primary" title="已完成" <?=$order['status']==2?'checked':'';?>>
			</div>
		</div>
	</form>
	<div class="layui-form-item">
		<div class="layui-input-block">
			<button class="layui-btn" onclick="save()">保存</button>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	layui.use(['layer','form'],function(){
		var form = layui.form;
		layer = layui.layer;
		$ = layui.jquery;
	});

	function save(){

		$.post('/index.php/admins/order/save',$('form').serialize(),function(res){
			if(res.code>0){
				layer.alert(res.msg,{'icon':2});
			}else{
				layer.msg(res.msg,{'icon':1});

				setTimeout(function(){parent.window.location.reload();},1000);
			}
		},'json');
	}
</script>