<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>vendor/StarAdmin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>vendor/StarAdmin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url();?>vendor/StarAdmin/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>vendor/StarAdmin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url();?>vendor/StarAdmin/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div><!-- DO NO REMOVE THIS EMPTY DIV; LOGOUT BUTTON WILL FALLBACK TO LEFT SIDE--></div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item"><span class="profile-text">Hello, <?php echo $this->session->userdata('username');?>!</span></li>
          <li class="nav-item dropdown"><span style="color:red"><?php echo anchor('AdminController/logout', 'Logout', 'style="color:red"');?></span></li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <?php echo anchor('AdminController/ValidateApplicants', '<i class="menu-icon fa fa-check-square"></i><span class="menu-title">Validate Applicants</span>', 'class="nav-link"');?>
          </li>
          <li class="nav-item">
            <?php echo anchor('AdminController/PrintApplicants', '<i class="menu-icon fa fa-print"></i><span class="menu-title">Print</span>', 'class="nav-link"');?>
          </li>
          <li class="nav-item">
            <?php echo anchor('AdminController/addRepresentative', '<i class="menu-icon fa fa-plus-square"></i><span class="menu-title">Add Batch & Representative</span>', 'class="nav-link"');?>
          </li>
          <li class="nav-item">
            <?php echo anchor('AdminController/addModerator', '<i class="menu-icon fa fa-user"></i><span class="menu-title">Add Moderator</span>', 'class="nav-link"');?>
          </li>
          <li class="nav-item">
            <?php echo anchor('AdminController/changeBKash', '<i class="menu-icon fa fa-edit"></i><span class="menu-title">Add/Update bKash Number</span>', 'class="nav-link"');?>
          </li>
          <li class="nav-item">
            <?php echo anchor('AdminController/resetPassword', '<i class="menu-icon fa fa-unlock-alt"></i><span class="menu-title">Reset Password</span>', 'class="nav-link"');?>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card card-gradient-2">
                <div class="card-body">
                    <h4 class="card-title">Reset Password</h4>  
                    <?php echo form_open('AdminController/resetPassword', ['class'=>'form-sample']); ?>
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Old Password</label>
                            <div class="col-sm-4">
                                <?php echo form_error('password'); ?>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-4">
                                <?php echo form_error('npass'); ?>
                                <input type="password" class="form-control" name="npass">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-4">
                                <?php echo form_error('cpass'); ?>
                                <input type="password" class="form-control" name="cpass">
                            </div>
                        </div>
                            
                        <div class="col-sm-1"><button type="submit" class="btn btn-success mr-2">Save</button></div>
                    <?php echo form_close(); ?>
                    <?=(isset($status))?$status:''?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- plugins:js -->
  <script src="<?php echo base_url();?>vendor/StarAdmin/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url();?>vendor/StarAdmin/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>vendor/StarAdmin/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>vendor/StarAdmin/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url();?>vendor/StarAdmin/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>