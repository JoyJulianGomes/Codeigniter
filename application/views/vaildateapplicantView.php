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
            <?php echo anchor('AdminController/Print', '<i class="menu-icon fa-print"></i><span class="menu-title">Print</span>', 'class="nav-link"');?>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <h4 class="card-title">Validate User</h4>  
        <?php echo form_open('AdminController/ValidateApplicants'); ?>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Registration ID</label>
                          <div class="col-sm-3">
                            <?php echo form_error('regid'); ?>
                            <input type="number" class="form-control" name="regid" id="exampleInputEmail2" placeholder="Regsitartion ID">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-2 col-form-label">Transaction ID</label>
                          <div class="col-sm-3">
                          <?php echo form_error('trxID'); ?>
                            <input type="text" class="form-control" name="trxID" id="exampleInputPassword2" placeholder="Transaction ID">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Amount</label>
                          <div class="col-sm-3">
                          <?php echo form_error('amount'); ?>
                            <input type="number" min="0" class="form-control" name="amount" id="exampleInputEmail2" placeholder="Amount">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Save</button>
            <?php echo form_close(); ?>
            <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Validated Users</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            Registration ID
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Contact
                          </th>
                          <th>
                          Batch
                          </th>
                          <th>
                            Payable
                          </th>
                          <th>
                            Paid
                          </th>
                          <th>
                            Status
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      
                        <tr> 
                        <td class="font-weight-medium"><?php echo $userinfo->regid?></td>
                          <td class="font-weight-medium"><?php echo $userinfo->name?></td>
                          <td class="font-weight-medium"><?php echo $userinfo->contact?></td>
                          <td class="font-weight-medium"><?php echo $userinfo->batch?></td>
                          <td class="font-weight-medium"><?php echo $userinfo->total_amount?></td>
                          <td class="font-weight-medium"><?php echo $userinfo->paid_amount?></td>
                          <td class="font-weight-medium"><?php if($userinfo->status===null){echo 'empty';}else{echo ($userinfo->status)?'valid':'invalid';}?></td>
                        </tr>
                       
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