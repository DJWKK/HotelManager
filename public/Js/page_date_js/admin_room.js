$(document).ready(function() {
    $.get('/api/roommanager/list', function (data) {
        let Str = '';
        for (var i= 0 ;i<data.data.length;i++)
        {
            $(data.data[i]).each(function () {
            Str += `
                <tr>
                <td></td>
                <td>${data.data[i].room_id}</td>
                <td>${data.data[i].name}</td>
                <td class="am-hide-sm-only">${data.data[i].price}</td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button class="am-btn am-btn-default am-btn-xs am-text-secondary" onclick="edit(${data.data[i].room_id})"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                    </div>
                  </div>
                </td>
              </tr>`;
                });
        }
        $('#room_list').empty();
        $('#room_list').append(Str);
    });
});

// 修改房间信息
function edit(id) {

$.get('/api/roommanager/info?room_id='+id, function (data) {

    var room_id = data.data[0].room_id;
    var room_class = data.data[0].name;
    $('#room_id').val(room_id);
    $('#room_class').val(room_class);
});

$('#edit_room_info').modal({
      relatedTarget: this,
      onConfirm: function(e) {
        //alert(decodeURIComponent(jQuery("#form").serialize()));
        $.ajax({
          async: false,
          type: "POST",
          url:'/api/roommanager/setinfo',
          data:decodeURIComponent(jQuery("#form").serialize()),
          contentType : "application/x-www-form-urlencoded; charset=utf-8",
          dataType: "json",
          success: function (data) {
              alert('修改成功');
              //location.reload();
          },
          error: function (XMLHttpRequest, textStatus, errorThrown) {
              alert('修改失败');
              console.log(XMLHttpRequest.status);
              console.log(XMLHttpRequest.readyState);
              console.log(textStatus);
          }
      });

      },
      onCancel: function(e) {

      }
    });
}