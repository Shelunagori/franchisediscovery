<?php
require_once('class.phpmailer.php');
$mail = new PHPMailer(true);

$mail->IsSMTP(); // telling the class to use SMTP

  try {
  $mail->Host       = "mail.franchisediscovery.in"; 
  $mail->SMTPDebug  = 0;
  $mail->SMTPAuth   = true; 
  $mail->Port       = 587; 
  $mail->Username   = "noreply@franchisediscovery.in"; 
  $mail->Password   = "ngsgG!79eoZa";        
  $mail->AddAddress('shelunagori@gmail.com', 'Shelu');
  $mail->SetFrom('noreply@franchisediscovery.in', 'Shailendra Nagori');
  
  $mail->Subject = 'PHPMailer Test Subject via mail(), advanced';
  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; 
  $mail->MsgHTML("<h1>Haiiiiii</h1>");

  $mail->Send();
  echo "Message Sent OK</p>\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage();
} catch (Exception $e) {
  echo $e->getMessage(); 
} 
?>


