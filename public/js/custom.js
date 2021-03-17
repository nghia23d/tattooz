 $(document).ready(function() {
      
        $("#admin-table").DataTable({
          "responsive": true,
          "autoWidth": false,
          "language": {
            "emptyTable": "Hiện tại khống có phần tử nào",
            "info":        "Hiển thị _START_ từ _END_ của _TOTAL_ phần tử",
            "infoEmpty":      "Hiển thị 0 từ 0 đến 0 phần tử",
            "lengthMenu":     "Hiển thị _MENU_ phần tử",
            "search":         "Tìm kiếm:",
            "zeroRecords":    "Không phần tử nào được tìm thấy",
            "paginate": {
                "first":      "Đầu",
                "last":       "Cuối",
                "next":       "Tiếp",
                "previous":   "Trước"
            },
          }
        });

        $("button.btn-status-ajax").click(function() {
          
          let id     = $(this).data('id');
          let value  = $(this).attr('data-value');
          let module = $(this).data('module');

          $.ajax({
            url: '/myweb/' + module + '/change-status' ,
            data : {
              status :value,
              id:id
            },
            type: 'GET',
            dataType : 'json',
            success:function(data){
              toastr.success('Cập nhật trạng thái thành công');
              let btnCurrent = $('.btn-status-ajax[data-id="'+data.id+'"]');
              btnCurrent.attr('data-value',data.status);

              if(data.status == 0){
                btnCurrent.html('Chưa kích hoạt').removeClass('btn-success').addClass('btn-info');
              }
              else{
                btnCurrent.html('Kích hoạt').addClass('btn-success').removeClass('btn-info');
              }
            }

          });

	      });

      });