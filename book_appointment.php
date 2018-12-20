<?php
    session_start();
    include('admin/config.php');
    $status="";
    $message="";
    $user_id=$_SESSION['user_id'];
    $email=$_SESSION['email'];
    $first_name=$_SESSION['first_name'];
    $mobile_no=$_SESSION['mobile_no'];
    if(isset($_POST['save']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $city=$_POST['city'];
        $investment=$_POST['investment'];
        $requirement=$_POST['requirement'];
        $message=$_POST['message'];
        $brand_name=$_POST['brand_name'];
        $enquire_type="franchise";
        

         $sql="INSERT INTO enquire(enquire_type,name,email,mobile,city,investment,requirment,brand_name,message)VALUES('$enquire_type','$name','$email','$mobile','$city','$investment','$requirement','$brand_name','$message')";
    $result=mysqli_query($db,$sql);
    if($result>0)
    {
        $status="success";
        $message="Appointment Booked Successfully";
    }
    else
    {
        $status="fail";
        $message="Something Went Wrong!";
    }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title  -->
    <title>Franchise Discovery</title>

    <!-- Favicon  -->
    <link rel="shortcut icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
  
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
	
	
    
	  <!-- <<<<<<<<<<<<<<<<<<<< My Profile Area Start >>>>>>>>>>>>>>>>>>>>>>>> -->
    <div class="my_profile_area section_padding_50">
        <div class="container">
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
		<div class="row">
		<div class="col-sm-12">
		  <div class="section_heading new_arrivals">
                       <h1><?php echo $_SESSION['reg_type']; ?> Details</h1>
					 </div>
					</div>
					</div>
            <div class="row">
			
				<div class="col-12 col-md-3">
				<?php $currentPage = 'Book Appointment'; 
					include('sidebar.php'); ?>
                </div>
        <div class="col-12 col-md-9">      
		<div class="modal-body">
                            <div class="contact_from">
                                <form action="#" method="post" id="main_contact_form">
                                    <div class="contact_input_area">
                                        <div class="contact_input_area" id="top_buyafranchise">
                                                <div id="top_success_fail_info" class="top_success_fail_info"></div>
                                                <div class="row" style="padding:10px;">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="name" id="top_name" value="<?= $first_name; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="email" id="email" value="<?= $email;?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" name="mobile" id="mobile" value="<?= $mobile_no;?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="city" id="city" placeholder="City">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="brand_name" id="top_brand_name" placeholder="Brand Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="investment" id="top_investment" placeholder="Investment">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea name="requirement" class="form-control" id="top_requirment" cols="30" rows="2"  placeholder="Requirement" ></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea name="message" class="form-control" id="top_messageBUF" cols="30" rows="2" placeholder="Your Message"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                            <div class="col-12 text-center">
                                                <button type="submit" name="save" class="btn bigshop-btn">Send Message</button>
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                 </div>
             </div>
         </div>
    <!-- <<<<<<<<<<<<<<<<<<<< My Profile Area End >>>>>>>>>>>>>>>>>>>>>>>> -->
	

     <?php include("footer.php");?>

   
		
</body>

</html>