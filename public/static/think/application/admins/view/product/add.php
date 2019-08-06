<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/static/plugins/layui/css/layui.css">
	<script type="text/javascript" src="/static/plugins/layui/layui.js"></script>
	<script type="text/javascript" src="/static/plugins/wangeditor/release/wangEditor.min.js"></script>
	<style type="text/css">
		.header span{background: #009688;margin-left: 30px;padding: 10px;color: #ffffff;}
		.header div{border-bottom: solid 2px #009688;margin-top: 8px;}
	</style>
</head>
<body style="padding: 10px;">
	<div class="header">
		<span>商品发布</span>
		<div></div>
	</div>
	<form class="layui-form" style="margin-top: 10px;">
		<input type="hidden" name="pro_id" value="{$product.id}">
		<div class="layui-form-item">
			<label class="layui-form-label">商品分类</label>
			<div class="layui-input-inline">
				<select name="cid">
					{volist name="$cates" id="vo"}
					<option value="{$vo.id}" {$product.cid==$vo.id?'selected':''}>{$vo.title}</option>
					{/volist}
				</select>
			</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">商品名称</label>
			<div class="layui-input-inline">
				<input type="text" class="layui-input" name="title" value="{$product.title}">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">商品编码</label>
			<div class="layui-input-inline">
				<input type="text" class="layui-input" name="pro_no" value="{$product.pro_no}">
			</div>
			<button class="layui-btn layui-btn-sm" onclick="autocreate();return false;">自动生成</button>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">上传图片</label>
			<div class="layui-input-block">
				<button class="layui-btn layui-btn-sm" onclick="return false;" id="upload_img"><i class="layui-icon">&#xe67c;</i>上传图片</button>
				{volist name="$img_list" id="vo"}
				<img src="{$vo}" style="height:30px;margin-left:5px;" />
				{/volist}
				<input type="hidden" name="img" value="{:implode(';',$img_list)}">
			</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">商品价格</label>
			<div class="layui-input-inline">
				<input type="text" class="layui-input" name="price" value="{$product.price}">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">商品原价</label>
			<div class="layui-input-inline">
				<input type="text" class="layui-input" name="orignal_price" value="{$product.orignal_price}">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">商品成本</label>
			<div class="layui-input-inline">
				<input type="text" class="layui-input" name="cost" value="{$product.cost}">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">商品库存</label>
			<div class="layui-input-inline">
				<input type="text" class="layui-input" name="stock" value="{$product.stock}">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">关键字</label>
			<div class="layui-input-inline">
				<input type="text" class="layui-input" name="keywords" value="{$product.keywords}">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">商品描述</label>
			<div class="layui-input-inline">
				<input type="text" class="layui-input" name="desc" value="{$product.desc}">
			</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">商品状态</label>
			<div class="layui-input-inline">
				<input type="checkbox" name="status" value="1" lay-skin="primary" title="下架" {$product.status==1?'checked':''}>
			</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">商品详情</label>
			<div class="layui-input-block">
				<div id="editor">{:htmlspecialchars_decode($detail.detail)}</div>
				<input type="hidden" name="detail">
			</div>
			
		</div>

		<div class="layui-form-item">
			<div class="layui-input-block">
				<button class="layui-btn" onclick="save();return false;">保存</button>
			</div>
		</div>

	</form>

</body>
</html>
<script type="text/javascript">
	layui.use(['form','upload','layer'],function(){
		var form = layui.form;
		var upload = layui.upload;
		layer = layui.layer;
		$ = layui.jquery;

		//执行实例
		  var uploadInst = upload.render({
		    elem: '#upload_img' //绑定元素
		    ,url: '/index.php/admins/product/upload_img' //上传接口
		    ,done: function(res){
		    	if(res.code>0){
		    		layer.msg(res.msg,{'icon':2});
		    	}else{
		    		var html = '<img src="'+res.msg+'" style="height:30px;margin-left:5px;" />';
		    		$('input[name="img"]').after(html);
		    		var values = $('input[name="img"]').val();
		    		$('input[name="img"]').val(values+';'+res.msg);
		    	}
		    }
		    ,error: function(){
		      //请求异常回调
		    }
		  });


		create_editor();
	});

	function create_editor(){
		var E = window.wangEditor
	    editor = new E('#editor')
	    // 或者 var editor = new E( document.getElementById('editor') )
	    editor.customConfig.uploadImgShowBase64 = true;   // 使用 base64 保存图片
     	editor.customConfig.uploadImgServer = '/index.php/admins/product/upload_img?flag=1';  // 上传图片到服务器
     	editor.customConfig.showLinkImg = false;
     	editor.customConfig.uploadFileName = 'file';

	    editor.create()
	}
    
    // 自动生成商品编码
    function autocreate(){
    	$.get('/index.php/admins/product/auto_create_no',{},function(res){
    		if(res.code>0){
    			layer.msg(res.msg,{'icon':2});
    		}else{
    			$('input[name="pro_no"]').val(res.msg);
    		}
    	},'json');
    }

    // 保存
    function save(){
    	var title = $.trim($('input[name="title"]').val());
    	var pro_no = $.trim($('input[name="pro_no"]').val());
    	var price = $.trim($('input[name="price"]').val());
    	var keywords = $.trim($('input[name="keywords"]').val());
    	var desc = $.trim($('input[name="desc"]').val());
    	var img = $('input[name="img"]').val();
    	$('input[name="detail"]').val(editor.txt.html());


    	if(title==''){
    		layer.msg('请填写商品名称',{'icon':2});
    		return;
    	}
    	if(pro_no==''){
    		layer.msg('请填写商品编码',{'icon':2});
    		return;
    	}
    	if(img==''){
    		layer.msg('请上传商品图片',{'icon':2});
    		return;
    	}
    	if(price==''){
    		layer.msg('请填写商品价格',{'icon':2});
    		return;
    	}
    	if(keywords==''){
    		layer.msg('请填写商品关键字',{'icon':2});
    		return;
    	}
    	if(desc==''){
    		layer.msg('请填写商品描述',{'icon':2});
    		return;
    	}
    	$.post('/index.php/admins/product/save',$('form').serialize(),function(res){
    		if(res.code>0){
    			layer.msg(res.msg,{'icon':2})
    		}else{
    			layer.msg(res.msg,{'icon':1});
    			setTimeout(function(){window.location.reload()},1000);
    		}
    	},'json');

    }
</script>