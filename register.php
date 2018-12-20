<!DOCTYPE html>
<?php include("admin/config.php");
	$status = '';
	$message = '';
	if(isset($_POST['save']))
	{	
		$brand_name = mysqli_real_escape_string($db,$_POST['brand_name']);
		$company_name = mysqli_real_escape_string($db,$_POST['company_name']);
		
		$first_name = mysqli_real_escape_string($db,$_POST['first_name']);
		$last_name = mysqli_real_escape_string($db,$_POST['last_name']);
		$mobile_no = mysqli_real_escape_string($db,$_POST['mobile_no']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$create_password = mysqli_real_escape_string($db,$_POST['create_password']);
		$reg_type = mysqli_real_escape_string($db,$_POST['reg_type']);
		$Username = ucfirst($first_name) ." ". $last_name;
		
		$sql = "INSERT INTO registration(first_name,last_name,mobile_no,email,password,reg_type,company_name,brand_name) VALUES ('$first_name','$last_name','$mobile_no','$email','$create_password','$reg_type','$company_name','$brand_name')";
		
		if ($db->query($sql) === TRUE) {
		if($reg_type == 'Brand') { 
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
							
							<p><strong>Hey '.$Username .'!</strong></p>
							<p>Thank you for signing up. We are happy to have you onboard. Franchise Discovery is a young company that is growing quickly to accommodate more and more brands and investors, both domestic and international. We love serving our customers, offering them a service that’s impeccable and distinguished. We pride ourselves in knowing the market well and being able to cater to a vast number of individuals who want their brand to be seen within the franchise community. 
							Franchise Discovery is a great place to display your brand listing. We have a huge investor traffic that is always looking out to discover new brands and be able to invest their time and efforts. Make sure that your brand gives out details thoroughly for better visibility and page views. 
							Use this platform to display your brand, modify information of your listing and see what other brands are doing. For any information or query, do get in touch with us on info@franchisediscovery.in
							</p>
							<p>Please click below link for verify your email address:<br></p>
							<p> <a href="http://franchisediscovery.in/verify.php?data='.base64_encode($email).'" target="_blank" >Verify</a>.</p> 
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
		}else
		{
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
							
							<p><strong>Hey '.$Username .'!</strong></p>
							<p>Thank you for signing up. We are happy to have you onboard. Franchise Discovery is a young company that is growing quickly to accommodate more and more brands and investors, both domestic and international. We love serving our customers, offering them a service that’s impeccable and distinguished. We pride ourselves in knowing the market well and being able to cater to a vast number of individuals who want their brand to be seen within the franchise community. 
							As an investor you have access to many brands that are onboard. You can choose to take up a franchise or a Master franchise with the brands listed according to the information provided. You are assured free consultancy from Franchise Discovery on brands according to your location and investment. 
							Franchise Discovery is a platform that matches brands to the investors and takes delight in helping investors find the right franchise. Should you have any query regarding a brand or other details, do get in touch with us on info@franchisediscovey.in

							</p>
							<p>Please click below link for verify your email address:<br></p>
							<p> <a href="http://franchisediscovery.in/verify.php?data='.base64_encode($email).'" target="_blank" >Verify</a>.</p> 
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
		}			
			
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
			  $mail->AddAddress($email,$Username);
			  $mail->SetFrom('noreply@franchisediscovery.in', 'Franchise discovery');
			  $mail->mailtype = 'html';
			  $mail->charset = 'iso-8859-1';
			  $mail->wordwrap = TRUE;
			  $mail->Subject = 'Thank you for registering with Franchise discovery';
			  $mail->AltBody = 'Thank you for registering with Franchise discovery !'; 
			  $mail->MsgHTML($dataMsg);
			  $mail->Send();
			  
			} catch (phpmailerException $e) {
			  //echo $e->errorMessage(); exit;
			} catch (Exception $e) {
			  //echo $e->getMessage();  exit;
			} 		
			$status = 'success';
			$message = 'Confirm Your Email Address';
		} else {
			$status = 'fail';
			$message = 'Something went wrong !!';
		}
	}
?>
 
<html lang="en">

<head>
    <meta charset="UTF-8">
     
    <title>Franchise Discovery</title>

    <!-- Favicon  -->
    <link rel="shortcut icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
  
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125394826-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125394826-1');
  
  
</script>	

<style>
	input[type="radio"]{
  margin: 0 10px 0 10px;
}
}
.body
{
	font-size:14px !important;
}


</style>
	
<style>
.error{
	    color: #c54848 !important;
}
</style>
</head>

<body>
	<?php
		include('header.php');
	?>
    <!-- ***** Header Area Start ***** -->
    
	
	

    <!-- ***** New Arrivals Area Start ***** -->
    <section class="  clearfix ">
        <div class="container ">
           
		    
			
		   <div class="row top-brands">
           <div class="col-sm-12">
			 <!-- ***** Login Area Start ***** -->
    <div class="bigshop_reg_log_area bg-img " style="background-image: url(img/bg-img/login.jpg);">
        <div class="container">
		
            <div class="row justify-content-center">
		
                <div class="col-12 col-md-8">
				
                    <div class="register_form text-center">
						<?php if($status == 'success')
						{ ?>
							<div class="alert alert-success" style="color: #7DBFCF;background-color: #e4f3fa;border-color: #e4f3fa;" role="alert">
								<button type="button" class="close" data-dismiss="alert">
								<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
								<strong><?php echo $message; ?></strong> 
								<p>A confirmation email has been sent. Click on the confirmation link in the email to activate your account.</p>
							</div>
						<?php }?>
						<?php if($status == 'fail')
						{ ?>
							<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert">
								<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
								<strong><?php echo $message; ?></strong> 
							</div>
						<?php }?>	
                        <h3 class="register-title">Sign up for free</h3>
                        <form name="frm" id="regfrm" action="#" method="post" class="text-left" enctype="multipart/form-data">
							<div class="form-group">
								
								<div class="col-md-9">
									<input type="radio" class="radio-inline" name="reg_type"  value="Brand" checked>Brand 
									<input type="radio" class="radio-inline"  name="reg_type"  value="Investor">Investor	
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="user_name">First Name</label>
									<input type="text" class="form-control"  id="first_name" name="first_name"placeholder="" required>
								</div>
								<div class="form-group col-md-6">
									<label for="user_name">Last Name</label>
									<input type="text" class="form-control" id="last_name" name="last_name"placeholder="" required>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="user_name">Mobile No</label>
									<input type="text" class="form-control" id="mobile_no"  name="mobile_no" required>
								</div>
								<div class="form-group col-md-6">
									<label for="email">Email address</label>
									<input type="email" class="form-control" id="email"  name="email" aria-describedby="emailHelp" placeholder="" required>
								</div>
							</div>
							
							<div class="row" id="brandDiv">
								<div class="form-group col-md-6">
									<label for="user_name">Brand Name</label>
									<input type="text" class="form-control"  id="brand_name" name="brand_name" placeholder="" required>
								</div>
								<div class="form-group col-md-6">
									<label for="user_name">Company Name</label>
									<input type="text" class="form-control" id="company_name" name="company_name" placeholder="" required>
								</div>
							</div>
							
							
							<div class="row">
								<div class="form-group col-md-6">
									<label for="create_password">Create Password</label>
									<input type="password" name="create_password" id="create_password" class="form-control" aria-describedby="passwordHelpBlock" required>
									<!--<small id="passwordHelpBlock" class="form-text text-muted">Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.</small>-->
								</div>
								<div class="form-group col-md-6">
									<label for="confirm_password">Confirm Password</label>
									<input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
								</div>
							</div>	
							<div class="row">
								<div class="form-group col-md-12">
									<small id="passwordHelpBlock" class="form-text text-muted">Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.</small>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-12">
									<button type="submit" name="save" 	class="btn bigshop-btn w-100">Sign Up</button>
								</div>
							</div>	
                        </form>
                        <div class="forget_pass mt-15">
                            <a href="login.php">Already have a account? Login</a>
                        </div>
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
	 
	
	

 </body>   
     <?php include("footer.php");?>
	<script src="<?php echo $baseURL; ?>js/jquery.validate.min.js"></script>	
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>		
	<script>
		$(document).ready(function(){
			$('#regfrm').validate({
				rules:{
					first_name:{
						required:true,
					 lettersonly: true ,
					 minlength:3
						
					},
					last_name:{
						required:true,
						lettersonly: true ,
						minlength:3
					},
					brand_name:{
						required:true
					},
					company_name:{
						required:true
					},
					mobile_no:{
						required:true,
						number:true,
						minlength:10,
						maxlength:10
					},
					email:{
						required:true,
						email:true,
						remote :{
							url:"check-email.php",
							type:"post",
							data:{
								id: function()
								{
									return $('#regfrm :input[name="id"]').val();
								}
							}
						}
					},
					create_password:{
						required:true,
						minlength: 8,
						maxlength:20
					},
					confirm_password:{
						 equalTo: "#create_password"
					}
				},
				messages:{
					first_name:{
						required:"First name is required",
						lettersonly:"Alphabets only"
					
					},
					last_name:{
						required:"Last name is required",
						lettersonly:"Alphabets only"

					},
					mobile_no:{
						required:"Mobile no is required"
					},
					email:{
						required:"Email is required",
						 remote: "Email id already exist."
					},
					create_password:{
						required:"Password is required"
					},
					confirm_password:{
						required:"Confrim Password is required",
						equalTo:"Enter same password"
					},
				}
			});
		});
		
		$(document).ready(function() {
			$('input[type=radio][name=reg_type]').change(function() {
				if (this.value == 'Brand') {
					$('#brandDiv').show();
				}
				else if (this.value == 'Investor') {
					$('#brandDiv').hide();
				}
			});		
		});				
	</script>
</html>