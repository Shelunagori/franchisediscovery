<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
      <?php	session_start();
		date_default_timezone_set("Asia/Calcutta");
		require('admin/config.php');
		$status="";
        $message="";
        if(isset($_POST['submit']))
        {
               $first_name=$_POST['first_name'];
               $email=$_POST['email'];
               $mobile_no=$_POST['mobile_no'];
               $subject=$_POST['subject'];
               $city=$_POST['city'];
               $message=$_POST['message'];
			   $created_on = date("d-M-Y h:i:s A");
                $contact_query="INSERT INTO contact_us(first_name,email,mobile_no,subject,city,message,created_on)VALUES('$first_name','$email','$mobile_no','$subject','$city','$message','$created_on')";
            $contact_result=mysqli_query($db,$contact_query);
                if($contact_result)
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
										<p>Dear Sir, </p>
										<p>Below details are provided by the customer on contact with us form</p>
										<p>Name: '.$first_name.'</p>
										<p>Email: '.$email.'</p>
										<p>Mobile: '.$mobile_no.'</p>
										<p>Subject: '.$subject.'</p>
										<p>City: '.$city.'</p>
										<p>Message: '.$message.'</p>
										<p>Created On: '.$created_on.'</p>															
							
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
						$emailTO = 'shyam@franchisediscovery.in';
						
						$mail->IsSMTP(); // telling the class to use SMTP

						  try {
						  $mail->Host       = "smtp.gmail.com"; 
						  $mail->SMTPDebug  = 0;
						  $mail->SMTPAuth   = true; 
						  $mail->Port       = 587; 
						  $mail->SMTPSecure = 'tls';	 	
						  $mail->Username   = "noreply@franchisediscovery.in"; 
						  $mail->Password   = "ngsgG!79eoZa";        
						  $mail->AddAddress($emailTO,$emailTO);
						  $mail->SetFrom('noreply@franchisediscovery.in', 'Franchise discovery');
						 
						  $mail->mailtype = 'html';
						  $mail->charset = 'iso-8859-1';
						  $mail->wordwrap = TRUE;
						  $mail->Subject = 'Advertise With Franchise discovery';
						  $mail->AltBody = 'Advertise With Franchise discovery'; 
						  $mail->MsgHTML($dataMsg);
						  $mail->Send();
						  
						} catch (phpmailerException $e) {
						  //echo $e->errorMessage();
						} catch (Exception $e) {
						  //echo $e->getMessage(); 
						}	


			
                    $status="success";
                    $message="Thank you ! Our Team will connect with you shortly.";
                }
                else
                 {
                    $status="fail";
                    $message="Something went wrong !";
                }
        }		
		$query=mysqli_query($db,"SELECT * FROM page_seo where page_id = 6 ");  
		if($query->num_rows > 0){  
		while($row=mysqli_fetch_array($query)){
		?>

		
				<title><?php echo $row['title']; ?></title>
				<meta name="description" content="<?php echo $row['meta_description']; ?>" />
				<meta name="keywords" content="<?php echo $row['meta_keywords']; ?>"/>
				<meta name="robots" content="<?php echo $row['meta_robots']; ?>" />
				<meta name="abstract" content="<?php echo $row['meta_abstract']; ?>">
				<meta name="topic" content="<?php echo $row['meta_topic']; ?>">
				<meta name="url" content="<?php echo $row['meta_url']; ?>">

				<meta itemprop="name" content="<?php echo $row['g_name']; ?>">
				<meta itemprop="description" content="<?php echo $row['g_description']; ?>">
				<meta itemprop="image" content="<?php echo $row['g_image']; ?>">

				<meta name="twitter:title" content="<?php echo $row['t_title']; ?>">
				<meta name="twitter:description" content="<?php echo $row['t_description']; ?>">
				<meta name="twitter:image:src" content="<?php echo $row['t_image']; ?>"> 


				<meta property="og:title" content="<?php echo $row['og_title']; ?>" />
				<meta property="og:type" content="<?php echo $row['og_type']; ?>" />
				<meta property="og:url" content="<?php echo $row['og_url']; ?>" />
				<meta property="og:image" content="<?php echo $row['og_image']; ?>" />
				<meta property="og:description" content="<?php echo $row['og_description']; ?>" />
				<meta property="og:site_name" content="<?php echo $row['og_site_name']; ?>" />
				<meta property="fb:admins" content="<?php echo $row['fb_admins']; ?>" />
				<link rel="canonical" href="<?php echo $row['canonical']; ?>"/>		
		<?php } } ?>	

 
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

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1345039395633205');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1345039395633205&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
	

</head>

<body>
    <!-- ***** Header Area Start ***** -->
     <?php include("header.php");?>
	
	

      <!-- Map Area Start -->
	  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235.45069891444865!2d72.8588785427245!3d19.229625930209085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b1c25915ea33%3A0xee1bb2214496e0e6!2sFranchise+Discovery!5e0!3m2!1sen!2sin!4v1542473772459" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
	  
	  

		
    <!-- >>>>>>>>>>>>>>>> Message Now Area Start <<<<<<<<<<<<<<<< -->
    <div class="message_now_area section_padding_50" id="contact">
        <div class="container">
		 <div class="row">
                <div class="col-12">
                    <div class="section_heading new_arrivals text-center">
                        <h1>Contact Us</h1>
                    </div>
                </div>
            </div>
			
	<?php if($status == 'success')
                        { ?>
                            <div style="width: 64%;margin-left:18%;" class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <strong><?php echo $message; ?></strong> 
                            </div>
                        <?php     }?>
                        <?php if($status == 'fail')
                        { ?>
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <strong><?php echo $message; ?></strong> 
                            </div>
                        <?php }?>			
		    
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="contact_from">
                        <form action="#" method="post" id="main_contact_form">
                            <!-- Message Input Area Start -->
                            <div class="contact_input_area">
                                <div id="success_fail_info"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                         <div class="form-group">
                                            <input type="text" class="form-control" name="first_name" id="f-name" placeholder="Name" required>
                                            </div>
                                            <div class="form-group">
                                              <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="Mobile No" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                                            </div>

										 <div class="form-group">
                                                <input type="text" class="form-control" name="city" id="city" placeholder="City" required>
                                            </div>

										<div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="3" placeholder="Your Message" required></textarea>
                                        </div>
										 <div class="col-12 text-center">
                                        <button type="submit" name="submit" class="btn bigshop-btn">Send Message</button>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
									<div class="address">
									<p> <strong> Address </strong> </p>
									<p> 506-507, Nirma Plaza, Makwana Road, Opp. Antriksh Building, Andheri East 400059.</p>
										<p> <strong> Landline Number</strong> </p>
										<p> 022-49746583 / 022-49746584 </p>
										<p> <strong> Email</strong> </p>
										<p> <a href="mailto:">  info@franchisediscovery.in </a> </p>
									</div>
									</div>
                                   
                                  
                                   
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- >>>>>>>>>>>>>>>> Message Now Area Start <<<<<<<<<<<<<<<< -->


            
        </div>
    </section>

    
     <?php include("footer.php");?>
		 
	 
</body>

</html>