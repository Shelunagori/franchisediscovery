<?php 

require('config.php');

$emails=[];$content='';
$sql = "select * from news_letter_emails where status=0";
$query_result=mysqli_query($db,$sql); 
		if(!empty($query_result)){ 
			if($query_result->num_rows > 0){
				while($rows=mysqli_fetch_array($query_result)){
					$news_letter_id=$rows['news_letter_id'];
					$news_letter_row_id=$rows['news_letter_row_id'];
					$sqlRows = "select * from news_letter_rows where id='$news_letter_row_id' and is_deleted = 0";
					$query_result1=mysqli_query($db,$sqlRows); 
					if($query_result1->num_rows > 0){
						$rows1=mysqli_fetch_array($query_result1);
						$content = $rows1['content'];
					}
					
					$sqlRows1 = "select * from news_letter where id='$news_letter_id'";
					$query_result2=mysqli_query($db,$sqlRows1); 
					if($query_result2->num_rows > 0){
						while($rows2=mysqli_fetch_array($query_result2)){
							$emails[] = $rows2['email'];
						}
					}
					
				}
				
			}
		}
		
	

$dataMsg = '<!doctype html>

					<html>
					<head>
						<meta charset="utf-8">
						<title>Franchise Discovery</title>
						<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
						<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
					</head>
					<body>
						<div style="font-family:Arial,sans-serif; font-size:13px; color:#555; width:100%; max-width:600px; line-height:2; margin:0 auto;">
						<div style="border:1px solid #ddd; background:#fff;">
							<div style="background: #fff; padding: 10px 10px;">

                                                                                                                                  <div style="display:inline-block; width:380px; max-width:100%; vertical-align:top;"><a href="http://franchisediscovery.in/" target="_blank" style="font-size: 25px;text-decoration: none;color: #F20702;font-weight: 700;">

                                                                                                                                                <img src="http://franchisediscovery.in/img/Franchise-logo.png" alt="Franchise Discovery" title="Franchise Discovery" border="0" style="vertical-align:bottom;width: 60px;">franchisediscovery.in</a></div>

                                                                                                                                                <div style="display:inline-block; line-height:1.8; padding-top:10px;">

                                                                                                                                                                Helpline: +91-8108335523<br>

                                                                                                                                                                Email: <a href="mailto:info@franchisediscovery.in" style="color:#555; text-decoration:none;">info@franchisediscovery.in</a>

                                                                                                                                                </div>

                                                                                                                                </div>

   

                                                                                                                 <div style="height:5px; background: #d8c808; background: -moz-linear-gradient(left,  #d8c808 0%, #f49414 14%, #e53a24 28%, #594b97 43%, #594b97 43%, #008dd3 57%, #00546d 72%, #009a84 85%, #54af3a 100%); background: -webkit-linear-gradient(left,  #d8c808 0%,#f49414 14%,#e53a24 28%,#594b97 43%,#594b97 43%,#008dd3 57%,#00546d 72%,#009a84 85%,#54af3a 100%); background: linear-gradient(to right,  #d8c808 0%,#f49414 14%,#e53a24 28%,#594b97 43%,#594b97 43%,#008dd3 57%,#00546d 72%,#009a84 85%,#54af3a 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#d8c808",endColorstr="#54af3a",GradientType=1 );"></div>

 

                                                                                                                <div style="border-bottom: 1px solid #e6e6e6; background-color: #fafafa; padding:5px 20px 10px; font-size:15px;">

          
'.$content.'
                                                                                                                

                                                                                                 </div>

        

                                                                                                 <div>

                                                                                                                <div style="font-size:0; text-align:center;">

                                                                                                                                <div style="display:inline-block; vertical-align:top; font-size:13px;  width:100%; max-width:149px;">

                                                                                                                                                <a href="http://franchisediscovery.in/" style="display:block; color:#555; text-decoration:none;">

                                                                                                                                                   <p style="margin:3px 0 0;">Desserts & Bar</p>

                                                                                                                                                </a>

                                                                                                                                </div>

                                                                                                                                <div style="display:inline-block; vertical-align:top; font-size:13px; width:100%; max-width:149px;">

                                                                                                                                                <a href="http://franchisediscovery.in" style="display:block; color:#555; text-decoration:none;">

                                                                                                                                                   <p style="margin:3px 0 0;">Restaurant</p>

                                                                                                                                                </a>

                                                                                                                                </div>

                                                                                                                                <div style="display:inline-block; vertical-align:top; font-size:13px;  width:100%; max-width:149px;">

                                                                                                                                                <a href="http://franchisediscovery.in" style="display:block; color:#555; text-decoration:none;">

                                                                                                                                                   <p style="margin:3px 0 0;">Ice Cream</p>

                                                                                                                                                </a>

                                                                                                                                </div>

                                                                                                                                <div style="display:inline-block; vertical-align:top; font-size:13px; width:100%; max-width:149px;">

                                                                                                                                                <a href="http://franchisediscovery.in" style="display:block; color:#555; text-decoration:none;">

                                                                                                                                                   <p style="margin:3px 0 0;">Hot & Cold Beverages</p>

                                                                                                                                                </a>

                                                                                                                                </div>

                                                                                                                </div>

                                                                                                               

                                                                                                </div>

                                                                                               

                                                                                                <div style="height:5px; background: #d8c808; background: -moz-linear-gradient(left,  #d8c808 0%, #f49414 14%, #e53a24 28%, #594b97 43%, #594b97 43%, #008dd3 57%, #00546d 72%, #009a84 85%, #54af3a 100%); background: -webkit-linear-gradient(left,  #d8c808 0%,#f49414 14%,#e53a24 28%,#594b97 43%,#594b97 43%,#008dd3 57%,#00546d 72%,#009a84 85%,#54af3a 100%); background: linear-gradient(to right,  #d8c808 0%,#f49414 14%,#e53a24 28%,#594b97 43%,#594b97 43%,#008dd3 57%,#00546d 72%,#009a84 85%,#54af3a 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#d8c808", endColorstr="#54af3a",GradientType=1 );"></div>

                                                                                                <div style="background-color: #fafafa; padding:5px 20px 10px;">

                                                                                                                <div style="padding:15px; text-align:center; line-height:1;">

                                                                                                                                <a href="#" target="_blank" style="display:inline-block;margin-right:5px;"><img src="http://franchisediscovery.in/img/facebook.png" alt="Facebook" title="Facebook" style="vertical-align:bottom;"></a>

                                                                                                                                <a href="#" target="_blank" style="display:inline-block; border-left:1px solid #ccc;margin-right:5px; padding-left:8px;"><img src="http://franchisediscovery.in/img/twitter.png" alt="Twitter" title="Twitter" style="vertical-align:bottom;"></a>

                                                                                                                                <a href="#" target="_blank" style="display:inline-block; border-left:1px solid #ccc; padding-left:8px;"><img src="http://franchisediscovery.in/img/instagram.png" alt="Instagram" title="Instagram" style="vertical-align:bottom;"></a>

                                                                                                                </div>           

                                                                                                                <div style="padding:0 15px; text-align:center;">

                                                                                                                                <a href="#" style="display:inline-block; color:#555; text-decoration:none;">Terms &amp; Conditions</a> |

                                                                                                                                <a href="#" style="display:inline-block; color:#555; text-decoration:none;">FAQs</a> |

                                                                                                                                <span style="display:inline-block;">Easy Customer Support</span>

                                                                                                                </div>

                                                                                                </div>

                                                                                </div>

                                                                </div>

                                                                </body>

                                                                </html>';
		if(sizeof($emails) > 0){
			foreach($emails as $email_id){
				if(!empty($email_id)){
					require_once('phpmailer/class.phpmailer.php');
					$mail = new PHPMailer(true);			
					$mail->IsSMTP(); // telling the class to use SMTP
					  try {
					  $mail->Host       = "smtp.gmail.com"; 
					  $mail->SMTPDebug  = 0;
					  $mail->SMTPAuth   = true; 
					  $mail->Port       = 587;
					  $mail->SMTPSecure = 'tls';	 
					  $mail->Username   = "noreply@franchisediscovery.in"; 
					  $mail->Password   = "ngsgG!79eoZa";        
					  $mail->AddAddress($email_id,$Username);
					  $mail->SetFrom('noreply@franchisediscovery.in', 'Franchise discovery');
					  $mail->mailtype = 'html';
					  $mail->charset = 'iso-8859-1';
					  $mail->wordwrap = TRUE;
					  $mail->Subject = 'News Letter - Franchise discovery';
					  $mail->AltBody = 'News Letter - Franchise discovery'; 
					  $mail->MsgHTML($dataMsg);
					  $mail->Send();
					  
					} catch (phpmailerException $e) {
					  //echo $e->errorMessage(); exit;
					} catch (Exception $e) {
					  //echo $e->getMessage();  exit;
					} 		
					$status = 'success';
					$message = 'Confirm Your Email Address';
			
				}else{
					$status = 'fail';
					$message = 'Something went wrong !!';
				}
				
			}
		}else{
			$status = 'fail';
			$message = 'Something went wrong !!';
		}														
																
																