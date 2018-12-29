<!DOCTYPE html>
<html lang="en">
<?php 
	session_start();
	 if(!isset($_SESSION['user_id'])){
	  header("location:login.php");
   }	
	include('admin/config.php');
	$user_id=$_SESSION['user_id']; 
	
	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		$id = $_GET['id'];
		$sql = "delete from favrouite where id = '$id'";
		if ($db->query($sql) === TRUE) {
			echo '<script>alert("Brand removed from favourite list !");</script>';
			echo ' <script type="text/javascript">  window.location="favourite.php";</script>';
			
		} else {
			echo '<script>alert("Something went wrong !");</script>';
			echo '<script type="text/javascript">  window.location="favourite.php";</script>';
		}
		
	}
	
?>
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
	
	

  
		
    <!-- >>>>>>>>>>>>>>>> Message Now Area Start <<<<<<<<<<<<<<<< -->
    <div class="message_now_area section_padding_50" id="contact">
        <div class="container">
		 <div class="row">
                <div class="col-12">
                    <div class="section_heading new_arrivals">
                        <h1><?php echo $_SESSION['reg_type']; ?> Details</h1>
					</div>
				</div>
            </div>
		    
            <div class="row">
				<div class="col-12 col-md-3">
					<?php $currentPage = 'Brand'; 
						include('sidebar.php'); ?>
				</div>
			
                <div class="col-12 col-md-9">	
					<div>
						<a class="btn btn-info btn-rounded btn-sm pull-right" href="brand_add_new.php">
							<span style="color:#fff;" class="fa fa-plus"></span> Add New Brand
						</a>
					</div>					
					<?php 
						 $query = "select * from brands where registration_id = '$user_id' and status = 'Active' order by id DESC ";
						 
						  $query_result=mysqli_query($db,$query); 
						  $sno = 1;
						  if($query_result->num_rows >0){ 
					?>
                    <div class="cart-table clearfix">
						<table class="table table-responsive" style="font-size: 12px!important;">
                        	<thead>
									<tr>
										<th>S.No.</th>
										<th>Image</th>
										<th>Name</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php while($row=mysqli_fetch_array($query_result)){ 
									$brand_id = $row['id'];
									?>
									<tr role="row" class="odd">
									  <td> <?php echo $sno; ?> </td>	
										<td>  <center>
												<img src="<?php echo str_replace('../',"",$row['brand_image']);?>" style="width: 70px;height: 50px;" />
											</center> 
										</td>
									    <td><?php echo $row['name']; ?></td>
										<td><?php echo $row['is_approve']; ?></td>
										<td>
											<a class="btn btn-info btn-rounded btn-sm" href="brand_edit.php?rowvalue=<?php echo base64_encode($row['id']); ?>">
												<span style="color:#fff;" class="fa fa-edit"></span>
											</a>

											<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ? you want to delete this brand !')" href="brand_user_delete.php?id=<?php echo base64_encode($row['id']); ?>">
												<span style="color:#fff;" class="fa fa-times"></span>
											</a>
										</td>
									</tr>													
									<?php $sno++; } ?>	
								</tbody>
							</table>								
							<?php  } else {  echo 'No Record Found !';  } ?>	   
						
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