<?php echo $header; ?>
<?php echo $sitenav; ?>
<!--Page Content-->
    <div class="page-content" style="padding-top: 85px;">
    
      <!--Hero Slider-->
      <section class="hero-slider">
        <div class="master-slider" id="hero-slider">
        <?php echo $slider; ?>
        </div>
      </section><!--Hero Slider Close-->
    
      <!--Categories-->
      <section class="cat-tiles">
        <div class="container">
          <h2>Browse categories</h2>
          <div class="row">
            <!--Category-->
            <?php
            if(isset($catShow)){
            $count  = 0;
           foreach ($catShow as $catview) {
                     ?>
             <div class="category col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        <a href="<?=base_url().'home/catshow/'.$catview['cat_id']?>">
                          <img src="<?=base_url().$catview['cat_img'];?>" alt="1"/>
                          <p><?=$catview['cat_name'];?></p>
                        </a>
                      </div>
            <?php $count++; } 
              }
            ?>
            <!--Category-->
          </div>
        </div>
      </section><!--Categories Close-->
      
      <!--Catalog Grid-->
      <section class="catalog-grid">
        <div class="container">
          <h2 class="dark-color">Catalog picks</h2>
          <div class="row">
           <div class="col-lg-9 col-md-4 col-sm-6 pull-left"> 
           <!--Tile-->
           <?php
            $count  = 0;
           foreach ($product as $productView) {
                     ?>
             <div class="col-lg-3 col-md-4 col-sm-6">
              <div class="tile">
                <div class="price-label"><?=$productView['price']?> $</div>
                 <a href="<?=base_url()?>">
                  <img src="<?=$productView['p_img'];?>" alt="1"/>
                  <span class="tile-overlay"></span>
                </a>
                <div class="footer">
                  <a href="#"><?=$productView['p_name'];?></a>
                  <span><?=$productView['p_name'];?></span>
                  <button onclick="addtocart('<?=$productView['pid'];?>')" class="btn btn-primary">Get Key</button>
                </div>
              </div>
            </div>
           
            <?php $count++; } ?>
           </div>
            <!--Tile-->
             <div class="col-lg-3 col-md-4 col-sm-6 pull-right">
              <h1>Advertise Here</h1>
             <?php
            if(isset($addata)){
            $count  = 0;
           foreach ($addata as $adview) {
                     ?>

             <div class="col-lg-12 col-md-4 col-sm-6">
                  <a target="-blank" href="http://<?=$adview['adpicpro_url']?>">
                  <img src="<?=base_url().$adview['adpicpro_img'];?>" alt="1"/>
                  <h3><?=$adview['adpicpro_name'];?></h3>
                  </a>
            </div>
            <?php $count++; } 
              }
            ?>
          </div>
        </div>
      </section><!--Catalog Grid Close-->
      <!--Brands Carousel Widget-->
      <section class="brand-carousel">
        <div class="container">
          <h2>Brands in our shop</h2>
          <div class="inner">
            <a class="item" href="#"><img src="img/brands/1.png" alt="1"/></a>
            <a class="item" href="#"><img src="img/brands/2.png" alt="1"/></a>
            <a class="item" href="#"><img src="img/brands/3.png" alt="1"/></a>
            <a class="item" href="#"><img src="img/brands/4.png" alt="1"/></a>
            <a class="item" href="#"><img src="img/brands/1.png" alt="1"/></a>
            <a class="item" href="#"><img src="img/brands/5.png" alt="1"/></a>
            <a class="item" href="#"><img src="img/brands/6.png" alt="1"/></a>
          </div>
        </div>
      </section><!--Brands Carousel Close-->
      
    </div><!--Page Content Close-->
    
    <!--Sticky Buttons-->
    <div class="sticky-btns">
      <form class="quick-contact ajax-form" method="post" name="quick-contact">
        <h3>Contact us</h3>
        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
        <div class="form-group">
          <label for="qc-name">Full name</label>
          <input class="form-control input-sm" type="text" name="name" id="qc-name" placeholder="Enter full name">
        </div>
        <div class="form-group">
          <label for="qc-email">Email</label>
          <input class="form-control input-sm" type="email" name="email" id="qc-email" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="qc-message">Your message</label>
          <textarea class="form-control input-sm" name="message" id="qc-message" placeholder="Enter your message"></textarea>
        </div>
        <!-- Validation Response -->
        <div class="response-holder"></div>
        <!-- Response End -->
        <input class="btn btn-black btn-sm btn-block" type="submit" value="Send">
      </form>
      <span id="qcf-btn"><i class="fa fa-envelope"></i></span>
      <span id="scrollTop-btn"><i class="fa fa-chevron-up"></i></span>
    </div><!--Sticky Buttons Close-->
    
    <!--Subscription Widget-->
    <section class="subscr-widget gray-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-md-8 col-sm-8">
            <h2>Subscribe to our news</h2>
            <form class="subscr-form" role="form" autocomplete="off">
              <div class="form-group">
                <label class="sr-only" for="subscr-name">Enter name</label>
                <input type="text" class="form-control" name="subscr-name" id="subscr-name" placeholder="Enter name" required>
                <button class="subscr-next"><i class="icon-arrow-right"></i></button>
              </div>
              <div class="form-group fff" style="display: none">
                <label class="sr-only" for="subscr-email">Enter email</label>
                <input type="email" class="form-control" name="subscr-email" id="subscr-email" placeholder="Enter email" required>
                <button type="submit" id="subscr-submit"><i class="icon-check"></i></button>
              </div>
            </form>
            <p class="p-style2">Please fill the field before continuing</p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-1">
            <p class="p-style3">Get more followers. In case of high quality newsletters the customers return rate can increase up to 20%! Have you already estimated your possible income? We took that into account and created a decent subscription form. </p>
          </div>
        </div>
      </div>
    </section><!--Subscription Widget Close-->
	
<?php echo $footer; ?>
<script type="text/javascript">
// $('#cart').load('<?=base_url()?>cart');
function addtocart(id){
  $('#ergister').modal('show');
  $('#pid').val(id);  
};
function submitRegi(){
    var pid   = $('#pid').val();
    var email = $('#email').val();
    var name  = $('#name').val();
  if(email!=''){
  var data = {'pid':pid, 'name':name, 'email':email};
  
  $.ajax({
      dataType    : 'json',
      data        : data,
      type        : 'POST',
      url         : '<?=base_url()?>cart/paymentsreceiving',
        success: function (response) {
          var amountCalc = response.amountCalc;
          var payto = response.payto;
          var barcode = response.barcode;
          console.log(response);
          modalOpen(amountCalc, payto, barcode);      
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log("Data Didn't Found");
        }


    });
}
};
function modalOpen(amountCalc, payto, barcode){
  $('#myModal').modal('show');
  $('#amountCalc').text(amountCalc)
  $('#barcode').html(barcode);
  $('#payBox').val(payto);
}
</script>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pay using Bicoin</h4>
      </div>
      <div class="modal-body">
        <div id="payAmt"><b>Amount Due: <i id='amountCalc'></i> BTC</b><br>
  Remit payment to the below address to complete your order. <br>
  <div id="messages"></div>
  <div id="barcode"></div>
  <input type="text" class="form-control" readonly="" onclick="this.select();" value="" id="payBox">
  </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ergister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Register For Get Key</h4>
      </div>
      <div class="modal-body">
      <input type="name" class="form-control" value="" id="name" placeholder="Your Name"><br>
      <input type="email" class="form-control" value="" id="email" placeholder="Your Email">
      <input type="hidden" id="pid">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="submitRegi()" id="submitRegi" class="btn btn-default" data-dismiss="modal">Submit</button>
      </div>
    </div>
  </div>
</div>