<?=$header;?>
<?=$header_nav;?>
<section class="content">
<div class="panel panel-primary">
<div class="row">
<div class="col-lg-3 col-md-6">
</div>
<div class="col-lg-6 col-md-6">
<?php echo isset($error)?$error:FALSE;?> <!-- Error Message will show up here -->
<?php echo form_open_multipart('admin/addNewProduct');?>
   <div class="form-group">
  <label for="sel1">Select Categories:</label>
  <select class="form-control" id="cat_id" name="cat_id">
      <option>Select Categories</option>
    <?php foreach ($catShow as $catView) {
      echo "<option value=".$catView['cat_id'].">".$catView['cat_name']."</option>";
    }
    ?>
  </select>
</div>
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
    <p class="help-block">Upload Your Product Image.</p>
  </div>
  <input type="submit" name="submit" class="btn btn-default"value='Submit'>
</form>
</div>
<div class="col-lg-3 col-md-6"></div>
</div>
</div>
</section>
<?=$footer;?>