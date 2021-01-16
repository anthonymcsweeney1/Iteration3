<?php 
session_start();



if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>



<!Doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Request Approval</title>
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
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}



* {
  box-sizing: border-box;
}


table {
  width: 50%;
}

.column_left {
  float: left;
  width: 2.5%;
  padding: 15px;
 
}

.column {
  float: left;
  width: 60.33%;
  padding: 15px;
 
}

/* Solid border */
hr.solid {
  border-top: 3px solid #D3D3D3;
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
                                   
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Claims</span></a>
                                <ul class="collapse">
                                    <li><a href="ApproverClaims.php">View Claims Pending Action</a></li>
                                   
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
                            <h4 class="page-title pull-left">Preview Approval</h4>
                          
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
         
                    
                <?php
// get passed parameter value
$id=isset($_GET['ClaimNum']) ? $_GET['ClaimNum'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';
 

try {
    // prepare select query
    $query = "SELECT * FROM claims WHERE ClaimNum = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
 
  
    $stmt->bindParam(1, $id);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // claim values to fill up our form
  $number = $row['ClaimID'];
    $ClaimNum = $row['ClaimNum'];
    $InvoiceNum = $row['InvoiceNum'];
    $status = $row['Status'];
   $claimdate = $row['creation_date'];
    $offercode = $row['offercode'];
    $currency = $row['Currency'];
    $date = $row['invoice_date'];
    $Amount = $row['amount'];
    $CusName = $row['Cus_Name'];
    $Creator = $row['Creator'];
     $Approver = $row['Approver'];
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
                       
           

          <div id='contain'>
 
          
         
                        
                  <div class="column_left"> </div>  
             <div class="column" > 
                 
             <a  href="javascript:history.back()" class='btn btn-danger'>Back</a>
               &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="Request.php?id=<?=$number?>"  class='btn btn-success' >Confirm</a>
                <div class="sales-report-area mt-5 mb-5">
 <!-- Display Data for the claim to be approved-->
                    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?ClaimNum={$id}");?>" method="post">
 <hr class="solid">
 <p><b>Please review the information here before confirming your approval submission request.</b></p>  
         <hr class="solid">
 <div>
      <table>
  
  <tr>
      <td><b>Claim Number:</b></td>
    
    <td><?php echo $ClaimNum; ?></td>
  
  </tr>
  <tr>
    <td><b>Status:</b></td>
   
    <td><?php echo $status; ?></td>
  </tr>
  <tr>
    <td><b>Claim Date:</b></td>
   
    <td><?php echo $claimdate; ?></td>
    <td> </td>
    <td></td>
       <td><b>Due Date:</b></td>
      
    <td><?php echo $claimdate; ?></td>
  </tr>
  <tr>
    <td><b>Amount Settled:</b></td>
   
    
    <td><?php echo $Amount; ?> &nbsp;&nbsp;  <?php echo $currency; ?></td>
    
  </tr>
   <tr>
    <td><b>Settled By:</b></td>
 
    <td><?php echo $_SESSION['name']; ?> </td>
    
    
  </tr>
  
     <tr>
    <td><b>Owner</b></td>
   
    <td><?php echo $Creator; ?></td>
    
    
  </tr>
             
  </table>
     &nbsp;&nbsp;
       <table>
  <tr>
    <th>Approval Type</th>
    <th>Approval Rule</th>
    
  </tr>
  <tr>
    <td>Claim</td>
    <td>Default approver</td>
  
  </tr>


             
  </table> 
                   </div>     
                        
                     
      <div class="sales-report-area mt-5 mb-5"> 
          <h5>Request Status</h5> 
             <hr class="solid">
  <table>
  <tr>
    <th>Select</th>
    <th>System Status</th>
     <th>User Status</th>
    
  </tr>
  <tr>
    <td><input type="radio" name="imgsel" value="" checked="checked" /></td>
    <td>Closed</td>
  <td>Closed</td>
  </tr>

   
             
  </table> 
             
               <div  class="sales-report-area mt-5 mb-5">           
     <h5>Claim Approvers</h5>
        <hr class="solid">
           <table>
  <tr>
    <th>Sequence</th>
    <th>Type</th>
    <th>Approver</th>
    <th>Status</th>
    <th>Date</th>
  </tr>
  <tr>
    <th>1</th>
    <th>Role</th>
    <th>Holmes, Paul</th>
    <th>Open</th>
    <th><?php
echo date("Y/m/d");
?></th>
  </tr>

   
             
  </table>
       </div> 
        &nbsp;&nbsp;
                <a  href="javascript:history.back()" class='btn btn-danger'>Back</a>
               &nbsp;&nbsp;&nbsp;&nbsp;
     <a href="Request.php?id=<?=$number?>"  class='btn btn-success' >Confirm</a>

                  
           
 </div> 
         
</form>
  
      </div>  
         </div>
</div>
</div>
        


        <p></p>
     
     </form>
      
       

       
       
  
                
             
            
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
