<nav class="navbar transparent navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=base_url();?>">DOS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <?php foreach ($catShow as $catview) {
                echo '<li><a href="'.base_url().'home/catshow/'.$catview['cat_id'].'">'.$catview['cat_name'].'</a></li>';
              } ?>
      </ul>
</div>
</div>
</nav>
<!--/.navbar -->