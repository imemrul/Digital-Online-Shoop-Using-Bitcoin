      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="<?=base_url()?>admin" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>D</b>oS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>DOS</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?=base_url()?>admin_assist/dist/img/avatar.png" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?=$name?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?=base_url()?>admin_assist/dist/img/avatar.png" class="img-circle" alt="User Image">
                    <p>
                      <?=$name?> - <?=$role?>
                      <small><?=date('D M Y')?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <!-- <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div> -->
                    <div class="pull-right">
                      <a href="<?=base_url()?>admin/logout" class="btn btn-default btn-flat"><?=$this->lang->line('logout')?></a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-language"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?=base_url()?>admin_assist/dist/img/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?=$name?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="<?=base_url()?>admin"><i class="fa fa-link"></i> <span><?=$this->lang->line('home')?></span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span><?=$this->lang->line('categories')?></span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>admin/addCategories"><?=$this->lang->line('addcategories')?></a></li>
                <li><a href="<?=base_url()?>admin/viewCategories"><?=$this->lang->line('viewcategories')?></a></li>
                <li><a href="<?=base_url()?>admin/CategoriesManage"><?=$this->lang->line('mangaecat')?></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span><?=$this->lang->line('newproduct')?></span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>admin/addNewProduct"><?=$this->lang->line('addnewproduct')?></a></li>
                <li><a href="<?=base_url()?>admin/viewProduct"><?=$this->lang->line('viewproduct')?></a></li>
                <li><a href="<?=base_url()?>admin/productmanage"><?=$this->lang->line('manageproduct')?></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span><?=$this->lang->line('picturecategories')?></span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>admin/PictureCategories"><?=$this->lang->line('addpicturecat')?></a></li>
                <li><a href="<?=base_url()?>admin/viewPictureCategories"><?=$this->lang->line('viewpiccat')?></a></li>
                <li><a href="<?=base_url()?>admin/viewPictureCategories"><?=$this->lang->line('manageadcat')?></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span><?=$this->lang->line('newpicturead')?></span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>admin/addNewad"><?=$this->lang->line('addnewpicturead')?></a></li>
                <li><a href="<?=base_url()?>admin/adview"><?=$this->lang->line('viewwpicturead')?></a></li>
                <li><a href="<?=base_url()?>admin/adview"><?=$this->lang->line('managead')?></a></li>
              </ul>
            </li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?=$pageheader?>
            <small><?=$pagedescrip?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section>