<!DOCTYPE html>
<html lang="en">
<head>
    <title>填写订单信息</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="/static/img/footlogo.png" />
    <link rel="stylesheet" href="/static/css/cart.css">
    <link rel="stylesheet" href="/static/css/footer.css">
    <link rel="stylesheet" href="/static/css/shop.css">
    <link rel="stylesheet" href="/static/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/static/layui/css/layui.css">
    <script type="text/javascript" src="/static/layui/layui.js"></script>
</head>
<body>
    <!-- 购物车头部 -->
    <div class="header">
        <div class="content">
            <div class="content-left">
                <a href="" class="logo"></a>
                <h1 class="title">确认订单</h1>
            </div>
            <div class="content-right">
                <div class="userinfo">
                    <div class="username">
                        <?php if($member){?>
                        <a href="javascript:void(0)" class="toUserInfo"><?php echo $member['username'];?></a>
                        <ul>
                            <li class="infoitem">个人中心</li>
                            <li class="infoitem">评价晒单</li>
                            <li class="infoitem">我的喜欢</li>
                            <li class="infoitem">小米账户</li>
                            <li class="infoitem">退出登录</li>
                        </ul>
                        <?php }else{?>
                        <a href="javascript:void(0)" class="toUserInfo" onclick="login()">登录</a>
                        <?php }?>
                    </div>
                    <i class="fa fa-angle-down fa-1x"></i>
                </div>
                <div class="toOrderDetail"><a href="./order.html">我的订单</a></div>
            </div>
        </div>
    </div>
    <!-- 主体内容 -->
    <div class="close_content">
        <div class="close_contenter">
            <h1>收货地址</h1>
            <div>
                {volist name="address_list" id="vo"}
                <div class="close_add">
                    <div onclick="add_address({$vo.id})">
                     <h1>{$vo.name}</h1>
                     <h6>{$vo.phone}</h6>
                     <h6>{:isset($province_cates[$vo['province']])?$province_cates[$vo['province']]['name']:''}&nbsp;{:isset($city_cates[$vo['city']])?$city_cates[$vo['city']]['name']:''}</h6>
                     <h6>{$vo.address}</h6>
                    </div>
                    <span class="del" onclick="del_address({$vo.id})">删除</span>
                </div>
                {/volist}
               
                <div class="close_add1" onclick="add_address()">
                 <i class="fa fa-plus-square"></i>
                 <h6>添加新地址</h6>
                </div>
                <div class="clear"></div>
            </div>
            <h2>配送方式 <span style="color: #FF6A00;font-size: 13px;margin-left: 80px;">包邮</span></h2>
            <div class="close_data">
            <h3>配送时间</h3><h5 style="border-color:rgb(255,106,0)">不限送货时间：周一至周日</h5><h5>工作日送货：周一至周五</h5><h5>双休日、假日送货：周六至周日</h5>
            </div>
            <h2 style="border: none;margin-top:0px; ">发票<span style="color: #FF6A00;font-size: 13px;margin-left: 125px;">电子发票&nbsp;&nbsp;  个人  &nbsp;&nbsp;商品明细&nbsp;&nbsp;  修改 ></span></h2>
            <h4>商品及优惠券 <a href="./cart.html">返回购物车&nbsp; <i class="fa fa-chevron-right"></i> </a></h4>
            <div class="close_shop">
                {volist name="$product_list" id="product"}
                <p>
                    <img src="{$product.product.img}" style="height: 30px;"><a href="/index.php/index/index/detail?prono={$product.product.pro_no}">{$product.product.title}&nbsp;{$product.product.keywords}</a>{$product.product.price}元 x {$product.count}
                    <span >{$product.product.price * $product.count}元</span>
                </p>
                {/volist}
                <div class="clear"></div>
            </div>
            <div class="close_much">
                <div class="close_much_left">
                  <p><i class="fa fa-plus-square"></i>使用优惠券</p>
                  <p><i class="fa fa-plus-square"></i>使用小米礼品卡</p>
                </div>
                <div class="close_much_right">
                   <p>商品件数  :<span>{$product_count}件</span></p> 
                   <p>商品总价  :<span>{$order.money}元</span></p> 
                   <p>优惠活动  :<span>-0元</span></p> 
                   <p>优惠券抵扣  :<span>-0元</span></p> 
                   <p>运费  :<span>0元</span></p> 
                   <p style="height: 50px;line-height:50px; ">应付总额  :<span class="zong">{$order.pay_money} <b> 元</b></span></p>                  
                </div>
                <div class="clear"></div>
            </div> 
        </div>
        <div class="close_clear">
            <button class="submit-cart" onclick="doorder()">立即下单</button>
        </div>
    </div>

    <!--   网页底部   -->
    <div class="footer-top">
        <div class="footer-top_li">
            <div class="footer-top_li_1">
                <a href="#"><i class="fa fa-wrench"></i>预约维修服务</a><span></span>
                <a href="#"><i class="fa fa-rotate-right "></i>7天无理由退货</a><span></span>
                <a href="#"><i class="fa fa-refresh"></i>15天免费换货</a><span></span>
                <a href="#"><i class="fa fa-gift"></i>满150元包邮</a><span></span>
                <a href="#"><i class="fa fa-map-marker"></i>520余家售后网点</a>
            </div>
            <span class="separate"></span>
            <div class="footer-top_li_2">
                <div class="footer-top_li_a">
                    <dl>
                        <dt>帮助中心</dt>
                        <dd><a href="">账户管理</a></dd>
                        <dd><a href="">购物指南</a></dd>
                        <dd><a href="">订单操作</a></dd>
                    </dl>
                    <dl>
                        <dt>服务支持</dt>
                        <dd><a href="">售后政策</a></dd>
                        <dd><a href="">自助服务</a></dd>
                        <dd><a href="">相关下载</a></dd>
                    </dl>
                    <dl>
                        <dt>线下门店</dt>
                        <dd><a href="">小米之家</a></dd>
                        <dd><a href="">服务网点</a></dd>
                        <dd><a href="">授权体验店</a></dd>
                    </dl>
                    <dl>
                        <dt>关于小米</dt>
                        <dd><a href="">了解小米</a></dd>
                        <dd><a href="">加入小米</a></dd>
                        <dd><a href="">投资者关系</a></dd>
                    </dl>
                    <dl>
                        <dt>关注我们</dt>
                        <dd><a href="">新浪微博</a></dd>
                        <dd><a href="">官网微博</a></dd>
                        <dd><a href="">联系我们</a></dd>
                    </dl>
                    <dl>
                        <dt>特色服务</dt>
                        <dd><a href="">F码通道</a></dd>
                        <dd><a href="">礼物码</a></dd>
                        <dd><a href="">防伪查询</a></dd>
                    </dl>
                    <div class="connect">
                        <p class="telephone">Feir-520-1314</p>
                        <p class="time">周一至周日 8:00-18:00<br>(仅收市话费)</p>
                        <button><span class="fa fa-commenting "></span> 联系客服</button>
                    </div>
                </div>
                <div class="footer-top_li_b"></div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-bottom_li">
            <div class="footer-bottom_li_1">
                <img src="./static/img/footlogo.png" alt="" class="logoBottom">
            </div>
            <div class="footer-bottom_li_2">
                <div class="footer-bottom_li_a">
                    <ul>
                        <li>小米商城<span></span></li>
                        <li>MIUI<span></span></li>
                        <li>米家<span></span></li>
                        <li>米聊<span></span></li>
                        <li>多看<span></span></li>
                        <li>游戏<span></span></li>
                        <li>路由器<span></span></li>
                        <li>米粉卡<span></span></li>
                        <li>政企服务<span></span></li>
                        <li>小米天猫店<span></span></li>
                        <li>隐私政策<span></span></li>
                        <li>问题反馈<span></span></li>
                        <li>Select Region</li>
                    </ul>
                </div>
                <div class="footer-bottom_li_b">
                    <a href="">©mi.com</a>
                    京ICP证110507号
                    <a href="">京ICP备10046444号</a>
                    <a href="">京公网安备11010802020134号</a>
                    <a href="">京网文[2014]0059-0009号</a>
                    <br>
                    违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试
                </div>
            </div>
            <div class="footer-bottom_li_3">
                <img src="../static/img/footericon1.png" alt="" class="icon">
                <img src="../static/img/footericon2.png" alt="" class="icon">
                <img src="../static/img/footericon3.png" alt="" class="icon">
                <img src="../static/img/footericon4.png" alt="" class="icon">
                <img src="../static/img/footericon5.png" alt="" class="icon">
            </div>
            <div class="footer-bottom_li_4">
               探索黑科技，小米为发烧而生！
            </div>   
        </div>  
    </div>
    <script>
        layui.use(['form','layer'], function(){
            var form = layui.form;
            form.render();
            layer = layui.layer;
            $ = layui.jquery;
        });

        // 添加收货地址
        function add_address(id){
            layer.open({
                type:2,
                title:id>0?'编辑地址':'添加地址',
                shade:0.3,
                area:['900px','520px'],
                content:'/index.php/index/order/add_address?id='+id
            });
        }

        // 删除地址
        function del_address(id){
            layer.confirm('确定要删除吗？',{
                icon:3,
                btn:['确定','取消']
            },function(){
                $.post('/index.php/index/order/del_address',{'id':id},function(res){
                    if(res.code>0){
                        layer.msg(res.msg,{'icon':2});
                    }else{
                        layer.msg(res.msg,{'icon':1});
                        setTimeout(function(){window.location.reload();},1000);
                    }
                },'json');
            });
        }


        // 立即下单
        function doorder(){
            window.location.href = '/index.php/index/member/alipay?order_no={$order.order_no}';
        }

        // 登录
        function login(){
            window.location.href = '/index.php/index/account/login';
        }
    </script>
</body>
</html>