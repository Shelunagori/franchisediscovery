<?php 	session_start();
    include("admin/config.php");
	$status = '';
	$message = '';
	$id=base64_decode($_GET['datarow']);
	$email=base64_decode($_GET['data']);
	if(isset($_POST['submit']))
	{		
		$new_password=$_POST['password'];
		$confirm_password=$_POST['confirm_password'];
		$sql="UPDATE registration SET password='$new_password' WHERE id='$id' AND email = '$email' ";
		$result=mysqli_query($db,$sql);
		if($result)
		{
			$_SESSION['passwordChanged']=1;
			header('location:login.php');
		}else
		{
			$status = 'fail';
			$message = 'Something went wrong';
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
					<?php if($status == 'success')
						{ ?>
							<div class="alert alert-success" role="alert">
								<button type="button" class="close" data-dismiss="alert">
								<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
								<strong><?php echo $message; ?></strong> 
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
					     <h3 class="register-title ">Reset Password</h3>
              
					  <?php
					  
						$sql="select * from registration where email='$email' AND id='$id'";
						$result=mysqli_query($db,$sql);
						$count=mysqli_num_rows($result);
						$rowDaata=mysqli_fetch_array($result);
						if($count > 0)
						{
					  
					  ?>
							<div class="login_manual_form">
								 <form  id="regfrm" method="post" enctype="multipart/form-data">
								   <div class="form-group">
										<label for="password">New Password</label>
										<input type="password" id="password" class="form-control" name="password" required>
									</div>
									 <div class="form-group">
										<label for="password">Confirm Password</label>
										<input type="password" id="confirm_password" class="form-control" name="confirm_password" required>
									</div>
									<button type="submit" name="submit" class="btn bigshop-btn w-100">Submit</button>
								</form>
							</div>
						<?php  } else { ?>
							
								<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert">
								<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
								<strong>Something went wrong !</strong> 
							</div>
							
						<?php } ?>
                        
						
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
<script src="<?php echo $baseURL; ?>js/jquery.validate.min.js"></script>	
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>		
	<script>
		$(document).ready(function(){
			$('#regfrm').validate({
				rules:{
					
					password:{
						required:true,
						minlength: 8,
						maxlength:20
					},
					confirm_password:{
						 equalTo: "#password"
					}
				},
				messages:{
					
					password:{
						required:"Password is required"
					},
					confirm_password:{
						required:"Confrim Password is required",
						equalTo:"Enter same password"
					},
				}
			});
		});
</script>