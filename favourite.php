<!DOCTYPE html>
<html lang="en">
<?php 
	session_start();
	include('admin/config.php');
	 if(!isset($_SESSION['user_id'])){
	  header("location:login.php");
   }	
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
					<?php $currentPage = 'Favourite List'; 
						include('sidebar.php'); ?>
				</div>
			
                <div class="col-12 col-md-9">	

                    <div class="cart-table clearfix">
						<?php
							$query = "SELECT brands.name, brands.brand_image,favrouite.id,favrouite.brand_id, brands.seo_name, brands.investment_range_in_words, brands.franchise_outlets, categories.seo_name AS cat_seo FROM favrouite INNER JOIN brands ON (favrouite.brand_id = brands.id)INNER JOIN categories ON (brands.category_id = categories.id) where favrouite.user_id = '$user_id' "; 
							$fav_query=mysqli_query($db,$query);
							if($fav_query->num_rows > 0)
							{
							?>
						<table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-trash-o" aria-hidden="true"></i></th>
                                    <th>Logo</th>
                                    <th>Brand Name</th>
                                    <th>Investment Range </th>                                
                                    <th>Franchise Outlets</th>
                                </tr>
                            </thead>
                            <tbody>
							
								<?php
									while($row=mysqli_fetch_array($fav_query))
									{
								?>
								<tr>
                                    <td class="action"><a onclick="return confirm('Are you sure ? you want to delete this brand')" href="favourite.php?id=<?php echo $row['id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                    <td class="cart_product_img">
                                        <a href="<?php echo $baseURL; ?>brand-detail/<?php echo $row['cat_seo']; ?>/<?php echo $row['seo_name']; ?>"><img src="<?php echo $baseURL; ?><?php echo str_replace('../',"",$row['brand_image']); ?>" alt="brand"></a>
                                    </td>
                                    <td class="cart_product_desc">
                                        <h5><?php echo $row['name']; ?></h5>
                                    </td>
                                    <td class="price"><span>INR <?php echo $row['investment_range_in_words']; ?></span></td>
                                   
                                    <td class="total_price"><span><?php echo $row['franchise_outlets']; ?></span></td>
                                </tr>
									<?php } ?>
                           </tbody>
						</table>
						<?php } else { echo '<p> <center>Empty Favourite List</center> </p>'; } ?>
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