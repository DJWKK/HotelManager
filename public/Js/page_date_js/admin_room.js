// 修改房间信息
function edit(id) {
    $('#edit_room_info').modal({
        relatedTarget: this,
        onConfirm: function(e) {
          //处理弹出层表单提交信息
          console.log(e.data);
          console.log(id);
        },
        onCancel: function(e) {

        }
      });
  }
