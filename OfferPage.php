<?php 
session_start();



if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>




<!Doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Offer Page</title>
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
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<style>
        .container {
  padding: 16px;
  background-color: white;
  width:1500px;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

* {
  box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 31.33%;
  padding: 15px;
 
}

.column_left {
  float: left;
  width: 2.33%;
  padding: 15px;
 
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;

        
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
                                    <li><a href="">Manually add an Invoice</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Claims</span></a>
                                <ul class="collapse">
                                    <li><a href="Claims.php">View All Claims</a></li>
                                    <li><a href="CreateClaim.php">Create Claim</a></li>
                                  </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>Offers</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="Offers.php">View Offer</a></li>
                                    <li><a href="CreateOffer.php">Create Offer</a></li>
                              
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Customers</span></a>
                                <ul class="collapse">
                                    <li><a href="Customers.php">View Customer</a></li>
                                    <li><a href="CreateCustomer.php">On Boarding</a></li>
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
                            <h4 class="page-title pull-left">Offer Details</h4>
                          
                        </div>
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
                    
                <?php
// get passed parameter value, in this case, the record ID
$id=isset($_GET['OfferCode']) ? $_GET['OfferCode'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';
 
// read offer data
try {
    // prepare select query
    $query = "SELECT * FROM offer WHERE OfferCode = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
 
    // this is the first question mark
    $stmt->bindParam(1, $id);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // offer data to fill up our form
  
    $OfferCode = $row['OfferCode'];
    $Earned = $row['Earned'];
    $Paid = $row['Paid'];
    $Customer = $row['Customer'];
    $Status = $row['status'];
    $OfferOwner = $row['OfferOwner'];
    $Owner_email = $row['OfferOwner_email'];
    $Description = $row['description'];
    $Currency = $row['currency'];
    $Activity = $row['activity'];
    $StartDate = $row['start_date'];
     $EndDate = $row['end_date'];
      $Customer_Acc = $row['Customer_Account_ID'];
     $PaymentType = $row['payment_type'];
     $OfferType = $row['type'];
     
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
 
 <div class="row">
     <div class="column_left"></div>
            <div class="column" >
             
     
        <tr>
            <td>Offer Code</td>
            <td><input type='text' name='OfferCode' readonly value="<?php echo htmlspecialchars($OfferCode, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
          <td>Customer</td>
            <td><input type='text' name='Customer'readonly value="<?php echo htmlspecialchars($Customer, ENT_QUOTES);  ?>" class='form-control' /></td>
       </tr>
       <td>Customer Account Number</td>
            <td><input type='text' name='CustomerAccNum' readonly value="<?php echo htmlspecialchars($Customer_Acc, ENT_QUOTES);  ?>" class='form-control' /></td>
       </tr>
       <tr>
         <td>Offer Type</td>
          <td><input type='text' name='OfferType' readonly value="<?php echo htmlspecialchars($OfferType, ENT_QUOTES);  ?>" class='form-control' /></td>
     
        </tr>
        
         
           <tr>
            <td>Start Date</td>
            <td><input type='text' name='startdate' readonly value="<?php echo htmlspecialchars($StartDate, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        
             <tr>
            <td>Currency</td>
            <td><input type='text' name='Currency' readonly value="<?php echo htmlspecialchars($Currency, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        
         <tr>
            <td>Activity</td>
            <td><input type='text' name='Activity' readonly value="<?php echo htmlspecialchars($Activity, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        
           <tr>
            <td>Amount</td>
            <td><input type='text' name='Amount' readonly value="<?php echo htmlspecialchars($Earned, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        
        </div>
           <div class="column" >
         <tr>
            <td>Owner</td>
            <td><input type='text' name='Owner' readonly value="<?php echo htmlspecialchars($OfferOwner, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
         <tr>
            <td>Owner email</td>
            <td><input type='text' name='Owner_email' value="<?php echo htmlspecialchars($Owner_email, ENT_QUOTES);  ?>" class='form-control' /></td>
       </tr>
        <tr>
            <td>Description</td>
            <td><input type='text' name='' readonly value="<?php echo htmlspecialchars($Description, ENT_QUOTES);  ?>" class='form-control' /></td>
       </tr>
       
        <tr>
            <td>Currency</td>
            <td><input type='text' name='currency' readonly value="<?php echo htmlspecialchars($Currency, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>End Date</td>
            <td><input type='text' name='enddate' readonly value="<?php echo htmlspecialchars($EndDate, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        
       </div>
     <div class="column" >
        <tr>
            <td>Status</td>
            <td><select name='status' value="<?php echo htmlspecialchars($Status, ENT_QUOTES);  ?>" class='form-control' /> 
            <option value="Active">Active</option>
    <option value="Completed">Completed</option>
    <option value="Terminated">Terminated</option>
    <option value="Cancel">Cancel</option>
  
    </select></td>
        </tr>
        
       </div>
     </div>
           
         
       
         
        <tr>
            <td></td>   </div>
            <td>
              
                <a href='Offers.php' class='btn btn-danger'>Back</a>
            </td>
        </tr>
    
</form>
         
      </div>
   
     
       
  
                </div>
             
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
  
    <!-- offset area end -->
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
