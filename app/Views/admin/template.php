<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets')?>/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets')?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets')?>/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/alertify.min.css')?>">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap4-datetimepicker@5.2.3/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets')?>/plugins/summernote/summernote-bs4.min.css">
 
<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css"> -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
    

      <!-- Messages Dropdown Menu -->
     
      <!-- Notifications Dropdown Menu -->
     
      <li class="nav-item">
        <a href="<?= base_url('admin/logout')?>">Logout</a>
       <!--  <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a> -->
      </li>
      <li></li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?= session()->get('username'); ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
     <!--  <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
              <a href="#" class="nav-link">
                <!-- <i class="nav-icon fa fa-calendar"></i> -->
                <span style="font-size: 20px !important"> </span>
                <p>
                  
                  Slider
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/slider')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Slider List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/slider/create')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create Slider</p>
                  </a>
                </li>
              
             </ul>
          </li>
         
          
            <li class="nav-item">
            <a href="<?php echo base_url('admin/config');?>" class="nav-link">
              <!--<i class="nav-icon fas fa-cog"></i>-->
              <p>
                Settings & About us
                
              </p>
            </a>
          </li>

          <li class="nav-item">
              <a href="#" class="nav-link">
                <!-- <i class="nav-icon fa fa-calendar"></i> -->
                <span style="font-size: 20px !important"> </span>
                <p>
                  
                  Services
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/services')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Services List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/services/create')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Create Services</p>
                  </a>
                </li>
              
             </ul>
          </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <!-- <i class="nav-icon fa fa-calendar"></i> -->
                <span style="font-size: 20px !important"> </span>
                <p>
                  
                  Posts
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/posts')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Posts List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/posts/create')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Create Post</p>
                  </a>
                </li>
              
             </ul>
          </li>
<!--  <li class="nav-item">
              <a href="#" class="nav-link">
               
                <span style="font-size: 20px !important"> </span>
                <p>
                  
                  Past Event
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/event')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Event List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/event/create')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create Event</p>
                  </a>
                </li>
              
             </ul> -->
          </li>

               <li class="nav-item">
              <a href="#" class="nav-link">
              <!--  <span style="font-size: 20px !important"><strong>TT </strong></span> -->
                <p>
                  
                  Team
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/team')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Team List</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="<?= base_url('admin/team/create')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create Team</p>
                  </a>
                </li> -->
              
             </ul>
          </li>
    
               <li class="nav-item">
	            <a href="#" class="nav-link">
	            <!--  <span style="font-size: 20px !important"><strong>TT </strong></span> -->
	              <p>
	              	
	                Testimonials
	                <i class="right fas fa-angle-left"></i>
	              </p>
	            </a>
	            <ul class="nav nav-treeview">
	              <li class="nav-item">
	                <a href="<?= base_url('admin/testimonials')?>" class="nav-link">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Testimonials List</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="<?= base_url('admin/testimonials/create')?>" class="nav-link">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Create Testimonials</p>
	                </a>
	              </li>
	            
	           </ul>
          </li>
        <!--    <li class="nav-item">
            <a href="<?php echo base_url('admin/team');?>" class="nav-link">
            
            	<span style="font-size: 20px !important"><strong>TM </strong></span>
              <p>

                Team
                
              </p>
            </a>
          </li> -->
      
          <li class="nav-item">
            <a href="<?php echo base_url('admin/privacy-policy');?>" class="nav-link">
              
              <p>
               Privacy Policy
                
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?php echo base_url('admin/term-conditions');?>" class="nav-link">
             
              <p>
               Term And condtions
                
              </p>
            </a>
          </li>
      
          <li class="nav-item">
              <a href="#" class="nav-link">
               <!--<i class="nav-icon far fa-image"></i>-->
                <p>
                  
                  Gallery
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/gallery');?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Image Gallery</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/video-gallery');?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Video Gallery</p>
                  </a>
                </li>
              
             </ul>
          </li>
         
          <li class="nav-item">
            <a href="<?= base_url('admin/trainers-and-studio');?>" class="nav-link">
             
              <p>
                Trainers and studio
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?= base_url('admin/user-list');?>" class="nav-link">
             
              <p>
                User List
              </p>
            </a>
          </li>

           <li class="nav-item">
	            <a href="#" class="nav-link">
	             
	              <p>
	              	
	                Client
	                <i class="right fas fa-angle-left"></i>
	              </p>
	            </a>
	            <ul class="nav nav-treeview">
	              <li class="nav-item">
	                <a href="<?= base_url('admin/client')?>" class="nav-link">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Client List</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="<?= base_url('admin/client/create')?>" class="nav-link">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Create Client</p>
	                </a>

	              </li>
	            
	           </ul>
          </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <!--   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fixed Layout</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Fixed Layout</li>
            </ol>
          </div>
        </div>
      </div>
    </section> -->

    <!-- Main content -->
    <section class="content" style="padding-top: 30px;">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              
              <div class="card-body">
               <?= $this->renderSection('content') ?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
               <?php
              
               ?>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; <?= date('Y')?> <a href="https://triopodtechnology.com/">ATriopod Technology</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets')?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets')?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets')?>/dist/js/adminlte.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script src="<?php echo base_url('assets/js/alertify.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="../../dist/js/demo.js"></script>-->
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap4-datetimepicker@5.2.3/build/js/bootstrap-datetimepicker.min.js"></script>
 <?= $this->renderSection('scripts') ?>
</body>
</html>
