       <div class="container">
        <h1>User Update Form</h1>
         <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_info->id; ?>" />
    <form  class="block-content form" action="<?php echo base_url(); ?>home/update_user" method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <input id="textfield" name="id" class="required" type="hidden" value="<?php echo $user_info->id;?>" />
            <label for="textfield">User Name</label>
            <input id="textfield" name="name" class="required form-control" type="text" value="<?php echo $user_info->name; ?>" />
        </div>

        <div class="form-group">
            <label for="textfield">User Login Id</label>
            <input id="textfield" name="login_id" class="required form-control" type="text" value="<?php echo $user_info->employee_id; ?>" />
        </div>
        <div class="form-group">
            <label for="textfield">User HID Card No</label>
            <input id="textfield" name="hid_card_number" class="required form-control" type="text" value="<?php echo $user_info->hid_card_number; ?>" />
        </div>
        <div class="form-group">
            <label for="textfield">Mobile No</label>
            <input id="textfield" name="mobile" class="required form-control" type="text" value="<?php echo $user_info->mobile; ?>" />
        </div>
        <div class="form-group">
                   <span class="label">Role Status</span>
                <?php
                if ($user_info->role == "GP Employee") {
                    ?>
                    <label><input checked="checked" type="radio" name="role_status" value="GP Employee" />GP Employee</label>
                    <label><input type="radio" name="role_status" value="F&B User" />F&B User</label>
                    <label><input type="radio" name="role_status" value="Outsourced" />Outsourced</label>
                    <label><input type="radio" name="role_status" value="Administrator" />Administrator</label>

                    <?php
                } else if ($user_info->role == "F&B User") {
                    ?> 
                    <label><input type="radio" name="role_status" value="GP Employee" />GP Employee</label>
                    <label><input checked="checked" type="radio" name="role_status" value="F&B User" />F&B User</label>
                    <label><input type="radio" name="role_status" value="Outsourced" />Outsourced</label>
                    <label><input type="radio" name="role_status" value="Administrator" />Administrator</label>

                    <?php
                } else if ($user_info->role == "Outsourced") {
                    ?> 
                    <label><input type="radio" name="role_status" value="GP Employee" />GP Employee</label>
                    <label><input type="radio" name="role_status" value="F&B User" />F&B User</label>
                    <label><input checked="checked" type="radio" name="role_status" value="Outsourced" />Outsourced</label>
                    <label><input type="radio" name="role_status" value="Administrator" />Administrator</label>

                    <?php
                } else {
                    ?> 
                    <label><input type="radio" name="role_status" value="GP Employee" />GP Employee</label>
                    <label><input type="radio" name="role_status" value="F&B User" />F&B User</label>
                    <label><input type="radio" name="role_status" value="Outsourced" />Outsourced</label>
                    <label><input checked="checked" type="radio" name="role_status" value="Administrator" />Administrator</label>
                    <?php
                }
                ?>
        </div>
        <div class="form-group">
            <p><label for="textfield">F & B limits</label>
            <input type="phone" id="textfield" name="fnb_limit" class="required form-control" maxlength="2" size="20" value="<?php echo $user_info->fnb_limit; ?>" /></p>
        </div>
        <div class="form-group">
            <label for="textfield">User Department</label>
            <input id="textfield" name="department_name" class="required form-control" type="text" value="<?php echo $user_info->department_name; ?>" />
        </div>
        <div class="form-group">
            <label for="textfield">User Designation</label>
            <input id="textfield" name="designation" class="required form-control" type="text" value="<?php echo $user_info->designation; ?>" />
        </div>
        <div class="form-group">
            <label for="textfield">User Email</label>
            <input id="textfield" name="email" class="required form-control" type="text" value="<?php echo $user_info->email; ?>" />
        </div>
        <div class="form-group">
            <span class="btn btn-default btn-file">
              <img src="<?php echo base_url();?><?php echo $user_info->photo; ?>" width="50px" /> Change User Image<input type="file" id="textfield" name="photo">
          </span>
        </div>
        <div class="form-group">
           <label for="textarea">User Comments</label>
           <textarea id="textarea" name="comments" class="required form-control" rows="5"><?php echo $user_info->comments;?></textarea>
        </div>

        <div class="form-group">
            <p>
                <span class="label">Lunch Status</span>
                <?php
                if ($user_info->lunch_status == "Registered") {
                    ?>
                    <label><input checked="checked" type="radio" name="lunch_status" value="Registered" />Registered</label>
                    <label><input type="radio" name="lunch_status" value="Unregistered" />Unregistered</label>
                    <?php
                } else {
                    ?> 
                     <label><input  type="radio" name="lunch_status" value="Registered" id="register" />Registered</label>
                    <label><input checked="checked" type="radio" name="lunch_status" value="Unregistered" />Unregistered</label>
                <?php } ?>
            </p>
        </div>

        <input type="hidden" id="selected_date">
        <div class="form-group">
            <p>
                <span class="label">User Status</span>
                <?php
                if ($user_info->user_status == "Active") {
                    ?>
                    <label><input checked="checked" type="radio" name="user_status" value="Active" />Active</label>
                    <label><input type="radio" name="user_status" value="Inactive" />Inactive</label>
                    <?php
                } else {
                    ?> 
                    <label><input  type="radio" name="user_status" value="Active" />Active</label>
                    <label><input checked="checked" type="radio" name="user_status" value="Inactive" />Inactive</label>
                <?php } ?>
            </p>
        </div>
       <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update User" onclick=" return validate();"> <input type="submit" class="btn btn-primary" value="Cancel">
        </div>
    </form>
</div>
<!-- jQuery -->
<script src="<?=base_url()?>js/jquery-1.11.0.min.js"></script>
<script src="<?=base_url()?>js/ckeditor.js"></script>
<script src="<?=base_url()?>js/jquery-ui.min.js"></script>
<script language='JavaScript'>
function validate()
{


 var url='<?php echo base_url()?>'+'user/update_lunch';
                  var user_id=$('#user_id').val();
                  var date=$('#selected_date').val();
                    var info={'user_id':user_id,'date':date};
                                     $.ajax({
                                            type: "POST",
                                            url: url,
                                            data: info,
                                            dataType: "json",
                                            success:function (data) { 
                                                    console.log(data);  

                                                    $('#register').attr('checked');                                    
                                            }
                                        });  


    conf = confirm("Are you sure you want to edit user?");
    if (conf)
        return true
    else
        return false;
};
// $("#register").click(function(){
//     alert("Nice!");
// });
$(function(){
                $.datepicker.setDefaults(
                    $.extend($.datepicker.regional[''])
                );
                $('#register').datepicker({
                     onSelect: function(dateText, inst) {
                    var date = $(this).val();
                    dateFormat: 'dd-mm-yy', date;
                     $('#selected_date').val(date);        
                    }
                });
              });
</script>
