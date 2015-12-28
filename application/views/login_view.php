<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<title>Admin Area</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
     <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=base_url()?>admin_assist/bootstrap/css/bootstrap.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    body {
  background: url(images/background.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    font-family: "Telenor";
    font-weight: normal;
  }
h1, h2, h3{
  font-family: "Together";
}

/* Site Login Start */

  .form-control {
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    @include box-sizing(border-box);

    &:focus {
      z-index: 2;
    }
  }


form[role=login] {
  color: #5d5d5d;
  background: #f2f2f2;
  padding: 26px;
  border-radius: 10px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
}
  form[role=login] img {
    display: block;
    margin: 0 auto;
    margin-bottom: 35px;
  }
  form[role=login] input,
  form[role=login] button {
    font-size: 18px;
    margin: 16px 0;
  }
  form[role=login] > div {
    text-align: center;
  }
  
.form-links {
  text-align: center;
  margin-top: 1em;
  margin-bottom: 50px;
}
    </style>
</head>
<body>
<div class="container">
  
  <div class="row" id="pwd-container" style="margin-top: 200px;">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
      <?php $attributes = array('role' => 'login'); ?>
     <?php echo form_open('verifylogin', $attributes); ?>
     <!-- <img src="<?php echo base_url();?>/images/logo-black.png" class="img-responsive" alt="" /> -->
     <?php echo validation_errors(); ?>
     <input type="name" size="20" id="username" name="username" placeholder="username" class="form-control input-lg"/>

     <input type="password" size="20" id="passowrd" name="password" placeholder="password" class="form-control input-lg"/>

     <input type="submit" value="Login" class="btn btn-lg btn-primary btn-block"/>
   </form>
           
      </section>  
      </div>
      
      <div class="col-md-4"></div>
      

  </div>
    
</div>
</body>
</html>