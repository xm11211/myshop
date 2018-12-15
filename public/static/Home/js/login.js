$.ajax({
    url:checkLoginUrl,
    type:'post',
    success:function (data) {
        if(data.error == 0) {
            var str = ' <span>您好 &nbsp;<a href="/user/'+ data.uid +'.html">' + data.username + '</a></span>' +
                '<span>，欢迎来到&nbsp;<a alt="首页" title="首页" href="/">tp5商城</a></span>' +
                '<span>[<a href="/logout.html">退出</a>]</span>';
            $("#ECS_MEMBERZONE").append(str);
        }else {
            var str = ' <a href="/login.html" class="link-login red">请登录</a>' +
                '<a href="/reg.html" class="link-regist">免费注册</a>';
            $("#ECS_MEMBERZONE").append(str);
        }
    }
});