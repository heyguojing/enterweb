/*
Navicat MySQL Data Transfer

Source Server         : admin
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : enterweb

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2019-06-04 14:52:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for carousel
-- ----------------------------
DROP TABLE IF EXISTS `carousel`;
CREATE TABLE `carousel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pic` varchar(255) NOT NULL,
  `title` varchar(20) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of carousel
-- ----------------------------
INSERT INTO `carousel` VALUES ('10', '/uploads/carousel/20190602\\1abf000c969f417c5e89fd78ada9d545.jpg', '企业网站开发', '页面简洁，兼容各个平台，国内框架，layui，thinkphp，bootstrap......', 'admin', '1559442220');
INSERT INTO `carousel` VALUES ('9', '/uploads/carousel/20190602\\806ceadb43639ac2e731a2d2c89e65e4.jpg', '企业网站开发', '页面简洁，兼容各个平台，国内框架，layui，thinkphp，bootstrap......', 'admin', '1559442187');

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `need` varchar(100) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES ('1', '郭靖', 'guo_ali@aliyun.com', '企业网站开发', '接各种企业网站开发，医美，后台管理系统；layui框架，thinkphp5.1框架开发，bootstrap移动端开发', 'admin', '1559098673');
INSERT INTO `contact` VALUES ('2', 'test', 'test@163.com', '公司企业网站开发，后台管理系统', '公司企业网站开发，后台管理系统', 'customer', '1559618021');
INSERT INTO `contact` VALUES ('3', 'user', 'user@aliyun.com', '公司企业网站', 'layui 公司企业网站开发，后台管理系统', 'customer', '1559618377');
INSERT INTO `contact` VALUES ('4', 'test1', 'test1@qq.com', 'test', 'ttest', 'customer', '1559618696');
INSERT INTO `contact` VALUES ('5', 'test', 'test', 'test', 'test', 'customer', '1559618837');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT COMMENT '新闻ID',
  `title` varchar(255) NOT NULL COMMENT '新闻标题',
  `sort` char(20) DEFAULT NULL COMMENT '新闻分类',
  `desc` varchar(255) NOT NULL COMMENT '新闻简介',
  `content` text NOT NULL COMMENT '新闻内容',
  `username` varchar(30) NOT NULL COMMENT '新闻发布管理员',
  `time` int(10) unsigned NOT NULL COMMENT '新闻发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('20', '《紫罗兰永恒花园》', null, '简介：某个大陆的、某个时代。大陆南北分割的战争结束了，世界走向了和平。', '<p>简介：某个大陆的、某个时代。大陆南北分割的战争结束了，世界走向了和平。在战争中作为军人的薇尔莉特•伊芙加登，怀抱着对她来说无比重要之人留下的“话语”，离开军队来到了大港口城市。踊跃的人群在排列着煤气灯的街道马路上来来往往地穿梭着。薇尔莉特在街道上找到了“代写书信”的工作。那是根据委托人的想法来组织出相应语言的工作。她直面委托人、触碰着他们内心深处的坦率感情。与此同时，薇尔莉特在记录书信时，渐渐明白那“话语”的含义。&nbsp;&nbsp;<br></p><p><img src=\"/uploads/news/20190510\\0e80a4b961ce50cc72d008d15d05e7a8.jpg\" style=\"max-width:100%;\"><br></p><p><br></p>', 'admin', '1557709747');
INSERT INTO `news` VALUES ('8', '基本查询', '热门新闻', 'Db::table(\'think_user\')->where(\'id\',1)->find();', '<h2>基本查询</h2><p>查询单个数据使用<code>find</code>方法：</p><pre><code>// table方法必须指定完整的数据表名\nDb::table(\'think_user\')-&gt;where(\'id\',1)-&gt;find();\n</code></pre><p>最终生成的SQL语句可能是：</p><pre><code>SELECT * FROM `think_user` WHERE  `id` = 1 LIMIT 1\n</code></pre><blockquote><p>find 方法查询结果不存在，返回 null，否则返回结果数组</p></blockquote><p>如果希望在没有找到数据后抛出异常可以使用</p><pre><code>// table方法必须指定完整的数据表名\nDb::table(\'think_user\')-&gt;where(\'id\',1)-&gt;findOrFail();\n</code></pre><p>如果没有查找到数据，则会抛出一个<code>think\\db\\exception\\DataNotFoundException</code>异常。</p><p>查询多个数据（数据集）使用<code>select</code>方法：</p><p><br></p>', 'admin', '1557474174');
INSERT INTO `news` VALUES ('6', '来新人啦！', '热门新闻', '来新人啦！来新人啦！来新人啦！', '<p><img src=\"/upload/20180702\\3fac6bc0e84bb5f8f5454edf5878836f.png\" style=\"max-width:100%;\"><br></p>', 'admin', '1530501837');
INSERT INTO `news` VALUES ('19', '《刀剑神域》', null, '简介：【本片翻译由版权方提供】“这里是哪儿”察觉到', '<p>简介：【本片翻译由版权方提供】“这里是哪儿”察觉到的时候，桐人不知为什么陷入了庞大的幻想风格虚拟世界。登录前的记忆模糊不清，只得在周围徘徊寻找线索。之后，他同一名少年相遇了。“我的名字是尤吉欧。请多关照，桐人君。”少年是在虚拟世界的居民，即“NPC”，但是却如同人类一样“感情丰富”。在和尤吉欧加深交往的同时，桐人也在摸索着登出这个世界的方法。在桐人的脑海中，某一个记忆苏醒了。那是幼年时的桐人和尤吉欧在山野奔跑的记忆——不可能存在的记忆。在那个回忆中，有着一个金发少女的身影。她的名字，是爱丽丝，是绝对不应该忘记的、重要的名字。&nbsp;&nbsp;<br></p><p><img src=\"/uploads/news/20190510\\76cc4b677415d30ee924fb24a68c814b.jpg\" style=\"max-width:100%;\"><br></p><p><br></p>', 'admin', '1557709737');
INSERT INTO `news` VALUES ('18', '《全职高手》', null, '简介：根据蝴蝶蓝同名电子游戏竞技小说改编，一个被战队驱逐的超级职业选手离开老东家，进入网吧自行组建战队，结识了形形色色的优秀队员，打挑战赛杀回了《荣耀》的职业联盟，并获得了最高的荣誉重回巅峰。', '<p>简介：根据蝴蝶蓝同名电子游戏竞技小说改编，一个被战队驱逐的超级职业选手离开老东家，进入网吧自行组建战队，结识了形形色色的优秀队员，打挑战赛杀回了《荣耀》的职业联盟，并获得了最高的荣誉重回巅峰。&nbsp;</p><p>&nbsp;<img src=\"/uploads/news/20190510\\272886117d72b2779ebc457b7aad2ab4.jpg\" style=\"max-width: 100%;\"><br></p><p><br></p>', 'admin', '1557481164');
INSERT INTO `news` VALUES ('14', '《狐妖小红娘》', null, '《狐妖小红娘》是庹小新创作的连载于腾讯动漫的漫画作品。单行本由中国文史出版社、长江出版社出版。作品亦改编为同名动画、游戏。漫画主要讲述了以红娘为职业的狐妖在为前世恋...', '<p>漫画主要讲述了以红娘为职业的狐妖在为前世恋人牵红线过程当中发生的一系列有趣、神秘、感人的故事。&nbsp; 1<br></p><p><img src=\"/uploads/news/20190510\\d2523eb587afc71935b46e6cd14ce132.jpg\" style=\"max-width:100%;\"><br></p><p><br></p>', 'admin', '1557481145');
INSERT INTO `news` VALUES ('15', '郭靖', null, 'php，thinkphp5.1开发，javascript，layui，bootstrap前端框架，mysql，github，web网站，后台管理系统，cms内容发布系统', '<p>php，thinkphp5.1开发，javascript，layui，bootstrap前端框架，mysql，github，web网站，后台管理系统，cms内容发布系统</p><p><img src=\"http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/50/pcmoren_huaixiao_org.png\" alt=\"[坏笑]\" data-w-e=\"1\"><br></p><p><img src=\"/uploads/news/20190510\\7df9a3e2a91972c47dab9d46622f2dc4.jpg\" style=\"max-width:100%;\"><br></p><p><br></p>', 'admin', '1557470228');
INSERT INTO `news` VALUES ('21', '《剧场版 悠哉日常大王》', null, '简介：「旭丘分校」的学生有五人。虽然不论是学年还是性格都不同，但总是一年四季彼此一同享受着乡村生活。', '<p>简介：「旭丘分校」的学生有五人。虽然不论是学年还是性格都不同，但总是一年四季彼此一同享受着乡村生活。某天，在百货公司的抽奖抽中了特等奖——去冲绳的旅行券。这也让众人决定，利用暑假期间一同前往冲绳去旅行。&nbsp;&nbsp;<br></p><p><img src=\"/uploads/news/20190510\\017bbc90c8da4473cee8d8b83886dfba.jpg\" style=\"max-width:100%;\"><br></p><p><br></p>', 'admin', '1557709757');
INSERT INTO `news` VALUES ('22', '《OVERLORD》', null, '简介：作品主要讲述了某天，一款曾经掀起过大热潮的VRMMORPG「YGGDRASIL」停止了运营。', '<p>简介：作品主要讲述了某天，一款曾经掀起过大热潮的VRMMORPG「YGGDRASIL」停止了运营。游戏原本会停止一切服务，但过了结束时间后，玩家们却发现不能退出，NPC也产生了各自的思想。现实世界中喜爱电玩的主人公铃木悟（真名）在等待系统强制登出时，与“安兹·乌尔·恭”公会的成员一起意外穿越到了异世界，并且变成了拥有骷髅外表的最强魔法师——“飞鼠”。就这样，真正的奇幻传说正式拉开了帷幕。&nbsp;&nbsp;<br></p><p><img src=\"/uploads/news/20190510\\ad0656f5bace06a8989f75a0c3a0aa4f.jpg\" style=\"max-width:100%;\"><br></p><p><br></p>', 'admin', '1557709766');
INSERT INTO `news` VALUES ('23', '《齐木楠雄的灾难》', null, '简介：高中生·齐木楠雄是超能力者。', '<p>简介：高中生·齐木楠雄是超能力者。心灵感应、念动力、透视、预知、瞬间移动、千里眼等，不论任何事情都自由自在。但这任谁都羡慕不已的最强能力，实际上对于本人而言是引来灾难的不幸元凶。因此，他在别人面前封印了超能力，以不起眼、不和他人有所牵扯为信条，默默无闻地过日子。但不知为何，他的身边总是聚集着不可思议的人类（生物），风暴般的灾难接连不断地降临！&nbsp;&nbsp;<br></p><p><img src=\"/uploads/news/20190510\\401db3fb178efafe3a525ccc9896df3b.jpg\" style=\"max-width:100%;\"><br></p><p><br></p>', 'admin', '1557709777');

-- ----------------------------
-- Table structure for news_pic
-- ----------------------------
DROP TABLE IF EXISTS `news_pic`;
CREATE TABLE `news_pic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '图片id',
  `news_id` int(10) unsigned NOT NULL COMMENT '新闻id',
  `picurl` varchar(255) CHARACTER SET latin1 NOT NULL,
  `username` varchar(10) CHARACTER SET latin1 NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news_pic
-- ----------------------------
INSERT INTO `news_pic` VALUES ('4', '14', '/uploads/newspic/20190515\\9b7e036d84dd4a78701a41b898536fe6.jpg', 'admin', '1557932866');
INSERT INTO `news_pic` VALUES ('5', '19', '/uploads/newspic/20190519\\14efd9540dc730aa747189d3b6f510dc.jpg', 'admin', '1558268650');
INSERT INTO `news_pic` VALUES ('6', '18', '/uploads/newspic/20190519\\a7418b0a686157fc6638e162c5f528c7.jpg', 'admin', '1558268730');
INSERT INTO `news_pic` VALUES ('7', '20', '/uploads/newspic/20190521\\4b106c81d7c8503cdb65cfb34ffcae8c.jpg', 'admin', '1558418957');
INSERT INTO `news_pic` VALUES ('8', '6', '/uploads/newspic/20190523\\e5850fa746e871b79521c07a04b5d589.jpg', 'admin', '1558542376');
INSERT INTO `news_pic` VALUES ('9', '8', '/uploads/newspic/20190521\\4b106c81d7c8503cdb65cfb34ffcae8c.jpg', 'admin', '1558418957');
INSERT INTO `news_pic` VALUES ('11', '15', '/uploads/newspic/20190521\\4b106c81d7c8503cdb65cfb34ffcae8c.jpg', 'admin', '1558268650');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `sort` int(20) unsigned NOT NULL,
  `desc` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `once` int(10) unsigned NOT NULL,
  `over_night` int(10) unsigned NOT NULL,
  `time` int(10) unsigned NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('2', '休斯敦火箭队', '3', '詹姆斯-保罗', '<p>詹姆斯-保罗詹姆斯-保罗</p><p><img src=\"/uploads/product/20190521\\7ffa7b7741dc7430f3371a450ce4ed39.jpg\" style=\"max-width:100%;\"><br></p>', '300', '800', '1558421793', 'admin');
INSERT INTO `product` VALUES ('3', '勇士更强还是雄鹿更强？', '5', '勇士杜兰特，斯蒂芬-库里，格林，汤普森，库克，', '<blockquote>金州勇士队（Golden State Warriors）于1946年成立并加盟BAA（1949年加盟NBA）&nbsp;<img src=\"http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/pcmoren_tian_org.png\" alt=\"[舔屏]\" data-w-e=\"1\"></blockquote><p><img src=\"/uploads/product/20190521\\1e69fee974e03b21125d0be713d247b8.jpg\" style=\"max-width:100%;\"><br></p><p><br></p>', '300', '800', '1558441919', 'admin');

-- ----------------------------
-- Table structure for product_pic
-- ----------------------------
DROP TABLE IF EXISTS `product_pic`;
CREATE TABLE `product_pic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `picurl` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_pic
-- ----------------------------
INSERT INTO `product_pic` VALUES ('1', '2', '/uploads/productpic/20190527\\74644a648dbb57680b26013289711aef.jpg', 'admin', '1558886404');

-- ----------------------------
-- Table structure for sort
-- ----------------------------
DROP TABLE IF EXISTS `sort`;
CREATE TABLE `sort` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sort
-- ----------------------------
INSERT INTO `sort` VALUES ('3', '亮剑', 'admin', '1558885058');
INSERT INTO `sort` VALUES ('2', '我的兄弟叫顺溜', 'admin', '1558885011');
INSERT INTO `sort` VALUES ('4', '我李云龙不服', 'admin', '1558886002');
INSERT INTO `sort` VALUES ('5', '武林外传', 'admin', '1558886126');
INSERT INTO `sort` VALUES ('8', '我的兄弟叫顺溜', 'admin', '1558886308');

-- ----------------------------
-- Table structure for system
-- ----------------------------
DROP TABLE IF EXISTS `system`;
CREATE TABLE `system` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(50) NOT NULL,
  `about_title` varchar(255) NOT NULL,
  `about_content` varchar(255) NOT NULL,
  `com_int_title` varchar(255) NOT NULL,
  `com_int_content` varchar(255) NOT NULL,
  `com_x_title` varchar(255) NOT NULL,
  `com_x_cont` varchar(255) NOT NULL,
  `time` int(10) unsigned NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system
-- ----------------------------
INSERT INTO `system` VALUES ('1', '接单企业站，cms网站，后台管理系统', '接单企业站，cms网站，后台管理系统', '接单企业站，cms网站，后台管理系统\n微信：wxinguojing\nQQ：994743720', '接单企业站，cms网站，后台管理系统', '接单企业站，cms网站，后台管理系统\n微信：wxinguojing\nQQ：994743720', '接单企业站，cms网站，后台管理系统', '接单企业站，cms网站，后台管理系统\n微信：wxinguojing\nQQ：994743720', '1559098673', 'admin');

-- ----------------------------
-- Table structure for test
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sex` int(2) unsigned NOT NULL,
  `age` varchar(255) NOT NULL,
  `interests` varchar(255) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `username` varchar(50) NOT NULL COMMENT '管理员名称',
  `password` varchar(255) NOT NULL COMMENT '用户密码',
  `email` varchar(50) NOT NULL COMMENT '管理员邮箱',
  `tel` varchar(18) NOT NULL COMMENT '管理员号码',
  `time` int(10) unsigned NOT NULL COMMENT '添加管理员时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`,`tel`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('9', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '244103592@qq.con', '15156932893', '1557048258');
INSERT INTO `user` VALUES ('17', 'success', 'e10adc3949ba59abbe56e057f20f883e', '123213@qq.com', '12322221111', '1557026361');
INSERT INTO `user` VALUES ('10', 'admins', 'e10adc3949ba59abbe56e057f20f883e', '123123@qq.com', '12322221111', '1557109265');
INSERT INTO `user` VALUES ('21', 'phpstudy', 'e10adc3949ba59abbe56e057f20f883e', '123@qq.com', '12122229999', '1557027138');
INSERT INTO `user` VALUES ('22', '成功添加', 'e10adc3949ba59abbe56e057f20f883e', '1213@qq.com', '12322221111', '1557027236');
INSERT INTO `user` VALUES ('23', 'today', 'e10adc3949ba59abbe56e057f20f883e', '123@qq.com', '12322224444', '1557027331');
INSERT INTO `user` VALUES ('24', 'dumptest', 'e10adc3949ba59abbe56e057f20f883e', '12312312@qq.com', '12311112222', '1557027483');
INSERT INTO `user` VALUES ('25', 'doadd', 'e10adc3949ba59abbe56e057f20f883e', '123123@qq.com', '12322221111', '1557027882');
INSERT INTO `user` VALUES ('26', '企业网', 'e10adc3949ba59abbe56e057f20f883e', '12345789@aliyun.com', '13599995555', '1557049195');
INSERT INTO `user` VALUES ('28', 'php.cn', '5f80d5b7e3bfc3dfe37429d0020ca653a16041da', '1231223@qq.com', '12322221111', '1557109206');
INSERT INTO `user` VALUES ('27', 'md5加密', 'e10adc3949ba59abbe56e057f20f883e', '123123@qq.com', '12322221111', '1557108892');
INSERT INTO `user` VALUES ('29', 'php123213s', '5e8394764d14216b53766db9cd578ef75221685b', '123123@qq.com', '12322221111', '1559119897');
