
<?php 
session_start();



if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>

     <?php
// get passed parameter value, in this case, the Claim Number
$id=isset($_GET['Invoice_No']) ? $_GET['Invoice_No'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';


 
// read claim data
try {
    
    
    // prepare select query
    $query = "SELECT * FROM invoice WHERE Invoice_No = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
 
    // this is the first question mark
    $stmt->bindParam(1, $id);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // data to fill up form
  $number = $row['Invoice_No'];
    $InvoiceDate = $row['Invoice_Date'];
    $DueDate = $row['DueDate'];
    $InvoiceNum = $row['$InvoiceNum'];
    $Customer_ID = $row['Customer_ID'];
    $Customer_Name = $row['Customer_Name'];
    $offercode = $row['offercode'];
    $Tax = $row['Tax'];
    $Total = $row['Total'];
    $BillTo = $row['BillTo'];
      $Link = $row['Link'];
     $Terms = $row['Terms'];
      $Currency = $row['Currency'];
     
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
                    
                    
   <?php
 

?>


<!Doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Invoice  <?php echo $row['Invoice_No']; ?> </title>
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

input[type=text], textarea {
  width: 100%;
  padding: 1px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  
}

#search{
    width: 10%;
  padding: 1px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

select {
 height: 15vh;
  width: 50%;
 padding: 6px 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.additional{
    display:none;
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
.column_add{
  float: left;
  width: 20.33%;
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
                                    <li class="active"><a href="Invoices.php">View all Invoices</a></li>
                                    <li><a href="">Manually add an Invoice</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Claims</span></a>
                                <ul class="collapse">
                                    <li><a href="Claims.php">View All Claims</a></li>
                                    <li><a href="CreateClaim.php">Create a Claim</a></li>
                                  </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>Offers</span></a>
                                <ul class="collapse">
                                    <li><a href="Offers.php">View Offer</a></li>
                                    <li><a href="CreateOffer.php">Create an Offer</a></li>
                              
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Customers</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="Customers.php">View Customer</a></li>
                                    <li><a href="CreateCustomer.php">Complete Onboarding</a></li>
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
                            <h4 class="page-title pull-left">Invoice Page</h4>
                          
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

// if condition to check status
if ($status == "Open") {
  
} else {
   
 ?> 
                     <!-- Disable fields if status is not open -->
       <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>     
                    <script>
    $(document).ready(function(){
		$("#myForm :input").prop("disabled", true);
                document.getElementById("request").style.visibility="hidden"; 
                 document.getElementById("update").style.visibility="hidden"; 
    });
    
</script>   <?php           
                   
}
?> 



                    
                    
              

                    <form  id="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?ClaimNum={$id}");?>" method="post">
 <div class="row">
     <div class="column_left"></div>
            <div class="column" >
             
     
          <tr>
            <td>Invoice Number</td>
            <td><input type='text' name='Cus_Name' readonly value="<?php echo htmlspecialchars($InvoiceNum, ENT_QUOTES);  ?>" class='form-control' /></td>
       </tr>
          <td>Invoice Date</td>
            <td><input type='text' name=''readonly value="<?php echo htmlspecialchars($Invoice, ENT_QUOTES);  ?>" class='form-control' /></td>
       </tr>
       <td>Due Date</td>
            <td><input type='text' name='' readonly value="<?php echo htmlspecialchars($DueDate, ENT_QUOTES);  ?>" class='form-control' /></td>
       </tr>
   
        
           <tr>
            <td>Customer Name:</td>
            <td><input type='text' name='amount'  value="<?php echo htmlspecialchars($Customer_Name, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
           <tr>
            <td>Offer Code:</td>
            <td><input type='text' name='' readonly value="<?php echo htmlspecialchars($offercode, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
      
        </div>
           <div class="column" >
         <tr>
            <td>Total:</td>
            <td><input type='text' name='ClaimNum' readonly value="<?php echo htmlspecialchars($Total, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
         <tr>
            <td>Tax:</td>
            <td><input type='text' name='Cus_Name' readonly value="<?php echo htmlspecialchars($Tax, ENT_QUOTES);  ?>"  class='form-control' /></td>
       </tr>
        <tr>
            <td>Bill To:</td>
            <td><input type='text' name='ShipTo' readonly value="<?php echo htmlspecialchars($BillTo, ENT_QUOTES);  ?>" class='form-control' /></td>
       </tr>
      
    
       
       </div>
         
       
         <div class="column" >
             
                
                  <tr>
            <td>Status</td>
            <td>
            <select name="status" class='form-control'>
<option value="Open" <?php if($status=="Open") echo 'selected="selected"'; ?> >Open</option>
<option value="Duplicate" <?php if($status=="Duplicate") echo 'selected="selected"'; ?> >Duplicate</option>
<option value="Cancelled" <?php if($status=="Cancelled") echo 'selected="selected"'; ?> >Cancelled</option>
<option value="Pending Approval" <?php if($status=="Pending Approval") echo 'selected="selected"'; ?> >Pending Approval</option>
<option hidden value="Rejected" <?php if($status=="Rejected") echo 'selected="selected"'; ?> >Rejected</option>
<option hidden value="Approved" <?php if($status=="Approved") echo 'selected="selected"'; ?> >Approved</option>

</select>    
            </td>
        </tr>
           
        <tr>
            <td>Claim Date</td>
            <td><input type='date' name='claimdate' readonly value="<?php echo htmlspecialchars($claimdate, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        
          <tr>
            <td>Amount Remaining</td>
            <td><input type='text' name='' Readonly value="<?php echo htmlspecialchars($amount, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
          <tr>
            <td>Customer Reference Date</td>
            <td><input type='date' name='invoice_date' value="<?php echo htmlspecialchars($date, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        
           <tr>
            <td>Currency</td>
            <td>
             <select name="Currency" class='form-control'>
<option value="EUR" <?php if($Currency=="EUR") echo 'selected="selected"'; ?> >EUR</option>
<option value="GBP" <?php if($Currency=="GBP") echo 'selected="selected"'; ?> >GBP</option>
<option value="Dollars" <?php if($Currency=="Dollars") echo 'selected="selected"'; ?> >Dollars</option>
</select>    
            
            </td>
        </tr>
      

        <tr>
            <td></td>   </div>
            
        </tr>
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
