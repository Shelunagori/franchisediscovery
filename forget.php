<?php 	session_start();
    include("admin/config.php");
	$status = '';
	$message = '';
	
	if(isset($_POST['submit']))
	{		
		$email = mysqli_real_escape_string($db,$_POST['email']);
			$sql="select * from registration where email='$email'";
			$result=mysqli_query($db,$sql);
			$count=mysqli_num_rows($result);
			$rowDaata=mysqli_fetch_array($result);
			if($count > 0)
			{
				$name = $rowDaata['first_name'].' '.$rowDaata['last_name'];
				$email = $rowDaata['email'];
				
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
									
									<p><strong>Dear '.$name .' !</strong></p>
									<p> Here are the login details for your Franchise Discovery Account. </p>
									<p><b> Email Id : </b>'.$email.'</p>
									
									<p><b>To change your password :</b><a href="http://franchisediscovery.in/reset_password.php?data='.base64_encode($email).'&datarow='.base64_encode($rowDaata['id']).'" target="_blank" > Click Here</a>
									</p>
								
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
				

				require_once('phpmailer/class.phpmailer.php');
				$mail = new PHPMailer(true);			
				$mail->IsSMTP(); 
				  try {
				  $mail->Host       = "smtp.gmail.com"; 
				  $mail->SMTPDebug  = 0;
				  $mail->SMTPAuth   = true; 
				  $mail->Port       = 587;
				  $mail->SMTPSecure = 'tls';	 
				  $mail->Username   = "noreply@franchisediscovery.in"; 
				  $mail->Password   = "ngsgG!79eoZa";        
				  $mail->AddAddress($email,$name);
				  $mail->SetFrom('noreply@franchisediscovery.in', 'Franchise discovery');
				  $mail->mailtype = 'html';
				  $mail->charset = 'iso-8859-1';
				  $mail->wordwrap = TRUE;
				  $mail->Subject = 'your account information from Franchise discovery';
				  $mail->AltBody = 'your account information from Franchise discovery !'; 
				  $mail->MsgHTML($dataMsg);
				  $mail->Send();
				  
				} catch (phpmailerException $e) {
				  //echo $e->errorMessage(); exit;
				} catch (Exception $e) {
				  //echo $e->getMessage();  exit;
				} 


				$status = 'success';

				//header('location:reset_password.php?id='.base64_encode($rowDaata['id']));
			}
			else
			{
				$status="fail";
				$message="Invalid Email Address !";
			}
	} ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">		
    <!-- Title  -->
    <title>Franchise Discovery</title>

    <!-- Favicon  -->
    <link rel="shortcut icon" href="<?php echo $baseURL; ?>img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?php echo $baseURL; ?>css/core-style.css">
    <link rel="stylesheet" href="<?php echo $baseURL; ?>style.css">

    <!-- Responsive CSS -->
    <link href="<?php echo $baseURL; ?>css/responsive.css" rel="stylesheet">
  
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125394826-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125394826-1');
</script>
<style>
	.error{
	    color: #c54848 !important;
}
</style>

</head>

<body>
    <!-- ***** Header Area Start ***** -->
     <?php include("header.php");?>
	
	

    <!-- ***** New Arrivals Area Start ***** -->
    <section class="  clearfix ">
        <div class="container ">
           
		    
			
		   <div class="row top-brands">
           <div class="col-sm-12">
			 <!-- ***** Login Area Start ***** -->
    <div class="bigshop_reg_log_area bg-img " style="background-image: url(http://franchisediscovery.in/img/bg-img/login.jpg);">
        <div class="container">
		
            <div class="row justify-content-center">
		
                <div class="col-12 col-md-8">
                    <div class="login_form text-center">
					<?php if(isset($_SESSION['isVerify']) && $_SESSION['isVerify'] == 1)
						{ ?>
							<div class="alert alert-success" role="alert">
								<button type="button" class="close" data-dismiss="alert">
								<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
								<strong>Email verified successfully !</strong> 
							</div>
					<?php unset($_SESSION['isVerify']);   }?>
					<?php if(isset($_SESSION['isVerify']) && $_SESSION['isVerify'] == 0)
						{ ?>
							<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert">
								<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
								<strong>Something went wrong !</strong> 
							</div>
						<?php unset($_SESSION['isVerify']); }?>
					
					<?php if($status == 'success')
						{ ?>
							<div class="alert alert-success" style="color: #7DBFCF;background-color: #e4f3fa;border-color: #e4f3fa;" role="alert">
								<button type="button" class="close" data-dismiss="alert">
								<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
								<strong><?php echo $message; ?></strong> 
								<p>We have send reset password link to your email address.</p>
							</div>
						<?php 	  }?>
						<?php if($status == 'fail')
						{ ?>
							<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert">
								<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
								<strong><?php echo $message; ?></strong> 
							</div>
						<?php }?>
					     <h3 class="register-title ">Forget Password</h3>
                        <!-- sign in with social site 
                        <div class="signin_with_social">
                            <a href="#" class="facebook-logo"><i class="fa fa-facebook"></i>Sign in with Facebook</a>
                            <a href="#" class="twitter-logo"><i class="fa fa-twitter"></i>Sign in with Twitter</a>
                        </div>
                         sign in manual form -->
                       <div class="login_manual_form">
                             <form action="<?php echo $_SERVER["PHP_SELF"];?>" id="regfrm"method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            
                                <button type="submit" name="submit" class="btn bigshop-btn w-100">Submit</button>
                            </form>
                        </div>
                        <!-- forget password -->
                        
						
                    </div>
					
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Login Area End ***** -->
			</div>
			</div>
		</div>
    </section>

    
     <?php include("footer.php");?>
		 
	 
</body>

</html>