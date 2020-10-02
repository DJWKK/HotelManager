  // 修改信息获取并提交
  function edit(id) {
    $('#edit_cust_info').modal({
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
// 删除信息
  function del(id) {
    $('#delet_cust_info').modal({
        relatedTarget: this,
        onConfirm: function(options) {
          console.log(id);
        },
        // closeOnConfirm: false,
        onCancel: function() {
        }
      });
  }
