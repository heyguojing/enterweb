<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/static/layui/css/layui.css">
    <script type="text/javascript" src="/static/layui/layui.js"></script>
</head>
<body style="padding: 10px;">
    <form class="layui-form">
        <input type="hidden" name="id" value="{$address.id}">
        <div class="layui-form-item">
            <label class="layui-form-label">姓名</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" name="name" value="{$address.name}">
            </div>
            <label class="layui-form-label">手机号</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" name="phone" value="{$address.phone}">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">所在城市</label>
            <div class="layui-input-inline">
                <select name="province" lay-filter="province" code="{$address.province}">
                    <option>选择省</option>
                    {volist name="$province_list" id="province"}
                    <option value="{$province.code}">{$province.name}</option>
                    {/volist}
                </select>
            </div>
            <div class="layui-input-inline">
                <select name="city" code="{$address.city}">
                    <option>选择城市</option>
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">详细地址</label>
            <div class="layui-input-block">
                <input type="text" class="layui-input" name="address" value="{$address.address}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">邮政编码</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" name="code" value="{$address.code}">
            </div>
        </div>

        <div class="layui-input-block">
            <button class="layui-btn" onclick="save();return false;">保存</button>
        </div>

    </form>
</body>
</html>
<script type="text/javascript">
    layui.use(['form','layer'],function(){
        form = layui.form;
        layer = layui.layer;
        $ = layui.jquery;

        form.on('select(province)', function(data){

          set_province(data.value);
        });

        var province_code = $('select[name="province"]').attr('code');
        $('select[name="province"]').val(province_code);
        set_province(province_code);
        form.render();
    });


    // 设置省
    function set_province(province_code){
        $.get('/index.php/index/order/getcity',{'province':province_code},function(res){
            if(res.code>0){
                layer.msg(res.msg,{'icon':2});
                return;
            }
            var city_code = $('select[name="city"]').attr('code');

            var html = '<option>选择城市</option>';
            $.each(res.msg,function(i,v){
                html += '<option value="'+v.city+'" '+(city_code==v.city?"selected":'')+'>'+v.name+'</option>';
            });
            $('select[name="city"]').html(html);
            form.render();
        },'json');
    }

    function save(){
        var name = $.trim($('input[name="name"]').val());
        var phone = $.trim($('input[name="phone"]').val());
        var province = $('select[name="province"]').val();
        var address = $.trim($('input[name="address"]').val());
        var code = $.trim($('input[name="code"]').val());
        if(name == ''){
            layer.msg('请填写姓名',{'icon':2});
            return;
        }
        if(phone ==''){
            layer.msg('请填写联系电话',{'icon':2});
            return;
        }
        if(province ==''){
            layer.msg('请选择收货地址所在省',{'icon':2});
            return;
        }
        if(code == ''){
            layer.msg('请填写邮政编码',{'icon':2});
            return;
        }
        $.post('/index.php/index/order/save_address',$('form').serialize(),function(res){
            if(res.code>0){
                layer.msg(res.msg,{'icon':2});
                if(res.code==2){
                    setTimeout(function(){parent.window.location.href="/index.php/index/account/login"},1000);
                }
            }else{
                layer.msg(res.msg,{'icon':1});
                setTimeout(function(){parent.window.location.reload();},1000);
            }
        },'json');
    }
</script>