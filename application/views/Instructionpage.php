<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Payment Instruction</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <!-- Title Page -->
    <title>Instruction</title>

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
      href="<?=base_url()?>vendor/datepicker/daterangepicker.css"
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
                    <h2 class="title">Information Recorded</h2>
                </div>
                <div class="card-body">
                    <div style="margin:20px 0px">
                        <h2 class="title" style="color:red">Your Registration ID: <?=$reg_id?></h2>
                    </div>
                    <div style="margin:20px 0px">
                        <h2 class="title" style="color:black">Cost</h2>
                    </div>
                    <table class="ins-table">
                        <thead>
                            <tr>
                                <th>Participant</th>
                                <th>Count</th>
                                <th>Rate</th>
                                <th>Fee</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Student</td>
                                <td><?=$student['count']?></td>
                                <td><?=$student['rate']?> </td>
                                <td><?=$student['fee']?>  </td>
                            </tr>
                            <tr>
                                <td>Spouse</td>
                                <td><?=$spouse['count']?></td>
                                <td><?=$spouse['rate']?> </td>
                                <td><?=$spouse['fee']?>  </td>
                            </tr>
                            <tr>
                                <td>Children<br>(age below 3 is free)</td>
                                <td><?=$child['count']?></td>
                                <td><?=$child['rate']?> </td>
                                <td><?=$child['fee']?>  </td>
                            </tr>
                            <tr>
                                <td>Other</td>
                                <td><?=$other['count']?></td>
                                <td><?=$other['rate']?> </td>
                                <td><?=$other['fee']?>  </td>
                            </tr>
                            <tr>
                                <td>Sub Total</td>
                                <td></td>
                                <td></td>
                                <td><?=$total?></td>
                            </tr>
                            <tr>
                                <td>bKash Charge</td>
                                <td></td>
                                <td></td>
                                <td><?=$bkash_charge?></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td></td>
                                <td></td>
                                <td><?=$subtotal?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="margin:20px 0px">
                        <h2 class="title" style="color:black">Payment Process</h2>
                    </div>
                    <div>
                        <p class="name">
                            <ol>
                                <li>Send the amount to 
                                    <?php foreach ($bkash as $value):?>
                                        <?php echo $value->number.", ";?>
                                    <?php endforeach;?> 
                                    by bKash 
                                </li>
                                <li>Send a SMS to the bKash number mentioning the trasaction ID in the following format:<br>
                                        <p style="color:red">RegistrationID: <?php echo $reg_id;?> TrxID: BFH******</p>
                                </li>
                                <li>A confirmation SMS will be sent to your contact number</li>
                            </ol>
                        </p>     
                    </div>           
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