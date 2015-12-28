<?=$header?>
<?=$sitenav?>
<!--Page Content-->
    <div class="page-content">
    
      <!--Breadcrumbs-->
      <ol class="breadcrumb">
        <li><a href="index-2.html">Home</a></li>
        <li>Shopping cart</li>
      </ol><!--Breadcrumbs Close-->
      
      <!--Shopping Cart-->
      <section class="shopping-cart">
      	<div class="container">
        	<div class="row">
          
          	<!--Items List-->
          	<div class="col-lg-9 col-md-9">
            	<h2 class="title">Shopping cart</h2>
            	<table class="items-list">
              	<tr>
                	<th>&nbsp;</th>
                  <th>Product name</th>
                  <th>Product price</th>
                  <!-- <th>Quantity</th> -->
                  <th>Total</th>
                </tr>
                <!--Item-->
                <tr class="item first">
                  <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items): ?>
                
                	<td class="thumb"><a href="#"><img src="<?=base_url().$items['img']?>" alt="Lorem ipsum"/></a></td>
                  <td class="name"><a href="#"><?=$items['name']?></a></td>
                  <td class="price"><?=$items['price']?> $</td>
                  <!-- <td class="qnt-count">
                    <a class="incr-btn" href="#">-</a>
                    <input class="quantity form-control" type="text" value="2">
                    <a class="incr-btn" href="#">+</a>
                  </td> -->
                  <input type="hidden" id="rowid" name="rowid" value="<?=$items['rowid']?>">
                  <td class="total"><?php echo $this->cart->format_number($this->cart->total()); ?> $</td>
                  <td class="delete"><i class="icon-delete"></i></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                <!--Item-->
              </table>
            </div>
            
            <!--Sidebar-->
            <div class="col-lg-3 col-md-3">
            	<h3>Cart totals</h3>
              <form class="cart-sidebar" method="post">
              	<div class="cart-totals">
                	<table>
                  	<tr>
                    	<td>Cart subtotal</td>
                      <td class="total align-r">2715,00 $</td>
                    </tr>
                  	<tr class="devider">
                    	<td>Shipping</td>
                      <td class="align-r">Free shipping</td>
                    </tr>
                  	<tr>
                    	<td>Order total</td>
                      <td class="total align-r">2715,00 $</td>
                    </tr>
                  </table>

                  <h3>Have a coupon?</h3>
                  <div class="coupon">
                    <div class="form-group">
                      <label class="sr-only" for="coupon-code">Enter coupon code</label>
                      <input type="text" class="form-control" id="coupon-code" name="coupon-code" placeholder="Enter coupon code">
                    </div>
                    <input type="submit" class="btn btn-primary btn-sm btn-block" name="apply-coupon" value="Apply coupon">
                  </div>

                  <input type="submit" class="btn btn-primary btn-sm btn-block" name="update-cart" value="Update shopping cart">
                  <a href="checkout.html" class="btn btn-black btn-block">Proceed to checkout</a>
                </div>
                
                <a class="panel-toggle" href="#calc-shipping"><h3>Calculate shipping</h3></a>
                <div class="hidden-panel calc-shipping" id="calc-shipping">
                	<div class="form-group">
                  	<div class="select-style">
                      <select name="country">
                        <option>Australia</option>
                        <option>Belgium</option>
                        <option>Germany</option>
                        <option>United Kingdom</option>
                        <option>Switzerland</option>
                        <option>USA</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="state">State/ province</label>
                    <input type="text" class="form-control" id="state" name="state" placeholder="State/ province">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="postcode">Postcode/ ZIP</label>
                    <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode/ ZIP">
                  </div>
                  <input type="submit" class="btn btn-primary btn-sm btn-block" name="update-totals" value="Update totals">
                </div>
              </form>
            </div>
          </div>
        </div>
      </section><!--Shopping Cart Close-->
      
   </div><!--Page Content Close-->
    <?=$footer?>
    <script type="text/javascript">
   function cartitemdelet(rowid){
      if(rowid!=''){
          var data = {'rowid':rowid, 'qty':};
          $.ajax({
              dataType    : 'json',
              data        : data,
              type        : 'POST',
              url         : '<?=base_url()?>cart/delete',
                success: function (response) {
                  console.log(response);        
                },
                error: function(jqXHR, textStatus, errorThrown) {
                   console.log("Data Didn't Found");
                }


            });
        }
    }
    </script>