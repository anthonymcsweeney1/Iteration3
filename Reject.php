  <?php
        
           
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';

// read current record's data
try {
    
    
    // prepare select query
    $query1 = "SELECT * FROM claims WHERE ClaimID = ? LIMIT 0,1";
    $stmt1 = $con->prepare( $query1 );
 
    // this is the first question mark
    $stmt1->bindParam(1, $id);
 
    // execute our query
    $stmt1->execute();
 
    // store retrieved row to a variable
    $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
 
    // data to fill up form
  $number = $row1['ClaimID'];
    $ClaimNum = $row1['ClaimNum'];
    $InvoiceNum = $row1['InvoiceNum'];
    $status = $row1['Status'];
    $Customer_reason = $row1['customer_reason'];
    $claim_type = $row1['claim_type'];
    $offercode = $row1['offercode'];
    $settlement = $row1['settlement'];
    $date = $row1['invoice_date'];
    $claimdate = $row1['creation_date'];
    $amount = $row1['amount'];
    $CusName = $row1['Cus_Name'];
     $BillTo = $row1['BillTo'];
      $BillToAcc = $row1['BillToAcc'];
     $ShipTo = $row1['ShipTo'];
      $ShipToAcc = $row1['ShipToAcc'];
     $Approver = $row1['Approver'];
      $Currency = $row1['Currency'];
       $Overage = $row1['Overage'];
     
}
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
 

try {
   
    // prepare select query
    $query = "Update claims SET Status ='Rejected' Where ClaimID = $id;";  echo "<script>alert('Claim is now rejected.  Thank you.')</script>";
    header( "refresh:1;url=ApproverClaims.php" );
    $stmt = $con->prepare( $query );
 
    // this is the first question mark
    $stmt->bindParam(1, $id);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    

}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
   $current_date = date('Y/m/d H:i:s');
            
      $message_sent = '
     <style>
#claim {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#claim td, #claim th {
  border: 1px solid #ddd;
  padding: 8px;
}


#claim th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
 <a> From: <b>'.$name.'</b><br />
 <a> To: <b>Analysis</b><br />
 <a> Sent: <b>'.$current_date.'</b>
   <br><br>   
   
<a>Claim Settlement ('.$row1['ClaimNum'].') has been rejected for payment of unearned earnings of '.$row1['Currency'].' '.$row1['amount'].'. by '.$name.'</a>
    <br><br>
<a>Approver Comments : COMMENT</a>
    
 <br><br>
 <h3>Earlier Action History</h3>
 


<table id="claim">
  <tr>
    <th>Num</th>
    <th>Action Date</th>
    <th>Action</th>
    <th>From</th>
    <th>To</th>
    <th>Comment</th>
  </tr>
  <tr>
    <td>1.1</td>
    <td>Submited Date</td>
    <td>Submit</td>
     <td>Analysis</td>
     <td>'.$name.'</td>
     <td></td>
  </tr>
  <tr>
    <td>1.2</td>
     <td>'.$current_date.'</td>
    <td>Reject</td>
    <td>'.$name.'</td>
    <td>Workflow System</td>
    <td>COMMENT:</td>
  </tr>
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
 $mail->FromName = 'For Your Information: Claim Settlement '.$row1['ClaimNum'].' has been rejected for payment of unexpected earning of '.$row1['Currency'].''.$row1['amount'].' .';    //Sets the From name of the message
$mail->setFrom('Workflow Mailer', 'Tech Guys Claims'); // From email and name
$mail->addAddress('antomc99@gmail.com', 'Analysis');  // to email and name
$mail->Subject = 'For Your Information: Claim Settlement '.$row1['ClaimNum'].' has been rejected for payment of unexpected earning of '.$row1['Currency'].''.$row1['amount'].' .'; 
$mail->msgHTML($message_sent); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
          
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
        
    
    ?>
<htm>
    <a href="ApprovalPage.php" >Go back to Claim page</a>
    
</htm>

