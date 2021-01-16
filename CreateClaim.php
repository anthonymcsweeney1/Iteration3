<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>

<?php
// Get auto auto increment for Claim Number
$db = new mysqli('localhost', 'root', '', 'test_db');
$sql = "SHOW TABLE STATUS LIKE 'claims'";
$result=$db->query($sql);
$rowid = $result->fetch_assoc();

?>
        
 <?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'test_db');

$sql = "SELECT * FROM claims";
$result = mysqli_query($conn, $sql);

// Create button clicked
if (isset($_POST['save'])) { 
   

    $ClaimNum = $_POST['ClaimNum'];
     $InvoiceNum = $_POST['InvoiceNum'];
    $Cus_Reason = $_POST['customer_reason'];
    $ClaimType = $_POST['ClaimType'];
    $OfferCode = $_POST['OfferCode'];
    $settlement = $_POST['settlement'];
    $Cus_Name = $_POST['Cus_Name'];
     $BillTo = $_POST['BillTo'];
    $BillToAcc = $_POST['BillToAcc'];
     $ShipTo = $_POST['ShipTo'];
      $ShipToAcc = $_POST['ShipToAcc'];
      $Cus_ID = $_POST['Cus_ID'];
    $OperatingUnit = $_POST['OperatingUnit'];
    $Amount = $_POST['Amount'];
    $Currency = $_POST['Currency'];
        $invoice_date = $_POST['invoice_date'];
     $date = date('Y-m-d');
     $rn = $_SESSION['user_name'];
    


            // Query to insert to claims
            $sql = "INSERT INTO `claims` (`ClaimID`, `InvoiceNum`, `Status`, `customer_reason`, `claim_type`, `offercode`, `settlement`, `amount`, `invoice_date`, `creation_date`, `Cus_ID`, `Cus_Name`, `BillTo`, `BillToAcc`, `ShipTo`, `Approver`, `ApproverEmail`, `OperatingUnit`, `Currency`, `ClaimNum`, `ShipToAcc`, `Creator`) VALUES (NULL, '$InvoiceNum', 'Open', '$Cus_Reason', '$ClaimType', '$OfferCode', '$settlement', '$Amount', '$invoice_date', '$date', '$Cus_ID', '$Cus_Name', '$BillTo', '$BillToAcc', '$ShipTo', NULL, NULL, '$OperatingUnit', '$Currency', '$ClaimNum', '$ShipToAcc', '$rn')";
            if (mysqli_query($conn, $sql)) {
                echo "Claim created successfully";
            }
        } else {
            echo "Failed to create claim.";
        }


    
?>


<!Doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Create Claim</title>
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

}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  table-layout: fixed ;
  width: 100% ;
}
th, td {
  padding: 5px;
  width: 12.5% ;
}
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
                                    <li class="active"><a href="CreateClaim.php">Create a Claim</a></li>
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
              
  <div class="container">
     
                    <h4>Please enter required information to create claim</h4>
                    <br>
<form method="post" action="">
     <!-- Claim is populated based on customer ID and offer code-->
    <p>Customer ID:</p><input type="text" id="id" name="id">
 <p>Offer Code:</p><input type="text" id="offer" name="offer">
<br><br>
<input type="submit" name="search" value ="Search">
</form>
        
        <br>

<?php





$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'test_db');

if(isset($_POST['search']))
{
    // Check id Cus id and offer code is in the database
    $id = $_POST['id'];
    $offer = $_POST['offer'];
    
     $queryoffer = "SELECT * FROM offer WHERE OfferCode='$offer'";
    $queryoffer_run = mysqli_query($connection,$queryoffer);
    
     while($rowoffer = mysqli_fetch_array($queryoffer_run))
    {
    $query = "SELECT * FROM tbl_customer WHERE id='$id'";
    $query_run = mysqli_query($connection,$query);
    
    while($row = mysqli_fetch_array($query_run))
    {
        
        ?>
<form action="insert.php" method ="POST">
    <!-- hidden customer ID -->
    <INPUT TYPE ="hidden" name ="CustomerName" value="<?php echo $row['id']?>"/>
    
</form>
        <div class="container">
      <!-- html form here where the product information will be entered -->
<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" >
   
<div class="row">
  <div class="column" >
      <h4>Claim</h4>
      
        <tr>   <td>Claim Number</td>  
         <input type='text' placeholder= ''name='ClaimNum' class='form-control' value="CLA<?php echo $rowid['Auto_increment']?>" readonly/></td> 
        
         <tr> <br>
 
        <tr>   <td>Operating Unit</td>  
        <input type='text' placeholder= ''name='OperatingUnit' class='form-control' required="" />
        
         <tr> <br>
         
          
        
           <tr>
            <td>Customer Reason</td>
             <td>  <select name="customer_reason" required="">
    <option value="SAO T1">SAO T1 </option>
    <option value="MDF T1">MDF T1</option>
    <option value="Rebate">Rebate</option>
  
    </select>
   </td> <br>
           
            <tr>
            <td>Claim Type</td>
            <td><select name="ClaimType" required="">
    <option value="SAO T1">SAO T1 </option>
    <option value="MDF T1">MDF T1</option>
    <option value="Rebate">Rebate</option>
  
    </select></td>
        </tr> <br>
        
         <td>Invoice Number</td>
            <td><input type='text' name='InvoiceNum' class='form-control'required=""/></td>
        </tr> <br>
        
          <tr>
            <td>Offer Code</td>
            <td><INPUT TYPE ="text" name='OfferCode' class='form-control' value="<?php echo $rowoffer['OfferCode']?>" readonly/></td>
        </tr> <br>
        
       
        
        
         <tr>
       
        </tr>
        <INPUT TYPE ="text" hidden name ="Cus_ID" value="<?php echo $row['id']?>"/>
  </div>
  <div class="column" >
        <h4>Customer</h4>
     
          <tr>
           <td>Customer Name</td>
            <td><INPUT TYPE ="text" readonly name ="Cus_Name" value="<?php echo $row['CustomerName']?>"/></td>
        </tr> <br>
        
         <tr>
            <td>Ship To</td>
             <td><INPUT TYPE ="text" readonly name ="ShipTo" value="<?php echo $row['ShipTo']?>"/></td>
        </tr> <br>
        
        <tr>
            <td>Ship To Acc</td>
             <td><INPUT TYPE ="text" readonly name ="ShipToAcc" value="<?php echo $row['ShipToAcc']?>"/></td>
        </tr> <br>
        
          <tr>
            <tr>
            <td>Bill To</td>
            <td><INPUT TYPE ="text" readonly name ="BillTo" value="<?php echo $row['BillTo']?>"/></td>
        </tr><br>
        
        <tr>
            <td>Bill To Address</td>
            <td><INPUT TYPE ="text" readonly name ="BillToAcc" value="<?php echo $row['BillToAcc']?>"/></td>
        </tr> <br>
      
      
           
            
       
  
  </div>
  <div class="column" >
       <h4>Amount</h4>
  <tr>
            <td>Currency</td>
            <select name="Currency">
	<option value="USD" selected="selected">United States Dollars</option>
	<option value="EUR">Euro</option>
	<option value="GBP">United Kingdom Pounds</option>
	<option value="DZD">Algeria Dinars</option>
	<option value="AUD">Australia Dollars</option>
	<option value="ATS">Austria Schillings</option>
	<option value="BSD">Bahamas Dollars</option>
	<option value="BBD">Barbados Dollars</option>
	<option value="CSK">Czech Republic Koruna</option>
	<option value="DKK">Denmark Kroner</option>
	<option value="NLG">Dutch Guilders</option>
	<option value="XCD">Eastern Caribbean Dollars</option>
	<option value="XAU">Gold Ounces</option>
	<option value="GRD">Greece Drachmas</option>
	<option value="ILS">Israel New Shekels</option>
	<option value="LUF">Luxembourg Francs</option>
	<option value="MYR">Malaysia Ringgit</option>
	<option value="MXP">Mexico Pesos</option>
	<option value="NLG">Netherlands Guilders</option>
	<option value="NZD">New Zealand Dollars</option>
	<option value="NOK">Norway Kroner</option>
	<option value="PKR">Pakistan Rupees</option>
	<option value="XPT">Platinum Ounces</option>
	<option value="PLZ">Poland Zloty</option>
	<option value="PTE">Portugal Escudo</option>
	<option value="ROL">Romania Leu</option>
	<option value="RUR">Russia Rubles</option>
	<option value="SAR">Saudi Arabia Riyal</option>
	<option value="XAG">Silver Ounces</option>
	<option value="SGD">Singapore Dollars</option>	
	<option value="CHF">Switzerland Francs</option>
	<option value="TWD">Taiwan Dollars</option>
	<option value="THB">Thailand Baht</option>
	<option value="TTD">Trinidad and Tobago Dollars</option>
	<option value="TRL">Turkey Lira</option>
	
	
</select>
        </tr> <br>
        
        <tr>
            <td>Exchange Type</td>
              <td><select name="ExchangeType">
    <option value="Corporate">Corporate</option>
  
  
    </select></td>
        </tr> <br>
        
         <tr>
            <td>Amount</td>
            <td><INPUT TYPE ="text" required="" name='Amount' class='form-control'/></td>
        </tr> <br>
         <tr>
            <td>Date</td>
            <td><INPUT TYPE ="date" required="" name='invoice_date' class='form-control'/></td>
        </tr> <br>
       
       <tr>
            <td>Settlement Method</td>
           <td>  <select name="settlement">
    <option value="Credit Memo">Credit Memo</option>
    <option value="AP payment">AP Payment</option>
    <option value="Chargeback">Chargeback</option>
  
    </select>
            </td> <br>
     
        </tr> 
            <td></td>
            <td>
             
           
            </td>
        </tr> <br>
    
  </div>
    
    
    <input type='submit' name="save" value="Submit" class='btn btn-primary' />
    </div>
    
    
      
        
    
  
    
</form>
      </div>
</div>  
 <?php
 
    }
    echo "No Customer found with that ID."; 
    
    }
    echo "No Offer Found";
}

?>

      </div>
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
