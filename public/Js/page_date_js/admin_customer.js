  // 修改信息获取并提交
  function edit(id) {

  $.get('/api/custmanager/info?id='+id, function (data) {
      var name = data.data[0].name;
      var idcode = data.data[0].id_code;
      var sex = data.data[0].sex;
      var tel = data.data[0].tel;
      var date = data.data[0].created_at;

      $('#cust').val(id);
      $('#name').val(name);
      $('#id_code').val(idcode);
      $('#tel').val(tel);
      $('#sex').val(sex);
      $('#date').val(date);
  });

    $('#edit_cust_info').modal({
      relatedTarget: this,
      onConfirm: function() {
        $.ajax({
          async: false,
          type: "POST",
          url:'/api/custmanager/set',
          data:decodeURIComponent(jQuery("#form").serialize()),
          contentType : "application/x-www-form-urlencoded; charset=utf-8",
          dataType: "json",
          success: function (data) {
              alert('修改成功');
              location.reload();
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
      return false;
        
      },
      onCancel: function() {
      }
    });
}

// 删除信息
  function del(id) {
    x = confirm("确定删除该客户信息嘛？");
    if (x==true){
      $.get('/api/custmanager/del?id='+id, function (data) {
        alert("删除成功");
        location.reload();
    });
    }else{

    }
  }

  function search() {
    var value = $("#search_input").val();
    //console.log(value);
    $.get('/api/custmanager/search?value='+value, function (data) {
      let Str = '';
        for (var i= 0 ;i<data.data.length;i++)
        {
          $(data.data[i]).each(function () {
                Str += `
                <tr>
                <td></td>
                <td>${data.data[i].cust_id}</td>
                <td>${data.data[i].name}</td>
                <td>${data.data[i].sex}</td>
                <td>${data.data[i].tel}</td>
                <td class="am-hide-sm-only">${data.data[i].id_code}</td>
                <td class="am-hide-sm-only">${data.data[i].created_at}</td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button class="am-btn am-btn-default am-btn-xs am-text-secondary" onclick="edit('${data.data[i].cust_id}')"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                      <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" onclick="del(${data.data[i].cust_id})"><span class="am-icon-trash-o"></span> 删除</button>
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

$(document).ready(function() {
    $.get('api/custmanager/list', function (data) {
        let Str = '';
        for (var i= 0 ;i<data.data.length;i++)
        {
          $(data.data[i]).each(function () {
                Str += `
                <tr>
                <td></td>
                <td>${data.data[i].cust_id}</td>
                <td>${data.data[i].name}</td>
                <td>${data.data[i].sex}</td>
                <td>${data.data[i].tel}</td>
                <td class="am-hide-sm-only">${data.data[i].id_code}</td>
                <td class="am-hide-sm-only">${data.data[i].created_at}</td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button class="am-btn am-btn-default am-btn-xs am-text-secondary" onclick="edit('${data.data[i].cust_id}')"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                      <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" onclick="del(${data.data[i].cust_id})"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </div>
                </td>
              </tr>
                  `;});
        }
        $('#list').empty();
        $('#list').append(Str);

      });
});



function editSub() {
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
}