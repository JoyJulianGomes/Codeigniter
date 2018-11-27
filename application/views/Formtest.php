<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="Colorlib Templates" />
    <meta name="author" content="Colorlib" />
    <meta name="keywords" content="Colorlib Templates" />

    <!-- Title Page -->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS -->
    <link
      href="<?php echo base_url();?>vendor/mdi-font/css/material-design-iconic-font.min.css"
      rel="stylesheet"
      media="all"
    />
    <link
      href="<?php echo base_url();?>vendor/font-awesome-4.7/css/font-awesome.min.css"
      rel="stylesheet"
      media="all"
    />
    <!-- Font special for pages -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
      rel="stylesheet"
    />

    <!-- Vendor CSS -->
    <link href="<?php echo base_url();?>vendor/select2/select2.min.css" rel="stylesheet" media="all" />
    <link
      href="vendor/datepicker/daterangepicker.css"
      rel="stylesheet"
      media="all"
    />

    <!-- Main CSS -->
    <link href="<?php echo base_url();?>css/main.css" rel="stylesheet" media="all" />

    <!-- Table CSS-->
    <link href="<?php echo base_url();?>css/table.css" rel="stylesheet" media="all" />
    
    <link rel="stylesheet" href="<?php echo base_url();?>css/filepicker.css" />
  </head>

  <body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
      <div class="wrapper wrapper--w790">
        <div class="card card-5">
          <div class="card-heading">
            <h2 class="title">
              St. Joseph's High School & College Silver Jubilee Event
              Registration
            </h2>
          </div>

          <?php echo form_open('formtest/index2'); ?>
            <div class="card-body">
              <div style="margin:20px 0px">
                <h2 class="title" style="color:black">Personal Info</h2>
              </div>
              <div class="form-row">
                <div class="name">Batch</div>
                <div class="value">
                  <div class="input-group">
                    <div class="rs-select2 js-select-simple select--no-search">
                      <select name="Batch">
                        <option>Choose Option</option>
                      </select>
                      <div class="select-dropdown"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-row m-b-55">
                <div class="name">Name</div>
                <div class="value">
                  <div class="row row-space">
                    <div class="col-2">
                      <div class="input-group-desc">
                        <?php echo form_error('first_name'); ?>
                        <input
                          class="input--style-5"
                          type="text"
                          name="first_name"
                          value="<?php echo set_value('first_name'); ?>"
                        />
                        <label class="label--desc">first name</label>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="input-group-desc">
                        <input
                          class="input--style-5"
                          type="text"
                          name="last_name"
                        />
                        <label class="label--desc">last name</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="name">Photo:</div>
                <div class="value">
                  <div class="input-group" style="display:flex">
                    <span class="input-group-btn">
                      <span class="btn btn--radius-2 btn--blue btn-file">
                        Browse <input name="photo" type="file" single />
                      </span>
                    </span>
                    <input type="text" class="input--style-5" readonly />
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="name">Father's Name:</div>
                <div class="value">
                  <div class="input-group">
                    <input class="input--style-5" type="text" name="company" />
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="name">Mother's Name:</div>
                <div class="value">
                  <div class="input-group">
                    <input class="input--style-5" type="text" name="mother" />
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="name">
                  <label class="label label--block">Gender</label>
                </div>

                <div class="p-t-15">
                  <label class="radio-container m-r-55"
                    >Male
                    <input type="radio" checked="checked" name="gender" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="radio-container"
                    >Female <input type="radio" name="gender" />
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="form-row">
                <div class="name">
                  <label class="label label--block">Marital Status</label>
                </div>

                <div class="p-t-15">
                  <label class="radio-container m-r-55"
                    >Married
                    <input type="radio" checked="checked" name="mstat" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="radio-container"
                    >Unmarried <input type="radio" name="mstat" />
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="form-row">
                <div class="name">Occupation</div>
                <div class="value">
                  <div class="input-group">
                    <input
                      class="input--style-5"
                      type="text"
                      name="occupation"
                    />
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="name">Designation</div>
                <div class="value">
                  <div class="input-group">
                    <input class="input--style-5" type="text" name="design" />
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="name">Contact Number:</div>
                <div class="value">
                  <div class="input-group">
                    <input
                      class="input--style-5"
                      type="number"
                      name="contact"
                    />
                  </div>
                </div>
              </div>
              <div style="margin:20px 0px">
                <h2 class="title" style="color:black">Participant Names</h2>
              </div>
              <div class="container">
                <div class="form-row row row-space">
                  <div class="col-4"><div class="name">Name</div></div>
                  <div class="col-4"><div class="name">Relation</div></div>
                  <div class="col-4"><div class="name">Age</div></div>
                </div>

                <div class="table-form-row table-row table-row-space">
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="text" name="pname-1" />
                  </div>
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="text" name="prel-1" />
                  </div>
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="number" name="page-1" />
                  </div>
                </div>
                <div class="table-form-row table-row table-row-space">
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="text" name="pname-2" />
                  </div>
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="text" name="prel-2" />
                  </div>
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="number" name="page-2" />
                  </div>
                </div>
                <div class="table-form-row table-row table-row-space">
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="text" name="pname-3" />
                  </div>
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="text" name="prel-3" />
                  </div>
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="number" name="page-3" />
                  </div>
                </div>
                <div class="table-form-row table-row table-row-space">
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="text" name="pname-4" />
                  </div>
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="text" name="prel-4" />
                  </div>
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="number" name="page-4" />
                  </div>
                </div>
                <div class="table-form-row table-row table-row-space">
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="text" name="pname-5" />
                  </div>
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="text" name="prel-5" />
                  </div>
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="number" name="page-5" />
                  </div>
                </div>
                
            </div>
            
            <div>
              <button class="btn btn--radius-2 btn--red" type="submit">
                Register
              </button>
            </div>
            <?php echo form_close(); ?>
        </div>
      </div>
    </div>

    <!-- Jquery JS -->
    <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS -->
    <script src="<?php echo base_url();?>vendor/select2/select2.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url();?>js/filepicker.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url();?>js/global.js"></script>
  </body>
</html>
