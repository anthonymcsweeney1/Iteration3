
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
                    
                    
   <?php
 
// check if form was submitted
if($_POST){
     
    try{
        
        
     
       // query to update claim
        $query = "UPDATE claims 
                    SET ClaimNum=:ClaimNum, InvoiceNum=:InvoiceNum, Status=:status, customer_reason=:customer_reason, Cus_Name=:Cus_Name, offercode=:offercode, settlement=:settlement, amount=:amount, invoice_date=:invoice_date, ShipTo=:ShipTo, ShipToAcc=:ShipToAcc, Currency=:Currency, claim_type=:claim_type, Overage=:Overage
                    WHERE ClaimNum = :ClaimNum";
 
        // prepare query for excecution
        $stmt = $con->prepare($query);
 
        // posted values
        $ClaimNum=htmlspecialchars(strip_tags($_POST['ClaimNum']));
        $InvoiceNum=htmlspecialchars(strip_tags($_POST['InvoiceNum']));
        $status=htmlspecialchars(strip_tags($_POST['status']));
         $Customer_reason=htmlspecialchars(strip_tags($_POST['customer_reason']));
         $CusName=htmlspecialchars(strip_tags($_POST['Cus_Name']));
        $offercode=htmlspecialchars(strip_tags($_POST['offercode']));
       $settlement=htmlspecialchars(strip_tags($_POST['settlement']));
       $amount=htmlspecialchars(strip_tags($_POST['amount']));
      $date=htmlspecialchars(strip_tags($_POST['invoice_date']));
       
        $ShipTo=htmlspecialchars(strip_tags($_POST['ShipTo']));
        $ShipToAcc=htmlspecialchars(strip_tags($_POST['ShipToAcc']));
        $Currency=htmlspecialchars(strip_tags($_POST['Currency']));
        $claim_type =htmlspecialchars(strip_tags($_POST['claim_type']));
         $Overage =htmlspecialchars(strip_tags($_POST['Overage']));
           
        // bind the parameters
        $stmt->bindParam(':ClaimNum', $id);
        $stmt->bindParam(':InvoiceNum', $InvoiceNum);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':customer_reason', $Customer_reason);
        $stmt->bindParam(':Cus_Name', $CusName);
        $stmt->bindParam(':offercode', $offercode);
        $stmt->bindParam(':settlement', $settlement);
        $stmt->bindParam(':amount', $amount);
         $stmt->bindParam(':invoice_date', $date);
         $stmt->bindParam(':creation_date', $claimdate);
         $stmt->bindParam(':ShipTo', $ShipTo);
         $stmt->bindParam(':ShipToAcc', $ShipToAcc);
          $stmt->bindParam(':Currency', $Currency);
            $stmt->bindParam(':claim_type', $claim_type);
               $stmt->bindParam(':Overage', $Overage);
         
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was updated.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
        }
         
    }
     
    // show errors
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
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
                                    <li><a href="Invoices.php">View all Invoices</a></li>
                                    <li><a href="">Manually add an Invoice</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Claims</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="Claims.php">View All Claims</a></li>
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
                            <h4 class="page-title pull-left">Claim Main</h4>
                          
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
            <td>Bill To Customer:</td>
            <td><input type='text' name='Cus_Name' readonly value="<?php echo htmlspecialchars($CusName, ENT_QUOTES);  ?>" class='form-control' /></td>
       </tr>
          <td>Bill To:</td>
            <td><input type='text' name=''readonly value="<?php echo htmlspecialchars($BillTo, ENT_QUOTES);  ?>" class='form-control' /></td>
       </tr>
       <td>Bill To Account:</td>
            <td><input type='text' name='' readonly value="<?php echo htmlspecialchars($BillToAcc, ENT_QUOTES);  ?>" class='form-control' /></td>
       </tr>
       <tr>
            <td>Claim Type:</td>
              <td>
       <select name="claim_type" class='form-control'>
<option value="SAO T1" <?php if($claim_type=="SAO T1") echo 'selected="selected"'; ?> >SAO T1</option>
<option value="MDF T1" <?php if($claim_type=="MDF T1") echo 'selected="selected"'; ?> >MDF T1</option>
<option value="Rebate" <?php if($claim_type=="Rebate") echo 'selected="selected"'; ?> >Rebate</option>
</select>     
            </td>
        </tr>
        
           <tr>
            <td>Amount:</td>
            <td><input type='text' name='amount'  value="<?php echo htmlspecialchars($amount, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
           <tr>
            <td>Exchange Rate:</td>
            <td><input type='text' name='' readonly value="<?php echo htmlspecialchars($amount, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
         <tr>
            <td>Settlement:</td>
            <td>
       <select name="settlement" class='form-control'>
<option value="AP Payment" <?php if($settlement=="AP Payment") echo 'selected="selected"'; ?> >AP Payment</option>
<option value="Chargeback" <?php if($settlement=="Chargeback") echo 'selected="selected"'; ?> >Chargeback</option>
<option value="Credit Memo" <?php if($settlement=="Credit Memo") echo 'selected="selected"'; ?> >Credit Memo</option>
</select>     
            </td>
        </tr>
        </div>
           <div class="column" >
         <tr>
            <td>Claim Number</td>
            <td><input type='text' name='ClaimNum' readonly value="<?php echo htmlspecialchars($ClaimNum, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
         <tr>
            <td>Ship To Customer:</td>
            <td><input type='text' name='Cus_Name' readonly value="<?php echo htmlspecialchars($CusName, ENT_QUOTES);  ?>"  class='form-control' /></td>
       </tr>
        <tr>
            <td>Ship To:</td>
            <td><input type='text' name='ShipTo' readonly value="<?php echo htmlspecialchars($ShipTo, ENT_QUOTES);  ?>" class='form-control' /></td>
       </tr>
       <tr>
            <td>Ship To Account:</td>
            <td><input type='text' name='ShipToAcc' readonly value="<?php echo htmlspecialchars($ShipToAcc, ENT_QUOTES);  ?>" class='form-control' /></td>
       </tr>
        <tr>
            <td>Customer Reference Number</td>
            <td><input type='text' name='InvoiceNum' value="<?php echo htmlspecialchars($InvoiceNum, ENT_QUOTES);  ?>" class='form-control' /></td>
       </tr>
         <tr>
            <td>Customer Reason</td>
            <td>
       <select name="customer_reason" class='form-control'>
<option value="SAO T1" <?php if($Customer_reason=="SAO T1") echo 'selected="selected"'; ?> >SAO T1</option>
<option value="MDF T1" <?php if($Customer_reason=="MDF T1") echo 'selected="selected"'; ?> >MDF T1</option>
<option value="Rebate" <?php if($Customer_reason=="Rebate") echo 'selected="selected"'; ?> >Rebate</option>
</select>     
            </td>
        </tr>
          <tr>
            <td>Offer Code</td>
            <td><input type='text' name='offercode'readonly value="<?php echo htmlspecialchars($offercode, ENT_QUOTES);  ?>" class='form-control' /></td>
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
 <td>
         <input type='submit' id = "update" value='Update' class='btn btn-primary' />
                 &nbsp;&nbsp; 
                <a href='Claims.php' class='btn btn-danger'>Back</a> 
                <a id = "request" href="RequestApproval.php?ClaimNum=<?=$ClaimNum?>"  >Request Approval</a>
               
        <td><a href="OfferPage.php?OfferCode=<?=$offercode?>"target="_blank">View Offer Details</a></td>
       
                  
            </td>
 

  
      </div>

        <p></p>
       
          &nbsp;&nbsp;
           <!-- Code to display claim with same offer code -->
          <?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();

// Prepare the SQL statement and get records from our claims table, LIMIT will determine the page
$stmt = $pdo->prepare("SELECT * FROM `claims` WHERE offercode = ? And ClaimNum <> ?" );
 $stmt->bindParam(1, $offercode);
 $stmt->bindParam(2, $id);

$stmt->execute();
// Fetch the records so we can display them in our template.
$claims = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
        <!-- Toggle additional information -->   
<script>
function myFunction() {
  var x = document.getElementById("additional");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
 
       <a onclick="myFunction()">Additional Information</a>

       <div class="column_add">
<p>    
          <div class="additional" id="additional">
              
              <lable>Overage Amount</lable><input type='text' name='Overage'  value="<?php echo htmlspecialchars($Overage, ENT_QUOTES);  ?>" class='form-control' />
           <lable>Invoice Description</lable>
           <lable>Invoice Line</lable>
              <br>
              <h6>Review for possible duplicates</h6>
               <br>
           <table>
               
                                            <tr>
                                                <td class="">Claim Number</td>
                                               <td class="">Invoice Number</td>
                                                <td class="">Amount</td>
                                                  <td class="">Status</td>
                                              
                                            </tr>
         <?php foreach ($claims as $claims): ?>
           
                             
                                            <tr>
                                               
                                                
                                            
                                              <td><a href="ClaimPage.php?ClaimNum=<?=$claims['ClaimNum']?>"><?=$claims['ClaimNum']?></a></td>
                                                <td class=""><?=$claims['InvoiceNum']?></td>
                                                <td class=""><?=$claims['amount']?></td>
                                             <td class=""><?=$claims['Status']?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </table>    

          </div>
   
        </form>
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
