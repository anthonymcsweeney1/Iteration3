  <?php 
session_start();



if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
$user = $_SESSION['user_name'];
$name = $_SESSION['name'];
 ?>


<?php
  //code adpated from this video
  //https://www.youtube.com/watch?v=5YgscpAC0gE 
        
$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';

 // read claim data
try {
    
    
    // prepare select query
    $query = "SELECT * FROM claims WHERE ClaimID = ? LIMIT 0,1";
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

try {
    $current_date = date('Y/m/d H:i:s');
    

 $message_sent = '
 <a> From: <b>'.$name.'<br />
 <a> To: <b>David Foley<br />
 <a> Sent: <b>'.$current_date.'<br />
     <br><br>
 
  <a> Dear Sir/Madam, </a><br><br><a>Claim ' .$row['ClaimNum']. ' has been assigned to you, for action. See summary details and attached invoice below.</a><br><br>
<a>Please review and take the nessary action for this claim. You can Approve Or Reject the invoice from this e-mail by clicking one of the action buttons, you can navigate to the system with this <a href="http://localhost/Iteration3/ClaimAction.php?ClaimNum=' .$row['ClaimNum']. '">Link</a> or you can use the  mobile approver app.</a><br>
<br><br>
  <table border="1" width="100%" cellpadding="5" cellspacing="5">
 
    <tr>
    <td width="30%">Claim Number</td>
    <td width="70%">'.$row['ClaimNum'].'</td>
   </tr>
   <tr>
    <td width="30%">Invoice Number</td>
    <td width="70%">'.$row['InvoiceNum'].'</td>
   </tr>
 <tr>
    <td width="30%">Customer</td>
    <td width="70%">'.$row['Cus_Name'].'</td>
   </tr>
    <tr>
    <td width="30%">Bill To</td>
    <td width="70%">'.$row['BillTo'].'</td>
   </tr>
    <tr>
    <td width="30%">Ship To</td>
    <td width="70%">'.$row['ShipTo'].'</td>
   </tr>
     <tr>
    <td width="30%">Claim Type</td>
    <td width="70%">'.$row['claim_type'].'</td>
   </tr>
   <tr>
    <td width="30%">Customer Reason</td>
    <td width="70%">'.$row['customer_reason'].'</td>
   </tr>
   <tr>
    <td width="30%">Offer Code</td>
    <td width="70%">'.$row['offercode'].'</td>
   </tr>
  
   <tr>
    <td width="30%">Settlement Method</td>
    <td width="70%">'.$row['settlement'].'</td>
   </tr>
   
     <tr>
    <td width="30%">Amount</td>
    <td width="70%">'.$row['amount'].'</td>
   </tr>
     <tr>
    <td width="30%">Invoice Date</td>
    <td width="70%">'.$row['invoice_date'].'</td>
   </tr>
     <tr>
    <td width="30%">Overage</td>
    <td width="70%">'.$row['Overage'].'</td>
   </tr>
   
    
  </table>
     <a href="http://localhost/Iteration3/Approve.php?id='.$row['ClaimID'].'" class="trash">Approve</a><br>
                    <a href="http://localhost/Iteration3/Reject.php?id='.$row['ClaimID'].'" class="a2">Reject</a><br>
                        <a href="http://localhost/Iteration3/InvoicePage.php?Invoice_No='.$row['InvoiceNum'].'">View Invoice</a>
 ';
 
 
 $message_forward = '
 <a> To: <b>'.$name.'</b>
 <a> Sent: <b>'.$current_date.'</b>
     <br><br>
  
 
  <a> Dear Sir/Madam, </a><br><br><a>Claim Settlement ' .$row['ClaimNum']. ' for '.$row['amount'].' '.$row['Currency'].' has been fowarded for Approval.</a>

 ';
 
 require 'PHPMailer/PHPMailerAutoload.php';
 
 
// Forward to Approver
$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = 'techguysclaims@gmail.com';// email
$mail->Password = 'FYP2021!';  // password
 $mail->FromName = 'Action Requires: Claim Settlement ('.$row['ClaimNum'].') needs your approval for unearned earning of '.$row['Overage'].' '.$row['Currency'].'';    //Sets the From name of the message
$mail->setFrom('Workflow Mailer', 'Tech Guys Claims'); // From email and name
$mail->addAddress('antomc99@gmail.com', 'Approver');  // to email and name
$mail->Subject = 'Action Requires: Claim Settlement ('.$row['ClaimNum'].') needs your approval for unearned earning of '.$row['Overage'].' '.$row['Currency'].'';  
$mail->msgHTML($message_sent); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

//Forward to User
$mail2 = new PHPMailer;
$mail2->isSMTP(); 
$mail2->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail2->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail2->Port = 587; // TLS only
$mail2->SMTPSecure = 'tls'; // ssl is deprecated
$mail2->SMTPAuth = true;
$mail2->Username = 'techguysclaims@gmail.com';// email
$mail2->Password = 'FYP2021!';  // password
 $mail2->FromName = 'For Your Information: Forward Request: Claim Settlement '.$row['ClaimNum'].' for '.$row['amount'].' '.$row['Currency'].'  has been forwarded for Approval.';      //Sets the From name of the message
$mail2->setFrom('techguysclaims@gmail.com', 'Tech Guys Claims'); // From email and name
$mail2->addAddress($user, 'Analysis');  // to email and name
$mail2->Subject = 'For Your Information: Forward Request: Claim Settlement '.$row['ClaimNum'].' for '.$row['amount'].' '.$row['Currency'].'  has been forwarded for Approval.';  
$mail2->msgHTML($message_forward); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail2->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body

$mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message sent!";
   
}

$mail2->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
if(!$mail2->send()){
    echo "Mailer Error: " . $mail2->ErrorInfo;
}else{
    echo "Message sent!";
   
}
    
    
    // prepare select query
    // Update claim status to 'Pending Approval' and a preser approver
    $query = "UPDATE `claims` SET `Status` = 'Pending Approval', `Approver` = 'David Foley', `ApproverEmail` = 'davidfoley1@techguys.com' WHERE `claims`.`ClaimID` = $id;
        INSERT INTO `request` VALUES ('', '$ClaimNum', '1.1', '$current_date', 'Submit', '$name', 'Workflow System','','','','','','','');";  
    

    
      
    echo "<script>alert('Your account request is now pending for approval.')</script>";

    $stmt = $con->prepare( $query );
    
 
    // execute our query
    $stmt->execute();
    
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
            
           
        
    
    ?>
<html>
    <a href="Claims.php" >Go back to Claim page</a>
    
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>