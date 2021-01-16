
<?php 
session_start();



if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>

            <?php
// get passed parameter value, in this case, the Claim Number
$id=isset($_GET['ClaimNum']) ? $_GET['ClaimNum'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';


 
// read claim data
try {
    
    
    // prepare select query
    $query = "SELECT * FROM claims WHERE ClaimNum = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
 
    // this is the first question mark
    $stmt->bindParam(1, $id);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // data to fill up form
  $number = $row['ClaimID'];
    $ClaimNum = $row['ClaimNum'];
    $InvoiceNum = $row['InvoiceNum'];
    $status = $row['Status'];
    $Customer_reason = $row['customer_reason'];
    $claim_type = $row['claim_type'];
    $offercode = $row['offercode'];
    $settlement = $row['settlement'];
    $date = $row['invoice_date'];
    $claimdate = $row['creation_date'];
    $amount = $row['amount'];
    $CusName = $row['Cus_Name'];
     $BillTo = $row['BillTo'];
      $BillToAcc = $row['BillToAcc'];
     $ShipTo = $row['ShipTo'];
      $ShipToAcc = $row['ShipToAcc'];
     $Approver = $row['Approver'];
      $Currency = $row['Currency'];
       $Overage = $row['Overage'];
     
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>




<!Doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Claim <?php echo $row['ClaimNum']; ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/additional.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<style>
        .container {
  padding: 16px;
  background-color: white;
  width:1500px;
}


/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 40.33%;
  padding: 15px;
 
}

.columnmid {
  float: left;
  width: 10.33%;
  padding: 15px;
 
}

.column_left {
  float: left;
  width: 2.33%;
  padding: 15px;
 
}
.column_add{
  float: left;
  width: 40.33%;
  padding: 15px;
 
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;


form label {font-weight:bold}



        
    </style>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                                               <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="Admin.php" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="collapse">
                                    <li><a href="index.html">Invoice dashboard</a></li>
                                    <li><a href="index2.html">Claims dashboard</a></li>
                                    <li><a href="index3.html">Customer dashboard</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Invoices
                                        
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="Invoices.php">View all Invoices</a></li>
                                   
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Claims</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="ApproverClaims.php">View Claims Pending Action</a></li>
                                   
                                  </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>Offers</span></a>
                                <ul class="collapse">
                                    <li><a href="Offers.php">View Offer</a></li>
                                    <li><a href="CreateOffer.php">Create an Offer</a></li>
                              
                                </ul>
                            </li>
                          
                        
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
      
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                      
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                          
                            <li class="settings-btn">
                                <i class="ti-settings"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title"><b>Approval Required: Claim Settlement (<?php echo $row['ClaimNum']; ?>) needs your approval for amount of <?php echo $row['amount']; ?> (Overage <?php echo $row['Overage']; ?>) </b></h4>
                         
                          
                        </div> 
                        &nbsp;&nbsp;   <p><b>From</b>&nbsp;&nbsp; <?php echo $row['Creator']; ?></p>
                         <p><b>To</b>&nbsp;&nbsp; <?php echo $_SESSION['name']; ?></p>
                         <p><b>Sent</b>&nbsp;&nbsp; <?php echo $_SESSION['name']; ?></p>
                         <p><b>ID</b>&nbsp;&nbsp; <?php echo $_SESSION['name']; ?></p>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['name']; ?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                             
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
         
        

             
            
                <div class="sales-report-area mt-5 mb-5">
                    
    
                    

                    
     <form  id="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?ClaimNum={$id}");?>" method="post">
         
         
     
 
 <div class="row">
     <div class="column_left"></div>
     
     
     <div class="column" >
             <table style="width:100%">
 
  <tr>
      <td><b><p style="color:blue">Claim Number</p></b></td>
    <td><?php echo $row['ClaimNum']; ?></td>
</tr>
  <tr>
    <td><b><p style="color:blue">Claim Owner</p></b></td>
    <td><?php echo $row['Creator']; ?></td>
  </tr>
   <tr>
    <td><b><p style="color:blue">Claim Status</p></b></td>
    <td><?php echo $row['Status']; ?></td>
  </tr>
   <tr>
    <td><b><p style="color:blue">Customer Name</p></b></td>
    <td><?php echo $row['Cus_Name']; ?></td>
  </tr>
   <tr>
    <td><b><p style="color:blue">Bill To Account</p></b></td>
    <td><?php echo $row['BillToAcc']; ?></td>
  </tr>
   <tr>
    <td><b><p style="color:blue">Bill To Address</p></b></td>
    <td><?php echo $row['BillTo']; ?></td>
  </tr>
   <tr>
    <td><b><p style="color:blue">Ship To Account</p></b></td>
    <td><?php echo $row['ShipToAcc']; ?></td>
  </tr>
   <tr>
    <td><b><p style="color:blue">Ship To Address</p></b></td>
    <td><?php echo $row['ShipTo']; ?></td>
  </tr>
   <tr>
    <td><b><p style="color:blue">Currency</p></b></td>
    <td><?php echo $row['Currency']; ?></td>
  </tr>
   <tr>
    <td><b><p style="color:blue">Customer Reference</p></b></td>
    <td><?php echo $row['InvoiceNum']; ?></td>
  </tr>
   <tr>
    <td><b><p style="color:blue">Offer Code</p></b></td>
    <td><?php echo $row['offercode']; ?></td>
  </tr>
    <tr>
    <td><b><p style="color:blue">Claim Type</p></b></td>
    <td><?php echo $row['claim_type']; ?></td>
  </tr>
    <tr>
    <td><b><p style="color:blue">Claim Reason</p></b></td>
    <td><?php echo $row['customer_reason']; ?></td>
  </tr>
    <tr>
    <td><b><p style="color:blue">Overage</p></b></td>
    <td>OV -<?php echo $row['Overage']; ?></td>
  </tr>
    <tr>
    <td><b><p style="color:blue">Claim Date</p></b></td>
    <td><?php echo $row['creation_date']; ?></td>
  </tr>
   <tr>
       <td><b><p style="color:blue">Total Claim Amount</p></b></td>
    <td><?php echo $row['amount']; ?></td>
  </tr>
</table>          
     
       

        <tr>
            <td></td>   </div>
            
        </tr>
        
        <div class="columnmid" ></div>
        
   <div class="column" >
         <a href="Approve.php?id=<?=$number?>" class="btnstyle">Approve</a> &nbsp;
       
               <a href="Reject.php?id=<?=$number?>" class="btnstyle">Reject</a>&nbsp;
                
       <a href="#" class="btnstyle">Request Information</a><br> &nbsp;
       
       <a href="OfferPage.php?OfferCode=<?=$offercode?>"target="_blank">View Offer Details</a>
        </div>   
 </div>
 <td>
    
     &nbsp;&nbsp;    &nbsp;&nbsp; 
        
                    
       
                  
            </td>
 

  
      </div>
            
            

        <p></p>
       
 
       </div>
        <!-- main content area end -->
    </div>
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
   
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>



</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
