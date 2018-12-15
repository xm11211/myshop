function myload(container,content,url,data,flag){
    var befUrl = window.location.href;
    $(container).remove();
    $(content).load(url + ' ' + container,data,function (response,status) {
        if(status == 'error'){
            var reqFail = '<button id="reqFail" class="btn btn-danger" ' +
                'onclick="javascript: Notify(\'请求页面失败，刷新页面重试!\', \'top-right\', \'5000\', \'danger\', \'fa-bolt\', true); return false;" ' +
                'style="display: none;">请求页面失败提示</button>';
            $(content).append(reqFail);
            $("#reqFail").click();
        }
        var sc = $(response).find('script');
        $(content).append(sc);
        if(flag) {
            window.history.pushState(befUrl, null, url);
        }
    });
}
// window.addEventListener("popstate", function () {
//     var url = history.state;
//     if(url == null){
//         return;
//     }
//     myload('#container','#content',url);
// });

//按钮绑定url
function addBind(obj,url){
    $(obj).on('click',function(){
        location.href = url;
    });
}
//提交代码
function subm(obj,submitUrl,secObj,secUrl,container,conetnt){
    var formData = new FormData($(obj)[0]);
    $.ajax({
        url:submitUrl,
        method:"post",
        data:formData,
        processData: false,
        contentType: false,
        success:function(data) {
            // console.log(data);return false;
            if(data.code == 1){
                judgeEvents(secObj,'click','操作成功！','success','fa-check');
                myload(container,conetnt,secUrl,1);
            }else{
                judgeEvents(secObj,'click',data.msg,'danger','fa-bolt');
            }
        },
        error:function(xhr,status,error){
            alert(xhr.status);
        }
    });
}
//判断事件是否绑定
function judgeEvents(obj,event,info,theme,flag,position){
    var eventsArr = $._data($(obj)[0],"events");
    if(eventsArr && eventsArr[event]){
        $(obj).off(event);
        $(obj).on(event,function () {
            if(position) {
                Notify(info, position, '5000', theme, flag, true);
                return;
            }
            Notify(info, 'top-right', '5000', theme, flag, true);
        });
    }else{
        $(obj).on('click',function () {
            if(position) {
                Notify(info, position, '5000', theme, flag, true);
                return;
            }
            Notify(info, 'top-right', '5000', theme, flag, true);
        });
    }
    $(obj).click();
}
//表格复选框批量点击
function clickBatch(obj1,obj2){
    $(obj1).on('click',function () {
        $(obj2).prop("checked",$(this).prop("checked"));
    });
    $(obj2).on('click',function(){
        if($(obj2).length == $(obj2 + ":checked").length){
            $(obj1).prop("checked",true);
        }else{
            $(obj1).prop("checked",false);
        }
    });
}
//表格合并列
function colspan(){
    $len = $("thead th").length;
    $("tr:last td").attr("colspan",$len);
}
//批量删除
function delBat(obj,checkedObj,secMsg,delUrl){
    $(obj).on('click',function () {
        var obj2 = $(checkedObj);
        if(obj2.length == 0){
            judgeEvents(secMsg,'click','请先勾选！','purple','fa-warning');
            return false;
        }
        var arr = [];
        for(var a = 0; a < obj2.length; ++ a){
            arr[a] = obj2[a].value;
        }
        boot(arr,delUrl,secMsg);
    });
}
//单个删除
function ajaxDelete(obj,delUrl,secObj){
    var but = $(obj);
    var butLen = but.length;
    for(var a = 0;a < butLen;++ a) {
        $(but[a]).on('click',function(){
            boot(this.value,delUrl,secObj);
        });
    }
}
//删除代码
function boot(value,delUrl,secObj){
    bootbox.numVal = value;
    bootbox.confirm({
        buttons: {
            confirm: {
                label: '确定',
                className: 'btn btn-primary'
            },
            cancel: {
                label: '取消',
                className: 'btn btn-default'
            }
        },
        message: '确认删除？',
        callback: function(result) {
            if(result) {
                $.ajax({
                    url:delUrl,
                    method:'post',
                    cache:false,
                    data:{id: "" + bootbox.numVal + ""},
                    success:function(data) {
                        if(data.code == 1){
                            location.href = data.url;
                        }else{
                            judgeEvents(secObj,'click',data.msg,'danger','fa-bolt');
                        }
                    },
                    error:function(xhr,status,thrown) {
                        alert(xhr.status);
                        alert(xhr.readState);
                        alert(status);
                    }
                });
            }
        },
        title: "提示信息"
    });
}

//去除数组中的空值
function trimSpace(array){
    for(var i = 0 ;i<array.length;i++) {
        if(array[i] == "" || typeof(array[i]) == "undefined") {
            array.splice(i,1);
            i= i-1;
        }
    }
    return array;
}
//判断数组是否有重复值
function isRepeat(array){
    var hash = {};
    for(var i in array) {
        if(array[i]!=""){
            if(hash[array[i]]) {
                return true;
            }
            hash[array[i]] = true;
        }
    }
    return false;
}
//数组去重
function rmRepeat(array) {
    var arr = [];
    for(var k in array) {
        if(arr.indexOf(array[k]) == -1) {
            arr.push(array[k]);
        }
    }
    return arr;
}