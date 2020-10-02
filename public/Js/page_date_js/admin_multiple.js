function add() {
    $('#add_admin_info').modal({
        relatedTarget: this,
        onConfirm: function(e) {
          //处理弹出层表单提交信息
          console.log(e.data);
        },
        onCancel: function(e) {

        }
      });
  }

  function del(id) {
      $('#delet_admin_info').modal({
          relatedTarget: this,
          onConfirm: function(options) {
            console.log(id);
          },
          // closeOnConfirm: false,
          onCancel: function() {

          }
        });

    }
