
<!DOCTYPE html>
<html lang="en">
<head>
    <title>小米商城</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="/static/img/footlogo.png" />
    <link rel="stylesheet" href="/static/css/cart.css">
    <link rel="stylesheet" type="text/css" href="/static/css/content.css">
    <link rel="stylesheet" href="/static/css/footer.css">
    <link rel="stylesheet" href="/static/font-awesome/css/font-awesome.min.css">
    <script src="/static/js/jq_3.3.1_mi.js"></script>
    <script src="/static/js/cart.js"></script>
    <link rel="stylesheet" type="text/css" href="/static/layui/css/layui.css">
    <script type="text/javascript" src="/static/layui/layui.js"></script>
</head>
<body>
    <!-- 购物车头部 -->
    <div class="header">
        <div class="content">
            <div class="content-left">
                <a href="" class="logo"></a>
                <h1 class="title">我的购物车</h1>
                <h6 class="notice">温馨提示：产品是否购买成功，以最终下单为准哦，请尽快结算</h6>
            </div>
            <div class="content-right">
                <div class="userinfo">
                    <div class="username">
                        <a href="javascript:void(0)" class="toUserInfo">我是某某某</a>
                        <ul>
                            <li class="infoitem">个人中心</li>
                            <li class="infoitem">评价晒单</li>
                            <li class="infoitem">我的喜欢</li>
                            <li class="infoitem">小米账户</li>
                            <li class="infoitem">退出登录</li>
                        </ul>
                    </div>
                    <i class="fa fa-angle-down fa-1x"></i>
                </div>
                <div class="toOrderDetail"><a href="./order.html">我的订单</a></div>
            </div>
        </div>
    </div>
    

    <!-- 购物车躯干部分 -->
    <div class="trunk">
        <!--购物车-->
        <div class="cart">
            <div class="list list-title">
                <div class="select select-all"><i class="fa fa-check" id="check-all"></i>全选</div>
                <div class="good-img"></div>
                <div class="good-name" style="font-size:14px; ">商品名称</div>
                <div class="good-price">单价</div>
                <div class="good-num">数量</div>
                <div class="good-total-price"style="color:#424242;">小计</div>
                <div class="operation">操作</div>
            </div>
            {volist name="product_list" id="vo"}
            <div class="list list-item" pro_no="{:isset($product_cates[$vo['pro_id']])?$product_cates[$vo['pro_id']]['pro_no']:''}">
                <div class="select"><i class="fa fa-check"></i></div>
                <div class="good-img"><img src="{:isset($product_cates[$vo['pro_id']])?$product_cates[$vo['pro_id']]['img']:''}" alt=""></div>
                <div class="good-name"> {:isset($product_cates[$vo['pro_id']])?$product_cates[$vo['pro_id']]['title']:''} {:isset($product_cates[$vo['pro_id']])?$product_cates[$vo['pro_id']]['keywords']:''} </div>
                <div class="good-price">{:isset($product_cates[$vo['pro_id']])?$product_cates[$vo['pro_id']]['price']:''}元</div>
                <div class="good-num">
                    <div class="num-input">
                        <button class="minus">-</button>
                        <input type="text" value="{$vo.count}" class="num-value">
                        <button class="plus">+</button>
                    </div>
                </div>
                <div class="good-total-price"><?php echo (isset($product_cates[$vo['pro_id']])?$product_cates[$vo['pro_id']]['price']:0)*$vo['count']?>元</div>
                <div class="operation"><i class="fa fa-times"></i></div>
            </div>
            {/volist}
            <div class="list list-total">
                <div class="list-total-left">
                    <span class="notice"><a href="">继续购物</a></span>
                    <span class="statistics">共 <span class="all-count">0</span> 件商品，已选择 <span class="select-count">0</span> 件</span>
                </div>
                <div class="list-total-right">
                    <div class="total-price">合计: <span class="sum-price">0</span> 元</div>
                    <button class="submit-cart" onclick="dosettement()">去结算</button>
                </div>
            </div>
        </div>

        <!--其他商品推荐-->
        <div class="recommend" style="margin-top: 60px;">
            <p>买购物车中商品的人还买了</p>
        </div>
  
    <div class="content-bottom">
            <div class="content-bottom1">
                <!--手机-->
                <div class="content-bottom1_shop">
                    <div class="content-bottom1_shop1"></div>
                    <div class="content-bottom1_shop2">
                        <div class="content-bottom1_1">
                            <div class="content-bottom1_a">
                                <img class="bottomImg" src="../static/img/buy/手机1.jpg" alt="">
                                <h3 class="bottomTitle"><a href="">小米5X 4GB+64GB </a> </h3>
                                <p class="bottomDesc">光学变焦双摄，拍人更美</p>
                                <p class="bottomPrice">
                                    <span style="color:#ff6709">1499 元</span>
                                </p>
                            </div>
                            <div class="content-bottom1_b">
                                <span class="bottomFlagRed">享八折</span>
                                <img class="bottomImg" src="../static/img/buy/手机2.jpg" alt="">
                                <h3 class="bottomTitle"><a href="">小米MIX 2 全陶瓷尊享版 </a></h3>
                                <p class="bottomDesc">全面屏2.0，Unibody 全陶瓷</p>
                                <p class="bottomPrice">
                                    <span style="color:#ff6709">3699元</span>
                                    <del>4699 元</del>
                                </p>
                            </div>
                            <div class="content-bottom1_c">
                                <img class="bottomImg" src="../static/img/buy/手机3.jpg" alt="">
                                <h3 class="bottomTitle"><a href="">红米5A 2GB内存 </a></h3>
                                <p class="bottomDesc">8天超长待机，137g轻巧机身</p>
                                <p class="bottomPrice">
                                    <span style="color:#ff6709">599元</span>
                                </p>
                            </div>
                            <div class="content-bottom1_d">
                                <img class="bottomImg" src="../static/img/buy/手机4.jpg" alt="">
                                <h3 class="bottomTitle"><a href="">红米5 Plus 3GB+32GB </a></h3>
                                <p class="bottomDesc">全面屏手机，4000mAh大电量</p>
                                <p class="bottomPrice">
                                    <span style="color:#ff6709">999元</span>
                                </p>
                            </div>
                        </div>
                        <div class="content-bottom1_2">
                            <div class="content-bottom1_e">
                                <img class="bottomImg" src="../static/img/buy/手机5.jpg" alt="">
                                <h3 class="bottomTitle"><a href="">红米S2 3GB+32GB </a></h3>
                                <p class="bottomDesc">前置1600万超大像素智能美拍</p>
                                <p class="bottomPrice">
                                    <span style="color:#ff6709">999元</span>
                                </p>
                            </div>
                            <div class="content-bottom1_f">
                                <img class="bottomImg" src="../static/img/buy/手机6.jpg" alt="">
                                <h3 class="bottomTitle"><a href="">小米Note 3 4GB+64GB </a></h3>
                                <p class="bottomDesc">1600万美颜自拍，2倍变焦双摄</p>
                                <p class="bottomPrice">
                                    <span style="color:#ff6709">1799元</span>
                                    <del>1999元</del>
                                </p>
                            </div>
                            <div class="content-bottom1_g">
                                <img class="bottomImg" src="../static/img/buy/手机7.jpg" alt="">
                                <h3 class="bottomTitle"><a href="">红米5 2GB+16GB </a></h3>
                                <p class="bottomDesc">5.7英寸全面屏，前置柔光自拍</p>
                                <p class="bottomPrice">
                                    <span style="color:#ff6709">799元</span>
                                </p>
                            </div>
                            <div class="content-bottom1_h">
                                <img class="bottomImg" src="../static/img/buy/手机8.jpg" alt="">
                                <h3 class="bottomTitle"><a href="">小米Max 2 4GB+64GB </a></h3>
                                <p class="bottomDesc">6.44''大屏，5300mAh 充电宝级的大电量</p>
                                <p class="bottomPrice">
                                    <span style="color:#ff6709">1499元</span>
                                    <del>1699元</del>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
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
</body>
</html>
<script type="text/javascript">
    layui.use('layer',function(){
        layer = layui.layer;
    });

    // 去结算
    function dosettement(){
        var i_list = $('i[class*=checked]');
        var pro_arrs = [];
        $.each(i_list,function(i,v){
            var data = new Object;
            var pro_no = $(v).parent('div').parent('div').attr('pro_no');
            if(pro_no == undefined){
                return true;
            }
            // 购买数量
            var num = parseInt($(v).parent('div').parent('div').find('input[class="num-value"]').val());
            if(isNaN(num)){
                return true;
            }
            if(num<=0){
                return true;
            }
            data.pro_no = pro_no;
            data.num = num;
            pro_arrs.push(data);
        });
        if(pro_arrs.length == 0){
            layer.msg('请选择商品',{'icon':2});
            return;
        }
        $.post('/index.php/index/member/dosettement',{'data':pro_arrs},function(res){
            if(res.code>0){
                layer.msg(res.msg,{'icon':2});
            }else{
                window.location.href = '/index.php/index/Order/confirm?order_no='+res.order_no;
            }
        },'json');
    }
</script>