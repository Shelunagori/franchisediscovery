<?php session_start();
date_default_timezone_set("Asia/Calcutta");
	require('admin/config.php');
	$status="";
	$message="";
	if(isset($_POST['submit']))
	{
			$first_name=$_POST['f_name'];
			$last_name=$_POST['l_name'];
			$email=$_POST['email'];
			$subject=$_POST['subject'];
			$message=$_POST['message'];
			$created_on = date("d-M-Y h:i:s A");
			$feedback_query="INSERT INTO feedback(first_name,last_name,email,subject,message) VALUES ('$first_name','$last_name','$email','$subject','$message','$created_on')";
			$feedback_result=mysqli_query($db,$feedback_query);
			if($feedback_result)
			{
				$status = 'success';
				$message = 'feedback addded successfully !';
			} else {
				$status = 'fail';
				$message = 'Something went wrong !';
			}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
      
    <!-- Title  -->
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
	
	

  
		
    <!-- >>>>>>>>>>>>>>>> Message Now Area Start <<<<<<<<<<<<<<<< -->
    <div class="message_now_area section_padding_50" id="contact">
        <div class="container">
		 <div class="row">
		  <div class="col-md-12">
			<?php if($status == 'success')
			{ ?>
				<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong><?php echo $message; ?></strong> 
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

		 </div>
			
                <div class="col-12">
                    <div class="section_heading new_arrivals text-center">
                        <h1>Feedback</h1>
                    </div>
                </div>
            </div>
		    
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
                                            <input type="text" class="form-control" name="f_name" id="f-name" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="l_name" id="l-name" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your E-mail" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="subject" class="custom-select w-100">
                                              <option selected>Subject</option>
                                              <option value="1">Delivery Info</option>
                                              <option value="2">Payment Process</option>
                                              <option value="3">Quality Issues</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="3" placeholder="Your Message *" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn bigshop-btn" name="submit">Send Message</button>
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

    <!-- Map Area Start -->
           
        </div>
    </section>

    
     <?php include("footer.php");?>
		 
	 
</body>

</html>