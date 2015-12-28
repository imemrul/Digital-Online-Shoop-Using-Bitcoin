<?=$header;?>
<?=$header_nav;?>
<!-- Main content -->
        <section class="content">
          <div id="alert" style="display:none">
              <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                 <span id="response"></span>
              </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Table With Full Features</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Category Name</th>
                        <th>Category Images</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $count  = 0;
                         foreach ($catShow as $catView) {
                         ?>
                      <tr>
                        <td><?=$catView['cat_name']?></td>
                        <td><img src="<?=base_url().$catView['cat_img']?>" width="40" height="40"></td>
                        <td><a onclick="upadteModal('<?=$catView['cat_name']?>','<?=$catView['cat_id']?>' )" href="#"><i class="fa fa-pencil"></i></a> || <a onclick="recordDelete('<?=$catView['cat_id']?>')" href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>
                        <?php $count++; } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Category Name</th>
                        <th>Category Images</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
<?=$footer;?>
<!-- Modal -->
<div class="modal fade" id="upadteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Category Upadte Form</h4>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <label for="name">Category Name</label>
      <form action="#" method="post" enctype="multipart/form-data">
      <input class="form-control" type="email" id="name">
      </div>
      <div class="form-group">
        <label for="photo">File input</label>
        <input type="file" id="photo">
        <p class="help-block">max_size = 1 MB, max_width = 1024px, max_height = 768px.</p>
      </div>
      <input type="hidden" class="form-control" value="" id="id">
       </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="catUpdate" class="btn btn-default" data-dismiss="modal">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- DataTables -->
    <script src="<?=base_url()?>admin_assist/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>admin_assist/plugins/datatables/dataTables.bootstrap.min.js"></script>
     <!-- page script -->
    <script>
    function upadteModal(cat_name, cat_id){
        $('#upadteModal').modal('show');
        $('#name').val(cat_name);
        $('#id').val(cat_id);
    }
    function recordDelete(cat_id){
      var data = {'cat_id': cat_id, 'delete':'delete'};
      $.ajax({
                    url: '<?=base_url()?>admin/CategoriesManage', // point to server-side PHP dataType    : 'json',
                    data        : data,
                    type        : 'POST',
                    success: function(response){
                        $('#alert').show('slow');
                        $('#response').text('Delete Successfully You can see chnage after refrash.');
                        console.log(response.message); // display response from the PHP script, if any
                    },
                   error: function(jqXHR, textStatus, errorThrown) {
                       console.log("Data Didn't Found");
                    }
         });
    }
    $('#catUpdate').on('click', function() {
        var cat_name = $('#name').val();
        var cat_id = $('#id').val()
        var file_data = $('#photo').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('photo', file_data);
        form_data.append('cat_name', cat_name);
        form_data.append('cat_id', cat_id);
        $.ajax({
                    url: '<?=base_url()?>admin/CategoriesManage', // point to server-side PHP script 
                    dataType: 'text',  // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,                        
                    type: 'post',
                    success: function(response){
                        $('#alert').show('slow');
                        $('#response').text('Update Successfully You can see chnage after refrash.');
                        console.log(response.message); // display response from the PHP script, if any
                    }
         });
    });
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>