<!DOCTYPE html>
<html>
<head>
    <title>GP CMS Home</title>
    <script src="<?=base_url()?>/js/jquery-1.10.2.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?=base_url()?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/css/site.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="<?=base_url()?>/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="<?=base_url()?>/js/bootstrap.min.js"></script>
</head>
<body>
<nav id="w0" class="navbar-inverse navbar-fixed-top navbar" role="navigation"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse"><span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span></button><a class="navbar-brand" href="#"><img src="<?=base_url()?>/images/logo.png"></a></div><div id="w0-collapse" class="collapse navbar-collapse"><ul id="w1" class="navbar-nav navbar-right nav">
</nav>
<div class="site-index">
<div id="price" style="z-index:1;position:absolute; left:40%;"></div>
    <div class="jumbotron">

        <h1>Welcome <?php echo $main_content[name]; ?></h1>

        <p class="lead">You have successfully Login.</p>

        <p><a class="btn btn-lg btn-success" id="btn-show-modal" data-toggle="modal" data-target="#myModal" href="#">Give Order</a></p>
    </div>

    <div class="body-content">

        <div class="row menu">
            <div class="col-lg-1"></div>
            <div class="col-lg-3 menu-border">
                <h2>Burger</h2>
                <p><img src="<?=base_url()?>/images/burger.jpg" width="250" height="200"></p>
                <p><a class="btn btn-default pull-left" id="select" onclick="select(45);" href="#">Select &raquo;</a></p><p><a class="btn btn-default pull-right" href="#">Price: 45tk.</a></p>
            </div>
            <div class="col-lg-3 menu-border">
                <h2>Singara</h2>
                <p><img src="<?=base_url()?>/images/singara.jpg" width="250" height="200"></p>
               <p><a class="btn btn-default pull-left" id="select" onclick="select(15);" href="#">Select &raquo;</a></p><p><a class="btn btn-default pull-right" href="#">Price: 15tk.</a></p>
            </div>
            <div class="col-lg-3 menu-border">
                <h2>Samosa</h2>
                <p><img src="<?=base_url()?>/images/samosa.jpg" width="250" height="200"></p>
                <p><a class="btn btn-default pull-left" id="select" href="#" onclick="select(15);">Select &raquo;</a></p><p><a class="btn btn-default pull-right" href="#">Price: 15tk.</a></p>
            </div>
        </div>
    </div>
</div>
<div class="chart">
<button><i class="glyphicon glyphicon-tasks"></i></button>
<div id="priceUP">
                    <div class="row">
                        <div class="col-sm-4">Menu Name</div>
                        <div class="col-sm-4">Menu Quentity</div>
                        <div class="col-sm-4">Menu Price</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">Burger</div>
                        <div class="col-sm-4">2 pcs</div>
                        <div class="col-sm-4" id="pricebottom">90tk.</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">Singara</div>
                        <div class="col-sm-4">2 pcs</div>
                        <div class="col-sm-4" id="pricebottom">30tk.</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">Samosa</div>
                        <div class="col-sm-4">2 pcs</div>
                        <div class="col-sm-4" id="pricebottom">30tk.</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4"><strong>Tottal Price</i></strong></div>
                        <div class="col-sm-4"><strong>= 150tk.</strong></div>
                    </div>
</div>
<script>
$( "button" ).click(function() {
$( "#priceUP" ).slideToggle( "slow" );
});
$('#select').click(function(e) {
        var offset = $(this).offset();
        var left = (e.clientX - offset.left)+180;
        var top = (e.clientY - offset.top);
        $("div#price").animate({"left": left, "top": top, "position": "absolute", "z-index": "999", "font-size": "26"});
      });
function select(price){
        var price=  price+'tk.';
        $("div#price").show();
        $("div#price").html(price);
        $("div#price").animate({left: '94%', top:'85%'});
        $("div#price").hide(1);
        //$("div#price").animate({left: '40%', bottom:'250px'});
        $("div#pricebottom").slideToggle();
        $("div#pricebottom").slideToggle();
        }

</script>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Your Order Details</h4>
      </div>
      <div class="modal-body">
        
                    <div class="row lead">
                        <div class="col-sm-4">Menu Name</div>
                        <div class="col-sm-4">Menu Quentity</div>
                        <div class="col-sm-4">Menu Price</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">Burger</div>
                        <div class="col-sm-4">2 pcs</div>
                        <div class="col-sm-4">90tk.</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">Singara</div>
                        <div class="col-sm-4">2 pcs</div>
                        <div class="col-sm-4">30tk.</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">Samosa</div>
                        <div class="col-sm-4">2 pcs</div>
                        <div class="col-sm-4">30tk.</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4"><strong>Tottal Price  <i class="glyphicon glyphicon-arrow-right"></i></strong></div>
                        <div class="col-sm-4 "><strong>= 150tk.</strong></div>
                    </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Confirm Order</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>