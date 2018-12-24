<?php
namespace app\index\controller;
use app\member\controller\Account;
use think\Loader;
class Flow extends Base {
    //加入购物车
    public function addToCart() {
        $goods = json_decode(input('goods'),true);
        $goodsAttr = $goods['goodsAttr'];
        $goodsId = $goods['goodsId'];
        $number = $goods['number'];
        $cartModel = model('cart');
        $cartModel->addToCart($goodsId,$goodsAttr,$number);
        $cartNum = count(unserialize($_COOKIE['cart']));
        $result = [
            'error' => 0,
            'cartNum' => $cartNum,
            'one_step_buy' => 1,
        ];   //error = 0,库存没问题,error = 2,库存有问题
        return json($result);
    }
    //修改购物车
    public function updateToCart() {
        $arr = input();
//        $cartModel = model('cart');
        $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
        $cart[$arr['rec_id']] = $arr['goods_number'];
//        dump($cart);
        $aMonth = time() + 30 * 24 * 3600;
        setcookie('cart',serialize($cart),$aMonth,'/');
//        dump($_COOKIE['cart']);
//        $gids = explode('|',$arr['cValue']);
//        $goodsList = $cartModel->getGoodsListInCart();
//        $flow_info = 0; //商品总金额
//        $save_total_amount = 0; //优惠节省总金额
//        $subtotal_number = 0; //商品总数
//        foreach($goodsList as $k => $v) {
//            if(in_array($k,$gids)) {
//                $flow_info += $v['totalPrice'];
//                $save_total_amount += ($v['shopPrice'] - $v['memberPrice']) * $v['goodsNumber'];
//                $subtotal_number += $v['goodsNumber'];
//            }
//        }
//        $msg = $cartModel->getGoodsMsgInCart($arr['rec_id']);
        $data['error'] = 0;
//        $data['goods_number'] = $msg['goods_number']; //商品更新数量
//        $data['goods_subtotal'] = $msg['goods_subtotal']; //小计
//        $data['flow_info'] = '<span class="txt">总价(不含运费)：</span>
//             <span class="price sumPrice" id="cart_goods_amount" ectype="goods_total">'.$flow_info.'</span>';  //商品总价
//        $data['save_total_amount'] = $save_total_amount; //优惠节省总金额
//        $data['subtotal_number'] = $subtotal_number;    //商品总数
//        $data['rec_id'] = $arr['rec_id'];
        return json($data);
    }
    //购物车
    public function cart() {
        $cartModel = model('cart');
        //获取购物车商品
        $goodsList = $cartModel->getGoodsListInCart();
        //判断商品从购物车提交到订单页
        if(request()->isPost()) {
            //判断用户是否登录以及获取用户收货地址
            if($uid = session('uid')) {
                $address = db('address')->where('userId','eq',$uid)->find();
            }else {
                $this->redirect('/login.html');
            }
            $arr = input();
            $goodsId = $arr['cart_value'];
            $goodsNum = 0;
            $goodsShopTotalPrice = 0;
            $goodsTotalPrice = 0;
            if(strpos($goodsId,'|') !== false) {
                $goodsIdArr = explode('|',$goodsId);
                foreach($goodsList as $k => $v) {
                    if(in_array($k,$goodsIdArr)) {
                        $goodsArr[$k] = $v;
                        $goodsNum += $v['goodsNumber'];
                        $goodsShopTotalPrice  += $v['shopPrice'] * $v['goodsNumber'];
                        $goodsTotalPrice += $v['totalPrice'];
                    }
                }
            }else {
                foreach($goodsList as $k => $v) {
                    if($goodsId == $k) {
                        $goodsNum = $v['goodsNumber'];
                        $goodsShopTotalPrice += $v['shopPrice'] * $v['goodsNumber'];
                        $goodsTotalPrice = $v['totalPrice'];
                        $goodsArr[$goodsId] = $v;
                    }
                }
            }
            $this->assign(array(
                'goodsNum' => $goodsNum,
                'goodsShopTotalPrice' => $goodsShopTotalPrice,
                'goodsTotalPrice' => $goodsTotalPrice,
                'goodsArr' => $goodsArr,
                'address' => $address
            ));
            return view('order2');
        }
        if(!$goodsList) {
            return view('Common/cart_empty_info');
        }
        $goodsNum = 0;
        foreach($goodsList as $k => $v) {
            $goodsNum += $v['goodsNumber'];
        }
        $this->assign(array(
            'goodsList' => $goodsList,
            'goodsNum' => $goodsNum,
        ));
        return view();
    }


    //订单提交
    public function orderPost() {
        if(session('uid')) {
            if(request()->isPost()) {
                //处理用户收货地址信息，若是第一次下单，则插入收货地址，否则修改地址
                $data = input('post.');
                //先验证地址数据，并将地址数据添加到地址表中
                $validate = Loader::validate('Order');
                if($validate->check($data)) {
                    $ret['name'] = $data['name'];
                    $ret['userId'] = $data['userId'];
                    $ret['phone'] = $data['phone'];
                    $ret['tel'] = $data['tel'];
                    $ret['province'] = $data['province'];
                    $ret['city'] = $data['city'];
                    $ret['county'] = $data['county'];
                    $ret['address'] = $data['address'];
                    $ret['email'] = $data['email'];
                    $ret['zipcode'] = $data['zipcode'];
                    $ret['bestTime'] = $data['bestTime'];
                    $num = db('address')->where('userId','eq',$data['userId'])->count();
                    if($num) {
                        if(db('address')->where('userId','eq',$data['userId'])->update($ret) === false) {
                            return view('common/tip_info',['errorMsg' => "抱歉，收货地址更新失败！请稍后重试或联系客服",'showRight' => 1200]);
                        }
                    }else {
                        if(!db('address')->insert($ret)) {
                            return view('common/tip_info',['errorMsg' => "抱歉，新增收货地址失败！请稍后重试或联系客服",'showRight' => 1200]);
                        }
                    }
                    //根据提交的商品id获取商品信息
                    $goodsIds = $data['cart_info'];
                    $cartModel = model('cart');
                    $goodsList = $cartModel->getGoodsListInCart($goodsIds);
                    $goodsTotalPrice = 0;
                    foreach($goodsList as $k => $v) {
                        $goodsTotalPrice += $v['totalPrice']; //计算商品总价
                    }

                    //创建订单所需数据并插入订单数据
                    $order['name'] = $data['name'];
                    $order['userId'] = $data['userId'];
                    $order['phone'] = $data['phone'];
                    $order['postSpant'] = 0;
                    $orderTotalPrice = $goodsTotalPrice + $order['postSpant'];  //商品和邮费一起的价格
                    $order['orderTime'] = time();
                    $order['outTradeNo'] =$order['orderTime'].rand(111111,999999);
                    $order['payment'] = $data['payment'];
                    $order['distribution'] = $data['distribution'];
                    $order['province'] = $data['province'];
                    $order['city'] = $data['city'];
                    $order['county'] = $data['county'];
                    $order['address'] = $data['address'];
                    $order['remark'] = $data['postscript'];
                    $order['goodsTotalPrice'] = $goodsTotalPrice;
                    $order['orderTotalPrice'] = $orderTotalPrice;
                    $orderId = db('order')->insertGetId($order);
                    if($orderId) {
                        //循环创建订单商品数据并插入订单商品中
                        foreach($goodsList as $k => $v) {
                            $orderGoods['goodsId'] = $v['id'];
                            $orderGoods['orderId'] = $orderId;
                            $orderGoods['goodsName'] = $v['goodsName'];
                            $orderGoods['goodsMemberPrice'] = $v['memberPrice'];
                            $orderGoods['goodsMarketPrice'] = $v['marketPrice'];
                            $orderGoods['goodsShopPrice'] = $v['shopPrice'];
                            $orderGoods['goodsNum'] = $v['goodsNumber'];
                            $arr = explode('-',$k);
                            $orderGoods['goodsAttrId'] = $arr[1];
                            $orderGoods['goodsAttrStr'] = $v['goodsAttrStr'];
                            db('order_goods')->insert($orderGoods);
                        }
                        $this->success('下单成功',url('index/flow/orderPay',array('oid' => $orderId),''));
                    }
                    return view('common/tip_info',['errorMsg' => "抱歉，订单生成失败！请稍后重试或联系客服",'showRight' => 1200]);
                }
                $this->error($validate->getError());
            }
            $this->error( '非法请求！');
        }
        $this->redirect('/login.html');
    }

    //支付提示页面
    public function orderPay() {
        $orderId = input('oid');
        $orderData = db('order')->find($orderId);
        if($orderData['payment'] == 1 && $orderData['payStatus'] == 0) {
            include(PAY_PLUS.'alipay/alipayapi.php');
            $payBtn = $html_text;
        }else if($orderData['payment'] == 2 && $orderData['payStatus'] == 0) {
            $payBtn = "<a class='paybtn'  href='" . url('index/flow/wxPay',array('oid' => $orderId)) . "'>微信支付</a>";
        }else if($orderData['payment'] == 3 && $orderData['payStatus'] == 0) {
            $payBtn = "<a class='paybtn'  href='" . url('index/flow/wxThreePay',array('oid' => $orderId)) . "'>微信第三方</a>";
        }else {
	        return view('common/tip_info',['errorMsg' => "订单已支付！",'showRight' => 1200]);
        }
        $this->assign(array(
            'payBtn' => $payBtn,
            'orderData' => $orderData
        ));
        return view('order3');
    }

    //支付宝支付成功回调方法
    public function aliNotify() {
        $orderDB = db('order');
        include(PAY_PLUS.'alipay/notify_url.php');
    }

    //微信第三方二维码支付
    public function wxThreePay() {
        $orderId = input('oid');
        $orderData = db('order')->find($orderId);
        $codepay_id = 75679;//这里改成码支付ID
        $codepay_key = "a32uAWVa5yAH9lTjJ55Ct2VLu14a603R"; //这是您的通讯密钥

        $data = array(
            "id" => $codepay_id,//你的码支付ID
            "pay_id" => $orderData['outTradeNo'], //唯一标识 可以是用户ID,用户名,session_id(),订单ID,ip 付款后返回
            "type" => 3,//1支付宝支付 3微信支付 2QQ钱包
            "price" => $orderData['orderTotalPrice'],//金额100元
            "param" => "",//自定义参数
            "notify_url"=>"",//通知地址
            "return_url"=>"http://www.xxjdxl.xyz/paySuccess.html",//跳转地址
        ); //构造需要传递的参数

        ksort($data); //重新排序$data数组
        reset($data); //内部指针指向数组中的第一个元素

        $sign = ''; //初始化需要签名的字符为空
        $urls = ''; //初始化URL参数为空

        foreach ($data AS $key => $val) { //遍历需要传递的参数
            if ($val == ''||$key == 'sign') continue; //跳过这些不参数签名
            if ($sign != '') { //后面追加&拼接URL
                $sign .= "&";
                $urls .= "&";
            }
            $sign .= "$key=$val"; //拼接为url参数形式
            $urls .= "$key=" . urlencode($val); //拼接为url参数形式并URL编码参数值

        }
        $query = $urls . '&sign=' . md5($sign .$codepay_key); //创建订单所需的参数
        $url = "http://api2.fateqq.com:52888/creat_order/?{$query}"; //支付页面
        $this->redirect($url);
    }

    //微信第三方支付成功回调方法
    public function wxThreeNotify() {
        ksort($_POST); //排序post参数
        reset($_POST); //内部指针指向数组中的第一个元素
        $codepay_key="a32uAWVa5yAH9lTjJ55Ct2VLu14a603R"; //这是您的密钥
        $sign = '';//初始化
        foreach ($_POST AS $key => $val) { //遍历POST参数
            if ($val == '' || $key == 'sign') continue; //跳过这些不签名
            if ($sign) {
                $sign .= '&'; //第一个字符串签名不加& 其他加&连接起来参数
            }
            $sign .= "$key=$val"; //拼接为url参数形式
        }
        if (!$_POST['pay_no'] || md5($sign . $codepay_key) != $_POST['sign']) { //不合法的数据
            exit('fail');  //返回失败 继续补单
        } else { //合法的数据
            //业务处理
            $outTradeNo = $_POST['pay_id']; //需要充值的ID 或订单号 或用户名
//            $money = (float)$_POST['money']; //实际付款金额
//            $price = (float)$_POST['price']; //订单的原价
//            $param = $_POST['param']; //自定义参数
//            $pay_no = $_POST['pay_no']; //流水号
            $orderDB = db('order');
            $orderDB->where('outTradeNo','eq',$outTradeNo)->setField('payStatus',1);
            exit('success'); //返回成功 不要删除哦
        }
    }

    //支付成功页面
    public function paySuccess() {
        $notifyData = input('get.');
        $orderData = db('order')->where('outTradeNo','eq',$notifyData['out_trade_no'])->find();
        $this->assign(array(
            'orderData' => $orderData
        ));
        return view();
    }

    //微信支付
    public function wxPay() {
        $orderId = input('oid');
        $orderData = db('order')->find($orderId);
        $this->assign(array(
            'orderTotalPrice' => $orderData['orderTotalPrice'],
            'outTradeNo' => $orderData['outTradeNo'],
            'siteurl' => SITEURL
        ));
        return view();
    }

    //微信支付二维码生成
    public function wxewm() {
        $outTradeNo = input('outTradeNo');
        $orderTotalPrice = db('order')->where('outTradeNo','eq',$outTradeNo)->value('orderTotalPrice');
        $orderTotalPrice = 100 * $orderTotalPrice;
        $payPlus = PAY_PLUS.'./wxpay/';
        include($payPlus.'index2.php');
        $obj = new \WeiXinPay2();
        $qrurl = $obj->getQrUrl($outTradeNo,$orderTotalPrice);
        //生成二维码
        \QRcode::png($qrurl);
    }

    //微信支付成功回调方法
    public function wxNotify() {
        $payPlus = PAY_PLUS.'./wxpay/';
        include($payPlus.'notify.php');
        new \Notify();
    }

    //检测微信扫码支付状态
    public function wxStatus() {
        if(request()->isAjax()) {
            $outTradeNo = input('outTradeNo');
            $payStatus = db('order')->where('outTradeNo','eq',$outTradeNo)->value('payStatus');
            return $payStatus;
        }else {
            abort(404);
        }

    }


    //ajax计算购物车数量、节省、总价
    public function cartGoodsAmount() {
        $gids = input('rec_id');
        $gids = explode('|',$gids);
        $cartModel = model('cart');
        $goodsList = $cartModel->getGoodsListInCart();
        $goods_amount = 0; //商品总金额
        $save_total_amount = 0; //优惠节省总金额
        $subtotal_number = 0; //商品总数
        foreach($goodsList as $k => $v) {
            if(in_array($k,$gids)) {
                $goods_amount += $v['totalPrice'];
                $save_total_amount += ($v['shopPrice'] - $v['memberPrice']) * $v['goodsNumber'];
                $subtotal_number += $v['goodsNumber'];
            }
        }
        $data['goods_amount'] = $goods_amount;
        $data['save_total_amount'] = $save_total_amount;
        $data['subtotal_number'] = $subtotal_number;
        return json($data);
    }
    //购物车商品删除
    public function cartGoodsRemove() {
        $id = input('recid');
        $cartValue = input('cart_value');
        $cartModel = model('cart');
        //单个商品删除
        if($id) {
            $cartModel->delCart($id);
        }
        //多个商品删除
        if($cartValue) {
            $cartModel->delCart($cartValue);
            return json(['status' => 1]);
        }
        $this->redirect('/cart.html');
    }
    //购物车商品数量
    public function getCartNum() {
        if(isset($_COOKIE['cart'])) {
            $arr = unserialize($_COOKIE['cart']);
            $cartNum = 0;
            foreach($arr as $k => $v) {
                $cartNum += $v;
            }
        }else {
            $cartNum = 0;
        }
        return $cartNum;
    }
    //获取登录状态
    public function getLoginDialog() {
        $url = url('member/account/login');
        $backAct = input('back_act');  //登录成功跳转地址
        $data['error'] = 0;
        $token = $this->request->token('dsc_token', 'sha1');
        $data['content'] = '<div class="pb-bd"><div class="pb-ct" style="height: 420px;"><div class="login-wrap">
    
    <div class="login-form">
    	    	<div class="coagent">
            <div class="tit"><h3>用第三方账号直接登录</h3><span></span></div>
            <div class="coagent-warp">
            	                                   
                                                                    <a href="user.php?act=oath&amp;type=qq&amp;user_callblock=flow.php" class="qq"><b class="third-party-icon qq-icon"></b></a>
                                            </div>
        </div>
                <div class="login-box">
            <div class="tit"><h3>账号登录</h3><span></span></div>
            <div class="msg-wrap"></div>
            <div class="form">
            	<form name="formLogin"  method="post" onsubmit="userLogin();return false;">
                	<div class="item">
                        <div class="item-info">
                            <i class="iconfont icon-name"></i>
                            <input type="text" id="loginname" name="username" class="text" value="" placeholder="用户名/邮箱/手机">
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-info">
                            <i class="iconfont icon-password"></i>
                            <input type="password" style="display:none">
                            <input type="password" id="nloginpwd" name="password" value="" class="text" placeholder="密码">
                        </div>
                    </div>
                                        <div class="item">
                        <input id="remember" name="remember" type="checkbox" class="ui-checkbox">
                        <label for="remember" class="ui-label">请保存我这次的登录信息。</label>
                    </div>
                    <div class="item item-button">
                    	<input type="hidden" name="dsc_token" value="'.$token.'">
                        <input type="hidden" name="act" value="act_login">
                        <input type="hidden" name="back_act" value="'.$backAct.'">
                        <input type="submit" name="submit" value="登&nbsp;&nbsp;录" class="btn sc-redBg-btn">
                    </div>
                    <div class="lie">
                    	<a href="/getpassword.html" class="notpwd gary fl" target="_blank">忘记密码？</a>
                    	<a href="/reg.html" class="notpwd red fr" target="_blank">免费注册</a>                    </div>
                </form>
            </div>
    	</div>        
    </div>
    <script type="text/javascript">
		var username_empty="<i></i>请输入用户名";
    	var username_shorter="<i></i>用户名长度不能少于 4 个字符。";
    	var username_invalid="<i></i>用户名只能是由字母数字以及下划线组成。";
    	var password_empty="<i></i>请输入密码";
    	var password_shorter="<i></i>登录密码不能少于 6 个字符。";
    	var confirm_password_invalid="<i></i>两次输入密码不一致";
    	var captcha_empty="<i></i>请输入验证码";
    	var email_empty="<i></i>Email 为空";
    	var email_invalid="<i></i>Email 不是合法的地址";
    	var agreement="<i></i>您没有接受协议";
    	var msn_invalid="<i></i>msn地址不是一个有效的邮件地址";
    	var qq_invalid="<i></i>QQ号码不是一个有效的号码";
    	var home_phone_invalid="<i></i>家庭电话不是一个有效号码";
    	var office_phone_invalid="<i></i>办公电话不是一个有效号码";
    	var mobile_phone_invalid="<i></i>手机号码不是一个有效号码";
    	var msg_un_blank="<i></i>用户名不能为空";
    	var msg_un_length="<i></i>用户名最长不得超过15个字符，一个汉字等于2个字符";
    	var msg_un_format="<i></i>用户名含有非法字符";
    	var msg_un_registered="<i></i>用户名已经存在,请重新输入";
    	var msg_can_rg="<i></i>可以注册";
    	var msg_email_blank="<i></i>邮件地址不能为空";
    	var msg_email_registered="<i></i>邮箱已存在,请重新输入";
    	var msg_email_format="<i></i>格式错误，请输入正确的邮箱地址";
    	var msg_blank="<i></i>不能为空";
    	var no_select_question="<i></i>您没有完成密码提示问题的操作";
    	var passwd_balnk="<i></i>密码中不能包含空格";
    	var msg_phone_blank="<i></i>手机号码不能为空";
    	var msg_phone_registered="<i></i>手机已存在,请重新输入";
    	var msg_phone_invalid="<i></i>无效的手机号码";
    	var msg_phone_not_correct="<i></i>手机号码不正确，请重新输入";
    	var msg_mobile_code_blank="<i></i>手机验证码不能为空";
    	var msg_mobile_code_not_correct="<i></i>手机验证码不正确";
    	var msg_confirm_pwd_blank="<i></i>确认密码不能为空";
    	var msg_identifying_code="<i></i>验证码不能为空";
    	var msg_identifying_not_correct="<i></i>验证码不正确";
    		/* *
		 * 会员登录
		*/ 
		function userLogin()
		{
			var frm = $("form[name=\'formLogin\']");
			var username = frm.find("input[name=\'username\']");
			var password = frm.find("input[name=\'password\']");
			var captcha = frm.find("input[name=\'captcha\']");
			var dsc_token = frm.find("input[name=\'dsc_token\']");
			var error = frm.find(".msg-error");
			var msg = \'\';
			
			if(username.val()==""){
				error.show();
				username.parents(".item").addClass("item-error");
				msg += username_empty;
				showMesInfo(msg);
				return false;
			}
			
			if(password.val()==""){
				error.show();
				password.parents(".item").addClass("item-error");
				msg += password_empty;
				showMesInfo(msg);
				return false;
			}
			
			if(captcha.val()==""){
				error.show();
				captcha.parents(".item").addClass("item-error");
				msg += captcha_empty;
				showMesInfo(msg);
				return false;
			}
			var back_act=frm.find("input[name=\'back_act\']").val();
			
            Ajax.call( \''.$url.'\', \'username=\' + username.val()+\'&password=\'+password.val()+\'&dsc_token=\'+dsc_token.val()+\'&captcha=\'+captcha.val()+\'&back_act=\'+back_act, return_login , \'POST\', \'JSON\');
					}
		
		function return_login(result)
		{
			if(result.error>0)
			{
				showMesInfo(result.message);	
			}
			else
			{
				if(result.ucdata){
					$("body").append(result.ucdata)
				}
				location.href=result.url;
			}
		}
		
		function showMesInfo(msg) {
			$(\'.login-wrap .msg-wrap\').empty();
			var info = \'<div class="msg-error"><b></b>\' + msg + \'</div>\';
			$(\'.login-wrap .msg-wrap\').append(info);
		}
	</script>
</div>
</div></div>';
        return json($data);
    }
}
