$(document).ready(function() {
    $.get('api/log', function (data) {
        let Str = '';
        for (var i= 0 ;i<data.data.length;i++)
        {
          $(data.data[i]).each(function () {
                Str += `
                <span class="am-text-success">[${data.data[i].time}]</span> <span class="am-text-danger"> [${data.data[i].type}] </span> ${data.data[i].info}
                  `;});
        }
        $('.am-pre-scrollable').empty();
        $('.am-pre-scrollable').append(Str);

});



});