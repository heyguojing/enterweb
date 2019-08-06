<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
// 新闻缩略图id对应新闻id
function GetPicTitle($news_id)
{
    return Db::connect('enterweb')->table('news')->where('id',$news_id)->value('title');
}
// 产品缩略图对应产品id
function GetProductTitle($productid)
{
    return Db::connect('enterweb')->table('product')->where('id',$productid)->value('title');
}
// 产品模块的分类，根据sort.id获取sort.title
function GetSortTitle($id)
{
    return Db::connect('enterweb')->table('sort')->where('id',$id)->value('title');
}
// 新闻列表图,根据新闻表id查询出新闻图片表对应id的图片
function GetNewsImg($id)
{
    return Db::connect('enterweb')->table('news_pic')->where('news_id',$id)->value('picurl');
}
// 产品列表图,根据产品表id查询出产品图标表对饮id的图片
function GetProductImg($id){
    return Db::connect('enterweb')->table('product_pic')->where('product_id',$id)->value('picurl');
}