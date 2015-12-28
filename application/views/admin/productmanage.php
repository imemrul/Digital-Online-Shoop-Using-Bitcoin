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
                        <th>Product Name</th>
                        <th>Product Key</th>
                        <th>Product Price</th>
                        <th>Product Images</th>
                        <th>Category Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $count  = 0;
                         foreach ($catShow as $catView) {
                         ?>
                      <tr>
                        <td><?=$catView['p_name']?></td>
                        <td><?=$catView['p_key']?></td>
                        <td><?=$catView['price']?> $</td>
                        <td><img src="<?=base_url().$catView['p_img']?>" width="40" height="40"></td>
                        <td><?=$catView['cat_name']?></td>
                        <td>
                          <a onclick="upadteModal('<?=$catView['cat_name']?>','<?=$catView['cat_id']?>','<?=$catView['pid']?>','<?=$catView['p_name']?>', '<?=$catView['p_key']?>','<?=$catView['price']?>' )" href="#"><i class="fa fa-pencil"></i></a> || <a onclick="recordDelete('<?=$catView['pid']?>')" href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>
                        <?php $count++; } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Product Name</th>
                        <th>Product Key</th>
                        <th>Product Price</th>
                        <th>Product Images</th>
                        <th>Category Name</th>
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
        <h4 class="modal-title" id="myModalLabel">Product Update Form</h4>
      </div>
      <div class="modal-body">
      <form action="#" method="post" enctype="multipart/form-data">
      <div class="form-group">
      <label for="sel1">Select Categories:</label>
      <select class="form-control" id="cat_id" name="cat_id">
          <option id="selected">Select Categories</option>
        <?php foreach ($allcatShow as $catView) {
          echo "<option value=".$catView['cat_id'].">".$catView['cat_name']."</option>";
        }
        ?>
      </select>
    </div>
    <input type='hidden' id="pid" name="pid" >
      <div class="form-group">
         <label for="p_name">Product Name</label>
        <input type="name" name="p_name" class="form-control" id="p_name" placeholder="Product Name">
      </div>
      <div class="form-group">
         <label for="p_key">Product Key</label>
        <input type="name" name="p_key" class="form-control" id="p_key" placeholder="Product Key">
      </div>
      <div class="form-group">
         <label for="price">Product Price</label>
        <input type="name" name="price" class="form-control" id="price" placeholder="Product Price">
      </div>
      <div class="form-group">
          <label for="photo">Product Images</label>
          <input type="file" name="photo" id="photo">
          <p class="help-block">max_size = 1 MB, max_width = 1024px, max_height = 768px.</p>
        </div>
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
    function upadteModal(cat_name,cat_id, pid, p_name, p_key, price){
        $('#upadteModal').modal('show');
        $('#selected').val(cat_id);
        $('#pid').val(pid);
        $('#p_name').val(p_name);
        $('#p_key').val(p_key);
        $('#price').val(price);
    }
    function recordDelete(pid){
      var recodeDelete = 'recodeDelete';
      var data = {'pid': pid, 'recodeDelete': recodeDelete};
      $.ajax({
                    url: '<?=base_url()?>admin/prodocutupdate', // point to server-side PHP dataType    : 'json',
                    data        : data,
                    type        : 'POST',
                    success: function(response){
                        $('#alert').show('slow');
                        $('#response').text('Delete Successfully You can see chnage after refrash.');
                        console.log(response); // display response from the PHP script, if any
                    },
                   error: function(jqXHR, textStatus, errorThrown) {
                       console.log("Data Didn't Found");
                    }
         });
    }
    $('#catUpdate').on('click', function() {
        var p_name    = $('#p_name').val();
        var p_key     = $('#p_key').val();
        var price     = $('#price').val();
        var pid       = $('#pid').val();
        var cat_id    = $('#cat_id').val();
        var file_data = $('#photo').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('photo', file_data);
        form_data.append('p_name', p_name);
        form_data.append('p_key', p_key);
        form_data.append('price', price);
        form_data.append('pid', pid);
        form_data.append('cat_id', cat_id);
        $.ajax({
                    url: '<?=base_url()?>admin/prodocutupdate', // point to server-side PHP script 
                    dataType: 'text',  // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,                        
                    type: 'post',
                    success: function(response){
                        $('#alert').show('slow');
                        $('#response').text('Update Successfully You can see chnage after refrash.');
                        console.log(response); // display response from the PHP script, if any
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log("Data Didn't Found");
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