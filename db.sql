CREATE TABLE IF NOT EXISTS php_wea (
  wid tinyint unsigned NOT NULL COMMENT '天气状况代号',
  weacss  varchar(60) NOT NULL COMMENT '前端对应样式',
  key wid(wid),
  key weacss(weacss)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='天气种类表';

CREATE TABLE php_session (
  session_id VARCHAR(255) NOT NULL,
  session_expire INT(11) UNSIGNED NOT NULL,
  session_data VARCHAR(30000) NOT NULL,
  UNIQUE KEY session_id (session_id)
)ENGINE=Memory DEFAULT CHARSET=utf8 COMMENT='session数据表';

CREATE TABLE php_admin(
  id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  adminName VARCHAR(30) NOT NULL COMMENT '管理员名字',
  password CHAR(40) NOT NULL COMMENT '管理员密码',
  pic VARCHAR(150) NOT NULL DEFAULT '' COMMENT '管理员头像',
  randString CHAR(15) NOT NULL COMMENT '密码盐值',
  isRoot TINYINT(1) NOT NULL DEFAULT 0 COMMENT '是否超管0不是1是',
  PRIMARY KEY (id),
  UNIQUE KEY (adminName),
  KEY (pic),
  KEY (randString)
)ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT '管理员表';

CREATE TABLE IF NOT EXISTS php_auth_group (
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  title char(100) NOT NULL,
  status tinyint(1) NOT NULL DEFAULT '1',
  rules VARCHAR(2000) NOT NULL DEFAULT '',
  PRIMARY KEY (id),
  UNIQUE KEY title(title)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT '角色表';

CREATE TABLE IF NOT EXISTS php_auth_group_access (
  uid mediumint(8) unsigned NOT NULL,
  group_id mediumint(8) unsigned NOT NULL,
  UNIQUE KEY uid_group_id (uid,group_id),
  KEY uid (uid),
  KEY group_id (group_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '管理员角色表';

CREATE TABLE IF NOT EXISTS php_auth_rule (
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  name char(80) NOT NULL DEFAULT '',
  title char(20) NOT NULL,
  type tinyint(1) NOT NULL DEFAULT '1',
  status tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  iconName char(30) DEFAULT '' COMMENT '图标名称',
  pid mediumint(9) NOT NULL DEFAULT '0',
  sort int(5) NOT NULL DEFAULT '50',
  PRIMARY KEY (id),
  UNIQUE KEY title (title)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT '权限表';

CREATE TABLE php_brand(
  id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  brandName VARCHAR(60) NOT NULL COMMENT '名称',
  url VARCHAR(60) NOT NULL DEFAULT '' COMMENT '网址',
  pic VARCHAR(150) NOT NULL DEFAULT '' COMMENT 'logo',
  `desc` VARCHAR(300) NOT NULL DEFAULT '' COMMENT '描述',
  status tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  sort SMALLINT NOT NULL DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (id),
  UNIQUE KEY (brandName)
)ENGINE = MyISAM DEFAULT CHARSET = utf8 COMMENT '品牌表';

CREATE TABLE IF NOT EXISTS php_conf (
  id mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '配置项id',
  cnName varchar(50) NOT NULL COMMENT '配置中文名称',
  enName varchar(50) NOT NULL COMMENT '英文名称',
  type tinyint(1) NOT NULL DEFAULT '1' COMMENT '配置类型 1：单行文本框 2：多行文本 3：单选按钮 4：复选按钮 5：下拉菜单 6: 图片',
  confType tinyint(1) NOT NULL DEFAULT '1' COMMENT '配置属性 1：网店基本信息 2：商品基本信息',
  value varchar(255) NOT NULL DEFAULT '' COMMENT '配置值',
  `values` varchar(255) NOT NULL DEFAULT '' COMMENT '配置可选值',
  sort smallint(6) NOT NULL DEFAULT '50' COMMENT '配置项排序',
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT '配置表';


CREATE TABLE IF NOT EXISTS php_cate (
  id mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  cateName varchar(30) NOT NULL COMMENT '栏目名称',
  type tinyint(1) NOT NULL DEFAULT '1' COMMENT '栏目类型：1:系统分类 2:帮助分类 3：网店帮助 4：网店信息 5：普通分类',
  keywords varchar(255) NOT NULL DEFAULT '' COMMENT '栏目关键词',
  `desc` varchar(255) NOT NULL DEFAULT '' COMMENT '栏目描述',
  showNav tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示到导航',
  pid mediumint(9) NOT NULL DEFAULT '0' COMMENT '上级栏目id',
  sort mediumint(9) NOT NULL DEFAULT '50' COMMENT '排序',
  allowSon TINYINT(1) NOT NULL DEFAULT '1' COMMENT '是否允许添加子栏目',
  PRIMARY KEY (id),
  UNIQUE KEY (cateName)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT '栏目';

CREATE TABLE IF NOT EXISTS php_article (
  id mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  title varchar(60) NOT NULL COMMENT '文章标题',
  keywords varchar(100) NOT NULL DEFAULT '' COMMENT '关键词',
  `desc` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  author varchar(30) NOT NULL DEFAULT '' COMMENT '作者',
  email varchar(60) NOT NULL DEFAULT '' COMMENT 'email',
  url VARCHAR(150) NOT NULL DEFAULT '' COMMENT '外链地址',
  thumb varchar(160) NOT NULL DEFAULT '' COMMENT '缩略图',
  content text NOT NULL COMMENT '内容',
  showTop tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否置顶',
  showStatus TINYINT(1) NOT NULL DEFAULT '1' COMMENT '显示状态1：显示0：不显示',
  time int(10) NOT NULL COMMENT '发布时间',
  upTime int(10) NOT NULL COMMENT '最后更新时间',
  cateId mediumint(9) NOT NULL COMMENT '所属栏目',
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT '文章';

CREATE TABLE php_frlink(
  id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  title VARCHAR(60) NOT NULL COMMENT '链接标题',
  url VARCHAR(60) NOT NULL DEFAULT '' COMMENT '网址',
  pic VARCHAR(150) NOT NULL DEFAULT '' COMMENT 'logo',
  `desc` VARCHAR(300) NOT NULL DEFAULT '' COMMENT '描述',
  status tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  type tinyint(1) NOT NULL DEFAULT '1' COMMENT '链接类型：1:图片 2:文字',
  sort SMALLINT NOT NULL DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (id),
  UNIQUE KEY (title)
)ENGINE = MyISAM DEFAULT CHARSET = utf8 COMMENT '友情链接表';

CREATE TABLE IF NOT EXISTS `php_category` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `cateName` varchar(30) NOT NULL COMMENT '商品分类名称',
  `cateImg` varchar(150) NOT NULL DEFAULT '' COMMENT '栏目banner',
  `keywords` varchar(150) NOT NULL DEFAULT '' COMMENT '关键词',
  `desc` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `sort` smallint(6) NOT NULL DEFAULT '50' COMMENT '排序',
  `pid` smallint(6) NOT NULL DEFAULT '0' COMMENT '上级栏目id',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:显示 0:隐藏',
  iconName char(30) DEFAULT '' COMMENT '图标名称',
  attrId VARCHAR(300) DEFAULT '' COMMENT '筛选属性id',
  psNum tinyint(2) UNSIGNED NOT NULL DEFAULT 5 COMMENT '价格区间数量',
  PRIMARY KEY (`id`),
  UNIQUE KEY (`cateName`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT '商品分类表';

CREATE TABLE IF NOT EXISTS `php_category_words` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `cateId` mediumint(9) NOT NULL COMMENT '对应主栏目id',
  `word` varchar(60) NOT NULL COMMENT '词汇',
  `url` varchar(60) NOT NULL COMMENT '链接',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT '首页导航关联词汇表';

CREATE TABLE IF NOT EXISTS `php_category_brands` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `brandId` varchar(100) NOT NULL COMMENT '关联的品牌id列表',
  `pic` varchar(60) NOT NULL COMMENT '推广图',
  `url` varchar(60) NOT NULL COMMENT '链接',
  `cateId` mediumint(9) NOT NULL COMMENT '对应主栏目id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT '首页导航关联品牌表';

CREATE TABLE IF NOT EXISTS `php_type` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `typeName` varchar(30) NOT NULL COMMENT '属性名称',
  PRIMARY KEY (`id`),
  UNIQUE KEY (`typeName`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT '商品类型表' ;


CREATE TABLE IF NOT EXISTS `php_attr` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `attrName` varchar(30) NOT NULL COMMENT '属性名称',
  `attrType` tinyint(1) NOT NULL DEFAULT '1' COMMENT '属性类型 1:单选 2:唯一',
  `attrValues` varchar(255) NOT NULL DEFAULT '' COMMENT '属性值',
  `typeId` smallint(6) NOT NULL COMMENT '所属类型',
  PRIMARY KEY (`id`),
  KEY `typeId` (`typeId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT '属性表' ;


create table php_goods(
  id mediumint unsigned not null auto_increment,
  goodsName varchar(128) not null comment '商品名称',
  num char(16) NOT NULL comment '商品编码',
  marketPrice decimal(10,2) not null default 0 comment '市场价格',
  shopPrice decimal(10,2) not null default 0 comment '本店价格',
  weight decimal(10,2) unsigned not null default 0 comment '商品重量',
  unit varchar(10) not null default 'kg' comment '单位',
  brandId mediumint unsigned not null default 0 comment '商品所属品牌',
  cateId smallint(6) unsigned not null default 0 comment '商品所属分类',
  typeId smallint(5) unsigned not null default 0 comment '商品所属类型',
  `desc` longtext comment '商品描述',
  pic varchar(150) not null default '' comment '展示图',
  smPic varchar(150) not null default '' comment '展示图小图',
  mdPic varchar(150) not null default '' comment '展示图中图',
  bigPic varchar(150) not null default '' comment '展示图大图',
  onSale  tinyint(1) not null default '1' comment '1:上架  0:下架',
  status TINYINT NOT NULL DEFAULT '1' COMMENT '是否开启会员价格1:开启0:关闭',
  time int(10) NOT NULL COMMENT '添加时间',
  primary key (id),
  unique key (goodsName),
  key (shopPrice),
  key (time),
  key (brandId),
  key (cateId),
  key (typeId),
  key (status)
)engine=Innodb default charset=utf8 comment '商品表';

CREATE TABLE php_goods_cat(
  catId SMALLINT(6) UNSIGNED NOT NULL COMMENT '分类id',
  goodsId MEDIUMINT UNSIGNED NOT NULL COMMENT '商品id',
  KEY catId(catId),
  KEY goodsId(goodsId)
)ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT '商品扩展分类';

CREATE TABLE php_member_level(
  id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
  levelName VARCHAR(30) NOT NULL COMMENT '级别名称',
  bottom INT UNSIGNED NOT NULL COMMENT '积分下限',
  top INT UNSIGNED NOT NULL COMMENT '积分上限',
  rate TINYINT UNSIGNED NOT NULL DEFAULT '100' COMMENT '折扣率',
  PRIMARY KEY (id)
)ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT '会员级别';

CREATE TABLE php_member_price(
  id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  levelId SMALLINT NOT NULL COMMENT '级别Id',
  goodsId MEDIUMINT NOT NULL COMMENT '商品Id',
  memPrice DECIMAL(10,2) DEFAULT NULL COMMENT '会员价格',
  PRIMARY KEY (id),
  KEY levelId(levelId),
  KEY goodsId(goodsId)
)ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT '会员价格';

create table php_goods_photos(
  id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  goodsId MEDIUMINT UNSIGNED NOT NULL DEFAULT 1 COMMENT '商品Id',
  photo VARCHAR(150) NOT NULL COMMENT '原图',
  smPhoto VARCHAR(150) NOT NULL COMMENT '小图',
  mdPhoto VARCHAR(150) NOT NULL COMMENT '中图',
  bigPhoto VARCHAR(150) NOT NULL COMMENT '大图',
  randString CHAR(15) NOT NULL COMMENT '图片对应随机码',
  PRIMARY KEY id(id),
  KEY goodsId(goodsId),
  KEY randString(randString)
)ENGINE = MyISAM DEFAULT CHARSET = utf8 COMMENT '商品相册';

CREATE TABLE php_goods_attr(
  id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  attrId MEDIUMINT UNSIGNED NOT NULL COMMENT '属性Id',
  attrVal VARCHAR(150) NOT NULL DEFAULT '' COMMENT '属性值',
  goodsId MEDIUMINT UNSIGNED NOT NULL COMMENT '商品Id',
  attrPrice DECIMAL(10,2) DEFAULT NULL COMMENT '不同属性价格',
  PRIMARY KEY (id),
  KEY goodsId(goodsId),
  KEY attrId(attrId),
  KEY attrVal(attrVal)
)ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT '商品属性';


CREATE TABLE php_goods_num(
  goodsId MEDIUMINT UNSIGNED NOT NULL COMMENT '商品Id',
  num MEDIUMINT UNSIGNED NOT NULL DEFAULT '0' COMMENT '库存量',
  attrs VARCHAR(150) NOT NULL COMMENT '商品属性表Id',
  price DECIMAL(10,2) DEFAULT NULL COMMENT '不同属性价格',
  KEY goodsId(goodsId),
  KEY attrs(attrs)
)ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT '库存量';


CREATE TABLE IF NOT EXISTS `php_nav` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `navName` varchar(30) NOT NULL COMMENT '导航名称',
  `navUrl` varchar(30) NOT NULL COMMENT '导航地址',
  `open` tinyint(1) NOT NULL DEFAULT 1 COMMENT '打开方式 1：新标签 2：当前页',
  `pos` tinyint(1) NOT NULL DEFAULT 1 COMMENT '显示位置：1：顶部 2：中间 3：底部',
  `sort` smallint(6) NOT NULL DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT '导航';


CREATE TABLE IF NOT EXISTS `php_rec_pos` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `recName` varchar(60) NOT NULL COMMENT '推荐位名称',
  `recType` tinyint(1) NOT NULL DEFAULT '1' COMMENT '推荐位类型 1：商品 2：分类',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT '推荐位表';


CREATE TABLE IF NOT EXISTS `php_rec_item` (
  `recposId` smallint(5) unsigned NOT NULL COMMENT '推荐位id',
  `valId` mediumint(8) unsigned NOT NULL COMMENT '商品或商品分类id',
  `valType` tinyint(1) NOT NULL DEFAULT '1' COMMENT '推荐类型 1：商品 2：商品分类'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT '推荐位数据表';

CREATE TABLE IF NOT EXISTS php_category_ad(
  id SMALLINT(6) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品Id',
  pic VARCHAR(150) NOT NULL COMMENT '图',
  `position` tinyint(1) NOT NULL DEFAULT 1 COMMENT '位置 1：轮播 2：右上 3：右下',
  url VARCHAR(60) NOT NULL COMMENT '链接地址',
  cateId smallint(6) NOT NULL COMMENT '所属分类',
  PRIMARY KEY (id),
  KEY `position`(`position`),
  KEY cateId(cateId)
)ENGINE = MyISAM DEFAULT CHARSET = utf8 COMMENT '广告图';

CREATE TABLE IF NOT EXISTS `php_slider` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `pic` varchar(150) NOT NULL COMMENT '轮播图',
  `title` varchar(150) NOT NULL COMMENT '名称',
  url VARCHAR(60) NOT NULL COMMENT '链接地址',
  status TINYINT NOT NULL DEFAULT '1' COMMENT '是否开启1:开启0:关闭',
  `sort` SMALLINT(5) NOT NULL DEFAULT '50' COMMENT '栏目排序',
  PRIMARY KEY id(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='轮播图';


CREATE TABLE IF NOT EXISTS php_user(
  id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'Id',
  userName VARCHAR(60) NOT NULL COMMENT '用户名',
  avator VARCHAR(150) NOT NULL DEFAULT '' COMMENT '用户头像',
  password CHAR(40) NOT NULL COMMENT '密码',
  email VARCHAR(60) NOT NULL DEFAULT '' COMMENT '邮箱',
  eChecked TINYINT(1) NOT NULL DEFAULT 0 COMMENT '邮箱是否验证：1：是 0：否',
  tel CHAR(11) NOT NULL DEFAULT '' COMMENT '手机号',
  tChecked TINYINT(1) NOT NULL DEFAULT 0 COMMENT '手机是否验证：1：是 0：否',
  regType TINYINT(1) NOT NULL DEFAULT 1 COMMENT '验证标识：0：邮箱 1：手机  2：全部 3：暂无',
  regTime INT(10) NOT NULL COMMENT '注册时间',
  points MEDIUMINT UNSIGNED NOT NULL DEFAULT 0  COMMENT '积分',
  randString CHAR(15) NOT NULL COMMENT '密码盐值',
  PRIMARY KEY (id),
  UNIQUE KEY (userName),
  KEY email(email),
  KEY regType(regType),
  KEY regTime(regTime),
  KEY points(points),
  KEY (randString)
)ENGINE = MyISAM DEFAULT CHARSET = utf8 COMMENT '用户表';

CREATE TABLE IF NOT EXISTS php_address(
  id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'id',
  userId MEDIUMINT NOT NULL COMMENT '用户id',
  name VARCHAR(60) NOT NULL COMMENT '收货人姓名',
  province CHAR(60) NOT NULL COMMENT '省份',
  city CHAR(60) NOT NULL COMMENT '市',
  county VARCHAR(60) NOT NULL COMMENT '区',
  address VARCHAR(300) NOT NULL COMMENT '具体地址',
  phone VARCHAR(11) NOT NULL COMMENT '手机号',
  tel CHAR(12) NOT NULL COMMENT '固定电话',
  zipcode CHAR(15) NOT NULL DEFAULT '' COMMENT '邮政编码',
  signBuilding VARCHAR(300) NOT NULL DEFAULT '' COMMENT '地址别名',
  bestTime VARCHAR(200) NOT NULL DEFAULT '' COMMENT '最佳发货时间',
  email VARCHAR(60) NOT NULL COMMENT '邮箱',
  KEY userId(userId)
)ENGINE = InnoDB DEFAULT CHARSET=utf8 COMMENT '用户收货地址表';

CREATE TABLE IF NOT EXISTS php_order(
  id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  outTradeNo CHAR(16) NOT NULL COMMENT '订单号',
  userId MEDIUMINT NOT NULL COMMENT '下单用户id',
  goodsTotalPrice DECIMAL(10,2) NOT NULL DEFAULT 0 COMMENT '商品总额',
  orderTotalPrice DECIMAL(10,2) NOT NULL DEFAULT 0 COMMENT '订单总额',
  payment TINYINT(1) NOT NULL COMMENT '支付方式1支付宝2微信3微信第三方4余额',
  distribution VARCHAR(50) NOT NULL COMMENT '配送方式 申通、顺丰、圆通',
  orderStatus TINYINT(1) NOT NULL DEFAULT 0 COMMENT '订单状态0未确认1已确认2申请退款3退款成功',
  payStatus TINYINT(1) NOT NULL DEFAULT 0 COMMENT '支付状态0未支付1已支付',
  postStatus TINYINT(1) NOT NULL DEFAULT 0 COMMENT '配送状态0未发货1已发货2已收货',
  postSpant DECIMAL(10,2) NOT NULL DEFAULT 0 COMMENT '运费',
  remark VARCHAR(300) NOT NULL DEFAULT '' COMMENT '订单备注',
  name VARCHAR(60) NOT NULL COMMENT '收货人姓名',
  province CHAR(60) NOT NULL COMMENT '省份',
  city CHAR(60) NOT NULL COMMENT '市',
  county VARCHAR(60) NOT NULL COMMENT '区',
  address VARCHAR(300) NOT NULL COMMENT '具体地址',
  phone VARCHAR(11) NOT NULL COMMENT '手机号',
  orderTime CHAR(10) NOT NULL DEFAULT '1531291609' COMMENT '下单时间',
  KEY userId(userId)
)ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT '订单表';

CREATE TABLE IF NOT EXISTS php_order_goods(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  goodsId MEDIUMINT NOT NULL  COMMENT '商品id',
  goodsName VARCHAR(150) NOT NULL COMMENT '商品名称',
  goodsMemberPrice DECIMAL(10,2) NOT NULL DEFAULT 0 COMMENT '商品会员价',
  goodsMarketPrice DECIMAL(10,2) NOT NULL DEFAULT 0  COMMENT '商品市场价',
  goodsShopPrice DECIMAL(10,2) NOT NULL DEFAULT 0  COMMENT '商品本店价',
  goodsAttrId VARCHAR(50) NOT NULL COMMENT '商品属性id',
  goodsAttrStr text NOT NULL COMMENT '商品属性',
  goodsNum MEDIUMINT NOT NULL COMMENT '商品数量',
  orderId MEDIUMINT NOT NULL COMMENT '所属订单',
  key goodsId(goodsId),
  key orderId(orderId)
)ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT '订单商品表';

CREATE TABLE IF NOT EXISTS php_comment(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  content TEXT NOT NULL COMMENT '评论内容',
  star TINYINT NOT NULL DEFAULT 5 COMMENT '评论星级',
  uid INT NOT NULL COMMENT '用户id',
  addTime INT(10) NOT NULL COMMENT '添加时间',
  goodsId MEDIUMINT UNSIGNED NOT NULL  COMMENT '商品id',
  used MEDIUMINT DEFAULT 0 COMMENT '有用数',
  KEY uid(uid),
  KEY addTime(addTime),
  KEY goodsId(goodsId),
  KEY star(star),
  KEY used(used)
)ENGINE = MyISAM DEFAULT CHARSET = utf8 COMMENT '商品评论表';

