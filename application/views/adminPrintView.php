<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Saint Joseph's High School & College, Dharenda | Silver Jubilee Registration" />
  <meta name="author" content="JDGomes" />
  <meta name="keywords" content="SJHSC Jubilee Registration" />

  <title>View & Print</title>
  <link rel="icon" href="<?=base_url()?>resources/icons/school_logo_icon.png">
  
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
      <div><!-- DO NOT REMOVE THIS EMPTY DIV; LOGOUT BUTTON WILL FALLBACK TO LEFT SIDE--></div>
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
            <?php echo anchor('AdminController/PrintApplicants', '<i class="menu-icon fa fa-print"></i><span class="menu-title">View & Print</span>', 'class="nav-link"');?>
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
                  <h4 class="card-title">Filter Data</h4>  
                  
                      <div class="form-group row">
                          <label class="col-sm-1 col-form-label">Batch</label>
                          <div class="col-sm-2">
                            <select class="form-control form-control-sm" id="batch" name="batch">
                              <option disable selected>Choose Value</option>
                              <?php foreach ($batches as $batch):?>
                              <?php echo '<option value="'.$batch->batch.'">'.$batch->batch.'</option>';?>
                              <?php endforeach;?>
                            </select>
                          </div>
                          <label class="col-sm-1 col-form-label">Status</label>
                          <div class="col-sm-2">
                            <select class="form-control form-control-sm" id="status" name="status">
                              <option selected>valid</option>
                              <option>invalid</option>
                            </select>
                          </div>
                          <script>
                            function getuserdata(){ 
                              let batch = document.getElementById('batch').value;
                              let status = document.getElementById('status').value;
                              document.location = "<?= base_url()?>"+"AdminController/PrintApplicants/"+batch+"/"+status;
                            }
                          </script>
                          <div class="col-sm-1"><button class="btn btn-success mr-2" onclick="getuserdata()">View</button></div>
                      </div>
                </div>
              </div>
            </div>
          </div>
          
          


          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="form-group row col-sm-12">
                    <div class="col-sm-4"><h4 class="card-title">User Info</h4></div>
                    <div class="col-sm-3"><h4 class="card-title">Batch: <?=$selectedBatch?></h4></div>
                    <div class="col-sm-3"><h4 class="card-title">Status: <?=$selectedStatus?></h4></div>
                    
                    <script>
                      function pdf(){ 
                        let batch = document.getElementById('batch').value;
                        let status = document.getElementById('status').value;
                        document.location = "<?= base_url()?>"+"AdminController/print_pdf_list/"+"<?=$selectedBatch?>"+"/"+"<?=$selectedStatus?>";
                      }
                    </script>
                    
                    <div class="col-sm-2"><button class="btn btn-success mr-2" onclick="pdf()">Print</button></div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th width="5%">Reg. Id</th>
                          <th width="10%">Name</th>
                          <th width="10%">Father's Name</th>
                          <th width="10%">Mother's Name</th>
                          <th width="5%">Gender</th>
                          <th width="6%">Marital Status</th>
                          <th width="10%">Occupation</th>
                          <th width="10%">Designation</th>
                          <th width="10%">Contact</th>
                          <th width="4%">Spouse</th>
                          <th width="4%">Child</th>
                          <th width="4%">Other</th>
                          <th width="6%">Amount Payable</th>
                          <th width="6%">Amount Paid</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($table)): ?>
                          <?php foreach($table as $row):?>
                            <tr> 
                              <td width="5%"><?=$row->regid?></td>
                              <td width="10%"><?=$row->name?></td>
                              <td width="10%"><?=$row->father?></td>
                              <td width="10%"><?=$row->mother?></td>
                              <td width="5%"><?=$row->gender?></td>
                              <td width="6%"><?=$row->mstat?></td>
                              <td width="10%"><?=$row->occupation?></td>
                              <td width="10%"><?=$row->designation?></td>
                              <td width="10%"><?=$row->contact?></td>
                              <td width="4%"><?=$row->spouse_count?></td>
                              <td width="4%"><?=$row->child_count?></td>
                              <td width="4%"><?=$row->other_count?></td>
                              <td width="6%"><?=$row->total_amount?></td>
                              <td width="6%"><?=$row->paid_amount?></td>
                            </tr>
                          <?php endforeach;?>   
                        <?php endif;?>
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