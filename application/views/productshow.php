<?=$header;?>
<?=$header_nav;?>
 <section class="content">
<div class="main col-md-9 col-md-offset-3">
  <?php
  $count  = 0;
   foreach ($product as $productView) {
   ?>
    <div class="col-xs-3">
        <a href="#" class="thumbnail">
             <img src="<?=base_url().$productView['p_img'];?>" class="img-responsive">
        </a>
        <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                      Category Name : <?=$productView['p_name'];?>
                    </h4>
        </div>
    </div>
  <?php $count++; } ?>
</div>
</section>
<?php echo $footer; ?>