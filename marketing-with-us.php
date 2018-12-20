<!DOCTYPE html> <?php session_start(); require('admin/config.php'); ?>
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
  
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125394826-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125394826-1');
</script>
	

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
					<?php $currentPage = 'Marketing With Us'; 
						include('sidebar.php'); ?>
                </div>
				<div class="col-12 col-md-6">
                    <div class="profile_form">
                     	<?php 
						$query=mysqli_query($db,"SELECT * FROM footer_pages_detail where page_id = 27");  
						if($query->num_rows > 0){  
						while($row=mysqli_fetch_array($query)){ 
							echo $row['detail'];
						}
						} ?>
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