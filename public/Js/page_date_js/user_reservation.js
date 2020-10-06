window.onload = function() {
    Particles.init({
        selector: '.background',
        connectParticles: true,
        color: '#E9896A'
    });
};

function submit_l(){
    console.log('1');
    $.ajax({
        async: false,
        type: "POST",
        url:'/api/resver',
        data:decodeURIComponent(jQuery("#form").serialize()),
        contentType : "application/x-www-form-urlencoded; charset=utf-8",
        dataType: "json",
        success: function (data) {
                alert('预约成功！');
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('预约失败');
            console.log(XMLHttpRequest.status);
            console.log(XMLHttpRequest.readyState);
            console.log(textStatus);
        }
    });
}
