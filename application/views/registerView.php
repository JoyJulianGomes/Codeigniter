<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="Saint Joseph's High School & College, Dharenda | Silver Jubilee Registration" />
    <meta name="author" content="JDGomes" />
    <meta name="keywords" content="SJHSC Jubilee Registration" />

    <!-- Title Page -->
    <title>Registration</title>

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

          <?php echo form_open_multipart('register/index'); ?>
            <div class="card-body">
              <div style="margin:20px 0px">
                <h2 class="title" style="color:black">Personal Info</h2>
              </div>
              <div class="form-row">
                <div class="name">Batch</div>
                <div class="value">
                  <div class="input-group">
                    <div class="rs-select2 js-select-simple select--no-search">
                    <?php echo form_error('batch'); ?>  
                    <select name="batch">
                        <option <?php echo ($given = set_value('batch'))?'value='.'"'.$given.'"':'value="" disable selected'; ?>> <?php echo ($given = set_value('batch'))?$given:"Choose Value"?></option>
                        <?php foreach ($Batch_Nb as $batch):?>
                        <?php echo '<option value="'.$batch->batch.'">'.$batch->batch.'</option>';?>
                        <?php endforeach;?>
                      </select>
                      <div class="select-dropdown"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="name">Name</div>
                <div class="value">
                  <div class="input-group">
                    <?php echo form_error('name'); ?>
                    <input
                      class="input--style-5"
                      type="text"
                      name="name"
                      value="<?php echo set_value('name'); ?>"
                    />
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="name">Photo:</div>
                <div class="value">
                  <div class="input-group" style="display:flex">
                    <span class="input-group-btn">
                      <span class="btn btn--radius-2 btn--blue btn-file">
                        Browse <input name="photo" type="file" single formtarget="<?php echo set_value('photo')?>"/>
                      </span>
                    </span>
                    <?php echo form_error('photo'); ?>
                    <input type="text" class="input--style-5" readonly />
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="name">Father's Name:</div>
                <div class="value">
                  <div class="input-group">
                    <?php echo form_error('father'); ?>
                    <input class="input--style-5" type="text" name="father" value="<?php echo set_value('father')?>"/>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="name">Mother's Name:</div>
                <div class="value">
                  <div class="input-group">
                  <?php echo form_error('mother'); ?>  
                  <input class="input--style-5" type="text" name="mother" value="<?php  echo set_value('mother')?>"/>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="name">
                  <label class="label label--block">Gender</label>
                </div>

                <div class="p-t-15">
                  <?php echo form_error('gender');?>
                  <label class="radio-container m-r-55"
                    >Male
                    <input type="radio" <?php echo (set_value('gender')=='male')?'checked="checked"':'' ?> name="gender" value="male"/>
                    <span class="checkmark"></span>
                  </label>
                  <label class="radio-container"
                    >Female <input type="radio" <?php echo (set_value('gender')=='female')?'checked="checked"':'' ?>name="gender" value="female" />
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="form-row">
                <div class="name">
                  <label class="label label--block">Marital Status</label>
                </div>

                <div class="p-t-15">
                  <?php echo form_error('mstat');?>
                  <label class="radio-container m-r-55"
                    >Married
                    <input type="radio" <?php echo (set_value('mstat')=='married')?'checked="checked"':'' ?> name="mstat" value="married"/>
                    <span class="checkmark"></span>
                  </label>
                  <label class="radio-container"
                    >Unmarried 
                    <input type="radio" <?php echo (set_value('mstat')=='unmarried')?'checked="checked"':'' ?> name="mstat" value="unmarried"/>
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="form-row">
                <div class="name">Occupation</div>
                <div class="value">
                  <div class="input-group">
                    <?php echo form_error('occupation'); ?>
                    <input
                      class="input--style-5"
                      type="text"
                      name="occupation"
                      value="<?php echo set_value('occupation')?>"
                    />
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="name">Designation</div>
                <div class="value">
                  <div class="input-group">
                    <?php echo form_error('designation'); ?>
                    <input class="input--style-5" type="text" name="designation" value="<?php  echo set_value('designation')?>"/>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="name">Contact Number:</div>
                <div class="value">
                  <div class="input-group">
                    <?php echo form_error('contact'); ?>
                    <input
                      class="input--style-5"
                      type="text"
                      name="contact"
                      value="<?php  echo set_value('contact')?>"
                    />
                  </div>
                </div>
              </div>
              <div style="margin:20px 0px">
                <h2 class="title" style="color:black">Participant Names</h2>
                <p style="text-align:center">Fees: Student = 500 BDT, Spouse = 800 BDT, Child = 300 BDT</p>
              </div>
              <div class="container">
                <div class="form-row row row-space">
                  <div class="col-4"><div class="name">Name</div></div>
                  <div class="col-4"><div class="name">Relation</div></div>
                  <div class="col-4"><div class="name">Age</div></div>
                </div>

                <div class="table-form-row table-row table-row-space">
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="text" name="pname-1" value="<?php echo set_value('pname-1')?>" />
                  </div>
                  <div class="table-input-group col-4">
                    <div class="rs-select2 js-select-simple select--no-search">
                        <select name="prel-1">
                          <option <?php echo ($given = set_value('prel-1'))?'value='.'"'.$given.'"':'value="" disable selected'; ?>> <?php echo ($given = set_value('prel-1'))?$given:"Choose Value"?></option>
                          <?php foreach ($guest_option as $item):?>
                              <?php echo '<option value="'.$item.'">'.$item.'</option>';?>
                          <?php endforeach;?>
                        </select>
                        <div class="select-dropdown"></div>
                      </div>
                  </div>
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="number" min="0" name="page-1" value="<?php echo set_value('page-1')?>"/>
                  </div>
                </div>

                <div class="table-form-row table-row table-row-space">
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="text" name="pname-2" value="<?php echo set_value('pname-2')?>" />
                  </div>
                  <div class="table-input-group col-4">
                    <div class="rs-select2 js-select-simple select--no-search">
                        <select name="prel-2">
                          <option <?php echo ($given = set_value('prel-2'))?'value='.'"'.$given.'"':'value="" disable selected'; ?>> <?php echo ($given = set_value('prel-2'))?$given:"Choose Value"?></option>
                          <?php foreach ($guest_option as $item):?>
                              <?php echo '<option value="'.$item.'">'.$item.'</option>';?>
                          <?php endforeach;?>
                        </select>
                        <div class="select-dropdown"></div>
                      </div>
                  </div>
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="number"  min="0" name="page-2" value="<?php echo set_value('page-2')?>" />
                  </div>
                </div>

                <div class="table-form-row table-row table-row-space">
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="text" name="pname-3" value="<?php echo set_value('pname-3')?>"/>
                  </div>
                  <div class="table-input-group col-4">
                      <div class="rs-select2 js-select-simple select--no-search">
                        <select name="prel-3">
                          <option <?php echo ($given = set_value('prel-3'))?'value='.'"'.$given.'"':'value="" disable selected'; ?>> <?php echo ($given = set_value('prel-3'))?$given:"Choose Value"?></option>
                          <?php foreach ($guest_option as $item):?>
                              <?php echo '<option value="'.$item.'">'.$item.'</option>';?>
                          <?php endforeach;?>
                        </select>
                        <div class="select-dropdown"></div>
                      </div>
                  </div>
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="number"  min="0" name="page-3" value="<?php echo set_value('page-3')?>"/>
                  </div>
                </div>

                <div class="table-form-row table-row table-row-space">
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="text" name="pname-4" value="<?php echo set_value('pname-4')?>" />
                  </div>
                  <div class="table-input-group col-4">
                      <div class="rs-select2 js-select-simple select--no-search">
                        <select name="prel-4">
                          <option <?php echo ($given = set_value('prel-4'))?'value='.'"'.$given.'"':'value="" disable selected'; ?>> <?php echo ($given = set_value('prel-4'))?$given:"Choose Value"?></option>
                          <?php foreach ($guest_option as $item):?>
                              <?php echo '<option value="'.$item.'">'.$item.'</option>';?>
                          <?php endforeach;?>
                        </select>
                        <div class="select-dropdown"></div>
                      </div>
                  </div>
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="number" min="0" name="page-4" value="<?php echo set_value('page-4')?>" />
                  </div>
                </div>

                <div class="table-form-row table-row table-row-space">
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="text" name="pname-5" value="<?php echo set_value('pname-5')?>"/>
                  </div>
                  <div class="table-input-group col-4">
                      <div class="rs-select2 js-select-simple select--no-search">
                        <select name="prel-5">
                          <option <?php echo ($given = set_value('prel-5'))?'value='.'"'.$given.'"':'value="" disable selected'; ?>> <?php echo ($given = set_value('prel-5'))?$given:"Choose Value"?></option>
                          <?php foreach ($guest_option as $item):?>
                              <?php echo '<option value="'.$item.'">'.$item.'</option>';?>
                          <?php endforeach;?>
                        </select>
                        <div class="select-dropdown"></div>
                      </div>
                  </div>
                  <div class="table-input-group col-4">
                    <input class="table-input--style-5" type="number" min="0" name="page-5" value="<?php echo set_value('page-5')?>" />
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
