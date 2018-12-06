<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>vendor/StarAdmin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
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
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
          <img src="<?php echo base_url();?>vendor/logo.png" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-xl-inline-block">
              <span class="profile-text">Hello, <?php echo $this->session->userdata('username');?>!</span>
              <span style="color:red"><?php echo anchor('AdminController/logout', 'Logout', 'style="color:red"');?></span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <?php echo anchor('AdminController/ValidateApplicants', '<i class="menu-icon fa-print"></i><span class="menu-title">Validate Applicants</span>', 'class="nav-link"');?>
          </li>
          <li class="nav-item">
            <?php echo anchor('AdminController/PrintApplicants', '<i class="menu-icon fa-print"></i><span class="menu-title">Print</span>', 'class="nav-link"');?>
          </li>
          <li class="nav-item">
            <?php echo anchor('AdminController/addRepresentative', '<i class="menu-icon fa-print"></i><span class="menu-title">Add Batch & Representative</span>', 'class="nav-link"');?>
          </li>          
          <li class="nav-item">
            <?php echo anchor('AdminController/addModerator', '<i class="menu-icon fa-print"></i><span class="menu-title">Add Moderator</span>', 'class="nav-link"');?>
          </li>
          <li class="nav-item">
            <?php echo anchor('AdminController/changeBKash', '<i class="menu-icon fa-print"></i><span class="menu-title">Add/Update bKash Number</span>', 'class="nav-link"');?>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <h4 class="card-title">Add Batch Representative</h4>  
        <?php echo form_open('AdminController/addRepresentative'); ?>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Batch Year</label>
                <div class="col-sm-3">
                <?php echo form_error('batch'); ?>
                <input type="number" class="form-control" name="batch" min=1969 max=2019>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Representative Name</label>
                <div class="col-sm-3">
                <?php echo form_error('rep_name'); ?>
                <input type="text" class="form-control" name="rep_name" placeholder="not required">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contact</label>
                <div class="col-sm-3">
                <?php echo form_error('rep_phone'); ?>
                <input type="text" class="form-control" name="rep_phone" placeholder="not required">
                </div>
            </div>
            <button type="submit" class="btn btn-success mr-2">Save</button>
        <?php echo form_close(); ?>
            <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Representative List</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                          Batch
                          </th>
                          <th>
                            Representative Name
                          </th>
                          <th>
                            Contact
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($representatives as $rep):?>
                        <tr> 
                        <td class="font-weight-medium"><?php echo $rep->batch?></td>
                        <td class="font-weight-medium"><?php echo $rep->rep_name?></td>
                        <td class="font-weight-medium"><?php echo $rep->rep_phone?></td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
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