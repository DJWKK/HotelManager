$("#from").submit(function(){
    console.log(decodeURIComponent(jQuery("#from").serialize()))
    $.ajax({
        async: true,
        type: "POST",
        url:'/api/checkin',
        data:decodeURIComponent(jQuery("#from").serialize()),
        dataType: "json",
        success: function (data) {
            var CustInfo = data.data;
            console.log(CustInfo)
            alert('入住成功');

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('入住失败');
            console.log(XMLHttpRequest.status);
            // 状态
            console.log(XMLHttpRequest.readyState);
            // 错误信息
            console.log(textStatus);
        }
    });
});

$("#").submit(function(){
    parent.layer.close(index); //再执行关闭
    $.ajax({
        async: false,
        type: "POST",
        url:'',
        contentType : "application/x-www-form-urlencoded; charset=utf-8",
        data:$("#apply_link_form").serialize(),
        dataType: "text",
        success: function () {
          },
        error: function () {
        }
    })
})

function submit2() {
    //console.log($("#form").serialize());
        $.ajax({
        async: false,
        type: "POST",
        url:'/api/checkin',
        data:decodeURIComponent(jQuery("#form").serialize()),
        contentType : "application/x-www-form-urlencoded; charset=utf-8",
        dataType: "json",
        success: function (data) {
            var CustInfo = data.data;
            console.log(CustInfo)
            alert('入住成功');
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('入住失败');
            console.log(XMLHttpRequest.status);
            // 状态
            console.log(XMLHttpRequest.readyState);
            // 错误信息
            console.log(textStatus);
        }
    });
}