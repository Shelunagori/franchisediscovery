<!DOCTYPE html>
<html lang="en">
<?php session_start();
	 if(!isset($_SESSION['user_id'])){
	  header("location:login.php");
   }
	include('admin/config.php'); ?>
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
  

	

</head>

<body>
    <!-- ***** Header Area Start ***** -->
     <?php include("header.php");?>
	
	
    
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
					<?php $currentPage = 'Notification'; 
						include('sidebar.php'); ?>
				</div>
				<div class="col-12 col-md-9">
					<div class="profile_form">
                       <?php 
							$reg_type = $_SESSION['reg_type'];
							$customer_id = $_SESSION['user_id'];

						?>
					    <?php $i = 1;
								$query=mysqli_query($db,"select * from notification where notification_type = 'Bulk' AND user_type = '$reg_type' order by id DESC");
								while($row=mysqli_fetch_array($query)){
									?>
								<div class="view-ticket" style="margin-bottom: 10px;">
									<div class="active item">
										<div class="carousel-info">
											<img alt="" src="<?php echo $row['file_path'];?>" class="pull-left">
										<div class="pull-left">
										 <a href="<?php echo $row['link'];?>" target="_blank"> <span class="view-ticket-name"><?php echo $row['title'];?></span> </a>
										</div>
										 <div class="pull-right">
										 <span class="ticket-time"> <?php echo  date('d-m-y',strtotime($row['created_on']));?></span>
										 </div>
									  </div>
										<div style="padding: 15px;">
											<?php echo $row['details'];?>
										</div>
									</div>
								</div>
							<?php } ?>			

					    <?php $i = 1;
								$query=mysqli_query($db,"select * from notification where notification_type = 'Manual' AND user_type = '$reg_type' AND registration_id = '$customer_id' order by id DESC");
								while($row=mysqli_fetch_array($query)){
									?>
								<div class="view-ticket" style="margin-bottom: 10px;">
									<div class="active item">
										<div class="carousel-info">
											<img alt="" src="<?php echo $row['file_path'];?>" class="pull-left">
										<div class="pull-left">
										 <a href="<?php echo $row['link'];?>" target="_blank"> <span class="view-ticket-name"><?php echo $row['title'];?></span> </a>
										</div>
										 <div class="pull-right">
										 <span class="ticket-time"> <?php echo  date('d-m-y',strtotime($row['created_on']));?></span>
										 </div>
									  </div>
										<div style="padding: 15px;">
											<?php echo $row['details'];?>
										</div>
									</div>
								</div>
							<?php } ?>			
							
							
					</div>
                </div>

              
            </div>
        </div>
    </div>
    <!-- <<<<<<<<<<<<<<<<<<<< My Profile Area End >>>>>>>>>>>>>>>>>>>>>>>> -->
	

     <?php include("footer.php");?>

    <script src="js/jquery.sticky-kit.js"></script>
		  
	<script>
	$("#sidebar").stick_in_parent();
	</script>
	 
		
</body>

</html>