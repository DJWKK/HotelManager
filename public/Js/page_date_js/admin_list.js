function del(id) {
    $('#delet_list_info').modal({
        relatedTarget: this,
        onConfirm: function(options) {
          console.log(id);
        },
        // closeOnConfirm: false,
        onCancel: function() {
        }
      });
  }
