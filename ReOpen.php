  <?php
  
        
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
 
 
     
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
                    
                    
   <?php

try {
    
   
    
    
    // prepare select query
    // Update claim status to 'Pending Approval' and a preser approver
    $query = "UPDATE `claims` SET `Status` = 'Open', Approver ='', ApproverEmail = '' WHERE `claims`.`ClaimNum` = '$ClaimNum'; ";  
    echo "<script>alert('Claim $ClaimNum has been updated to Open.')</script>";
     header( "refresh:1;url=Claims.php" );
   
    $stmt = $con->prepare( $query );
    
    
 
  
 
    // execute our query
    $stmt->execute();
 
   
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
            
           
        
    
    ?>
