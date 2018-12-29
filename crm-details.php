<!DOCTYPE html>
<?php 
	session_start();
	 if(!isset($_SESSION['user_id'])){
	  header("location:login.php");
   }	
	include('admin/config.php');
	$email=$_SESSION['email']; 
	$crm_query=mysqli_query($db,"SELECT * FROM registration WHERE email='$email'");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
  
	<style>
		.error{
			color: #c54848 !important;
		}
	</style>
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
     <?php
		include('header.php');
	 ?>
	<!-- <<<<<<<<<<<<<<<<<<<< My Profile Area Start >>>>>>>>>>>>>>>>>>>>>>>> -->
    <div class="my_profile_area section_padding_50">
        <div class="container">
		<div class="row">
		<div class="col-sm-12">
		  <div class="section_heading new_arrivals">
                <h1><?php echo $_SESSION['reg_type']; ?> Details</h1>
            </div>
		</div>
		</div>
            <div class="row">
			
				<div class="col-12 col-md-3">
					<?php $currentPage = 'CRM Details'; 
						include('sidebar.php'); ?>
				</div>
			<div class="col-12 col-md-9">	
				<?php if($crm_query->num_rows >0){ ?>
				<div class="panel panel-info mt-15">
					<div class="panel-heading">
						<h3 class="panel-title"><?php
						while($row=mysqli_fetch_array($crm_query))
						{
							$employee_id=$row['employee_id'];
							if($employee_id == 0)
							{  
								echo 'No Record Found !';
							} else {
							
							$sql_query=mysqli_query($db,"SELECT * FROM employee_master WHERE id='$employee_id'");
							
							while($crm_detail=mysqli_fetch_array($sql_query))
							{ 
							echo 'CRM Person Name : '. ucfirst($crm_detail['name']); ?></h3>
					</div>
					<div class="panel-body">
					  <div class="row">
						 <div class=" col-md-9 col-lg-9 "> 
							  <table class="table ">
								<tbody>
								  <tr>
									<td>Department:</td>
									<td><?php 
											$department_id=$crm_detail['department'];
											$department_query=mysqli_query($db,"SELECT * FROM department WHERE id='$department_id'");
											while($department_result=mysqli_fetch_array($department_query))
											{
												echo $department_result['name'];
											}
											
									?></td>
								  </tr>
								  <tr>
									<td>Email</td>
									<td><?= $crm_detail['email'];?></td>
								  </tr>
									<td>Phone Number</td>
									<td><?= $crm_detail['mobile_no'];?></td>
									</td>
									   
								  </tr>
									<?php }
						} }
									?>
								</tbody>
							  </table>
							</div>
					  </div>
					</div>
					</div>
				<?php } else { echo 'No Record Found !';  } ?>	
				</div>
			</div>
			 </div>
        </div>
    
    <!-- <<<<<<<<<<<<<<<<<<<< My Profile Area End >>>>>>>>>>>>>>>>>>>>>>>> -->
</body>
	 <?php include("footer.php");?>
	
</script>	 

</html>