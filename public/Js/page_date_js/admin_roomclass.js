$(document).ready(function() {
    //表单数据回显
    $.get('/api/roomclass/classinfo', function (data) {
        var class1 = data.data[0].name;
        var price1 = data.data[0].price;
        var class2 = data.data[1].name;
        var price2 = data.data[1].price;
        var class3 = data.data[2].name;
        var price3 = data.data[2].price;

        $('#class1').val(class1);
        $('#price1').val(price1);
        $('#class2').val(class2);
        $('#price2').val(price2);
        $('#class3').val(class3);
        $('#price3').val(price3);
    });
});


function submit_class() {
    //console.log($("#form").serialize());
    $.ajax({
        async: false,
        type: "POST",
        url:'/api/roomclass/setclassinfo',
        data:decodeURIComponent(jQuery("#form").serialize()),
        contentType : "application/x-www-form-urlencoded; charset=utf-8",
        dataType: "json",
        success: function (data) {
            var CustInfo = data.data;
            console.log(CustInfo)
            alert('修改成功');
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('修改失败');
            console.log(XMLHttpRequest.status);
            // 状态
            console.log(XMLHttpRequest.readyState);
            // 错误信息
            console.log(textStatus);
        }
    });
    return false
}