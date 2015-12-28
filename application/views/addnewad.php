<?=$header;?>
<?=$header_nav;?>
<section class="content">
<div class="panel panel-primary">
<div class="row">
<div class="col-lg-3 col-md-6">
</div>
<div class="col-lg-6 col-md-6">
<?php echo isset($error)?$error:FALSE;?> <!-- Error Message will show up here -->
<?php echo form_open_multipart('admin/addNewad');?>
   <div class="form-group">
  <label for="sel1">Select Categories:</label>
  <select class="form-control" id="cat_id" name="cat_id">
      <option>Select Categories</option>
    <?php foreach ($catShow as $catView) {
      echo "<option value=".$catView['adpic_id'].">".$catView['adpic_name']."</option>";
    }
    ?>
  </select>
</div>
  <div class="form-group">
     <label for="adpicpro_name">Ad Name</label>
    <input type="name" name="adpicpro_name" class="form-control" id="adpicpro_name" placeholder="Ad Name">
  </div>
  <div class="form-group">
     <label for="adpicpro_url">Ad Url</label>
    <input type="name" name="adpicpro_url" class="form-control" id="adpicpro_url" placeholder="Ad Url">
  </div>
  <div class="form-group">
    <label for="photo">Ad Banner</label>
    <input type="file" name="photo" id="photo">
    <p class="help-block">Upload Your Ad Banner Image.</p>
  </div>
  <input type="submit" name="submit" class="btn btn-default"value='Submit'>
</form>
</div>
<div class="col-lg-3 col-md-6"></div>
</div>
</div>
</section>

<?=$footer;?>