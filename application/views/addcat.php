<?=$header;?>
<?=$header_nav;?>
 <section class="content">
<div class="panel panel-primary">
<div class="row">
<div class="col-lg-3 col-md-6">
</div>
<div class="col-lg-6 col-md-6">
<?php echo isset($error)?$error:FALSE;?> <!-- Error Message will show up here -->
<?php echo form_open_multipart('admin/addCategories');?>
  <div class="form-group">
     <label for="exampleInputEmail1">Categories Name</label>
    <input type="name" name="cat_name" class="form-control" id="cat_name" placeholder="Categories Name">
  </div>
  <div class="form-group">
    <label for="photo">Categories Images</label>
    <input type="file" name="photo" id="photo">
    <p class="help-block">Upload Your Categories Image.</p>
  </div>
  <input type="submit" name="submit" class="btn btn-default"value='Submit'>
</form>
</div>
<div class="col-lg-3 col-md-6"></div>
</div>
</div>
</section>
<?=$footer;?>