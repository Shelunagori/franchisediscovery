<?php 	session_start();
    include("admin/config.php");
	$status = '';
	$message = '';
	if(isset($_POST['save']))
	{		
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$sql = "SELECT * FROM registration WHERE email='$email' AND password='$password' " ;
		$rs = $db->query($sql);
		while($row=mysqli_fetch_array($rs))
		{
		$user_id=$row['id'];
		$reg_type=$row['reg_type'];
		$status=$row['status'];
		$email=$row['email'];
		$password=$row['password'];
		$mobile_no=$row['mobile_no'];
		$first_name=$row['first_name'];
		$last_name=$row['last_name'];
		$profile=$row['profile'];
	    $_SESSION['user_id']=$user_id;
		$_SESSION['reg_type']=$reg_type;
		 $_SESSION['email']=$email;
		$_SESSION['password']=$password;
		$_SESSION['mobile_no']=$mobile_no;
		$_SESSION['first_name']=$first_name;
		$_SESSION['last_name']=$last_name;
		$_SESSION['profile']=$profile;

		}
		if ($rs->num_rows > 0) 
		{	
			if($status==1)
			{
			    $status = 'success';
			    $message = 'Login successfully !';
			    header("Location: manage-profile.php", true, 301); exit();
			  //echo ' <script type="text/javascript">  window.location="http://franchisediscovery.in/manage-profile.php";</script>';
		    }
			else{
				$status = 'fail';
				$message = 'Please verify your email address!';
			}
			
		}				
		else 
		{
			$status = 'fail';
			$message = 'Invalid email & password!!';
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
					     <h3 class="register-title ">Login</h3>
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
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Example : xyz@gmail.com" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                                <div class="form-check">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customChe">
                                        <label class="custom-control-label" for="customChe">Remember Me</label>
                                    </div>
                                </div>
                                <button type="submit" name="save" class="btn bigshop-btn w-100">Submit</button>
                            </form>
                        </div>
                        <!-- forget password -->
                        <div class="forget_pass mt-15">
                            <a href="#">Forget Password?</a>
                        </div>
						<div class="text-center">
						<a href="<?php echo $baseURL; ?>register.php" class="btn bigshop-btn bigshop-btn-sm">Sign Up</a>
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

    
     <?php include("footer.php");?>
		 
	 
</body>

</html>