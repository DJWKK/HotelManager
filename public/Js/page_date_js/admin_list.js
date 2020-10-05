// 删除信息

function del(id) {
  x = confirm("确定删除这条入住记录嘛？");
  if (x==true){
    $.get('/api/record/del?rec_id='+id, function (data) {
      alert("删除成功");
      location.reload();
  });
  }else{

  }
}
$(document).ready(function() {
  $.get('/api/record/list', function (data) {
      let Str = '';
      for (var i= 0 ;i<data.data.length;i++)
      {
        $(data.data[i]).each(function () {
              Str += `
              <tr>
              <td></td>
              <td>${data.data[i].record_id}</td>
              <td>${data.data[i].room_id}</td>
              <td class="am-hide-sm-only">${data.data[i].name}</td>
              <td class="am-hide-sm-only">${data.data[i].id_code}</td>
              <td class="am-hide-sm-only">${data.data[i].in_time}</td>
              <td class="am-hide-sm-only">${data.data[i].out_time}</td>
              <td class="am-hide-sm-only">${data.data[i].res_time}</td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" onclick="del(${data.data[i].record_id})"><span class="am-icon-trash-o"></span> 删除</button>
                  </div>
                </div>
              </td>
            </tr>
                `;});
      }
      $('#list').empty();
      $('#list').append(Str);
    }
  );
});


function search() {
  var value = $("#search_input").val();
  console.log(value);
  $.get('/api/record/search?value='+value, function (data) {
    let Str = '';
    for (var i= 0 ;i<data.data.length;i++)
    {
      $(data.data[i]).each(function () {
            Str += `
            <tr>
            <td></td>
            <td>${data.data[i].record_id}</td>
            <td>${data.data[i].room_id}</td>
            <td class="am-hide-sm-only">${data.data[i].name}</td>
            <td class="am-hide-sm-only">${data.data[i].id_code}</td>
            <td class="am-hide-sm-only">${data.data[i].in_time}</td>
            <td class="am-hide-sm-only">${data.data[i].out_time}</td>
            <td class="am-hide-sm-only">${data.data[i].res_time}</td>
            <td>
              <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                  <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" onclick="del(${data.data[i].record_id})"><span class="am-icon-trash-o"></span> 删除</button>
                </div>
              </div>
            </td>
          </tr>
              `;});
    }
    $('#list').empty();
    $('#list').append(Str);
  });
}