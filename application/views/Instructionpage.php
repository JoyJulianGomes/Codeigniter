<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Payment Instruction</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
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
                    <h2 class="title">Information Recorded. Your Registration ID: <?php echo $reg_id;?></h2>
                </div>
                <div class="card-body">
                    <div style="margin:20px 0px">
                        <h2 class="title" style="color:black">Cost</h2>
                    </div>
                    <div class="form-row row row-space">
                        <div class="col-4"><div class="name">Participant</div></div>
                        <div class="col-4"><div class="name">Count</div></div>
                        <div class="col-4"><div class="name">Rate</div></div>
                        <div class="col-4"><div class="name">Fee</div></div>                
                    </div>
                    <div class="form-row row row-space">
                        <div class="col-4"><div class="name">Student</div></div>
                        <div class="col-4"><div class="name">1</div></div>
                        <div class="col-4"><div class="name">500</div></div>
                        <div class="col-4"><div class="name">500</div></div>                
                    </div>
                    <div class="form-row row row-space">
                        <div class="col-4"><div class="name">Spouse</div></div>
                        <div class="col-4"><div class="name"><?php echo $spouse_count?></div></div>
                        <div class="col-4"><div class="name">800</div></div>
                        <div class="col-4"><div class="name"><?php echo ($spouse_count * 800)?></div></div>                
                    </div>
                    <div class="form-row row row-space">
                        <div class="col-4"><div class="name">Children</div></div>
                        <div class="col-4"><div class="name"><?php echo $child_count?></div></div>
                        <div class="col-4"><div class="name">300</div></div>
                        <div class="col-4"><div class="name"><?php echo ($child_count * 300)?></div></div>                
                    </div>
                    <div class="form-row row row-space">
                        <div class="col-4"><div class="name"></div>Total</div>
                        <div class="col-4"><div class="name"></div></div>
                        <div class="col-4"><div class="name"></div></div>
                        <div class="col-4"><div class="name"><?php echo (500+($spouse_count*800)+($child_count*300))?></div></div>                
                    </div>
                    <div style="margin:20px 0px">
                        <h2 class="title" style="color:black">Payment Process</h2>
                    </div>
                        <p class="name">1. Send the amount to 
                            <?php foreach ($bkash as $value):?>
                                <?php echo $value->number.", ";?>
                            <?php endforeach;?> 
                            by bKash 
                        </p>
                        <p class="name">2. Send a SMS to the bKash number mentioning the trasaction ID in the following format:</p>                
                        <p class="name">Registration: <?php echo $reg_id;?> TrxID: BFH******</p>                
                        <p class="name">3. A confirmation SMS will be sent to your contact number</p>                
                </div>
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