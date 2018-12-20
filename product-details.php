<?php session_start();
		require('admin/config.php');
	 
		$dataCat =  $_GET['data_row']; 
		$queryStringCat = "SELECT id from categories where seo_name = '$dataCat'";
		$resultStringCat = mysqli_query($db, $queryStringCat);
		$rowStringCat = mysqli_fetch_assoc($resultStringCat);
		$idCat = $rowStringCat['id']; 
		$category_id = 0; 
		if(empty($idCat)) 
		{ header("Location: $baseURL"); die(); }
		else { $category_id = $idCat;  }	 
	 
		$data =  $_GET['rowvalue']; 
		$queryString = "SELECT id from brands where seo_name = '$data' and status = 'Active'";
		$resultString = mysqli_query($db, $queryString);
		$rowString = mysqli_fetch_assoc($resultString);
		$id = $rowString['id']; 
?>
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<head>
    <meta charset="UTF-8">
     <?php	
	 
		if(empty($id)) { header("Location: $baseURL"); die(); }
		$query=mysqli_query($db,"SELECT * FROM page_seo where page_id = 3 and brand_id = '$id'  ");  
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

   <style> .heartColor { color: red; }; </style> 
</head>

<body>
    <!-- ***** Header Area Start ***** -->
     <?php include("header.php");
		$brand_id = 0;
		if(isset($_GET['rowvalue'])){
		$query_brand=mysqli_query($db,"select * from brands where status = 'Active' and id = '$id' ");
		if($query_brand->num_rows > 0)
		{
			while($row_brand=mysqli_fetch_array($query_brand)){ 
			$brand_id = $row_brand['id'];
			$footer_content = $row_brand['footer_content'];
	 ?>
	
			<!-- ***** New Arrivals Area Start ***** -->
			<section class="header-slider section_padding_100 clearfix" style="background-image: url(http://franchisediscovery.in/img/bg-image-5.jpg)">
				<div class="container brand-details-inner">
				
				   <div class="row">
				   <div class="col-sm-4">
				   <div class="brand-details-inner-img">
				   <img src="<?php echo $baseURL; ?><?php echo str_replace('../',"",$row_brand['brand_image']); ?>">
				   </div>
				   </div>
					<div class="col-sm-5">
					 <div class="brand-details-inner-content">
				   <h1> <?php echo $row_brand['name'];  ?></h1>
				   <p> <?php echo $row_brand['address'];  ?></p>
					<span><?php $catID = $row_brand['category_id'];
								$query_cat = "SELECT name FROM categories where id = '$catID'";
								$result_cat = mysqli_query($db, $query_cat);
								$row_cat = mysqli_fetch_assoc($result_cat);
								echo $row_cat['name'];
							?>
					</span>
				   </div>
					<div class="brand-details-inner-ratings">
				   <div class="ratings-1">
				  <div class="ratings-1-top">
					<span ><i class="fa fa-star"> </i> <?php echo $row_brand['avg_rating'];  ?>   </span>
				 </div>
				  <div class="ratings-1-bottom">
				  <span><?php echo $row_brand['rating'];  ?> + ratings</span>
				  </div>
					</div>
					
					 <div class="ratings-1">
					  <div class="ratings-1-top">
						<span ><i class="fa fa-share"> </i> Share  </span>
					 </div>
					 <?php $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
					  <div class="ratings-1-bottom">
							<div class="footer_social_area ">
								<a href="http://www.facebook.com/sharer.php?u=<?php echo $currentURL; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<a href="https://twitter.com/share?url=<?php echo $currentURL; ?>&amp;text=<?php echo $row_brand['name'];  ?>&amp;hashtags=franchisediscovery" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $currentURL; ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
								
								<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							</div>
					  </div>
					</div>
				 </div>

				  <!-- Modal -->
				  <div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog modal-lg">
					  <div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"><?php echo $row_brand['name'];  ?> menu cards</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-12">
									<div class="shortcodes_content">
										<div class="gallery_area">
										<?php $menu_sql = mysqli_query($db,"SELECT * from brand_menu_images where brand_id = '$brand_id'  ");
											if($menu_sql->num_rows > 0)
											{
											while($menu_gallery = mysqli_fetch_array($menu_sql)){ 
											
											if (strpos($menu_gallery['image_path'], '.pdf') !== false)
											{ ?>
												<a target="_blank" href="<?php echo $baseURL; ?><?php echo str_replace('../',"",$menu_gallery['image_path']); ?>">
													<img src="<?php echo $baseURL; ?>img/pdficon.png" width="172" height="183"  />
												</a>						
											<?php } else { ?>	
												<div class="single_gallery_item">
													<a class="gallery_img" href="<?php echo $baseURL; ?><?php echo str_replace('../',"",$menu_gallery['image_path']); ?>">
														<img style="height: 107px;" class="d-block w-100 menuImage" src="<?php echo $baseURL; ?><?php echo str_replace('../',"",$menu_gallery['image_path']); ?>" alt="<?php echo $row_brand['name'];  ?>">
													</a>
												</div>
											<?php	} } } else { echo '<center>No menu card found</center>';  } ?>
										</div>
									</div>
								</div>
							</div>	         
						</div>
						<div class="modal-footer">
						  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					  </div>
					</div>
				  </div>	
				 
				   <div class="rating-footer">
				   <span data-toggle="modal" data-target="#myModal"> <i class="fa fa-cutlery" aria-hidden="true"></i> Our Menu </span>
				    
					  				
					
					<span> 
							<i style="color: #121312;" class="fa fa-leaf" aria-hidden="true"></i> 
								<?php echo $row_brand['food_type'];  ?> 
				    </span>
					
					<?php 
						$fav_class = 'fa-heart-o';
						$user_id = 0;
						if(!empty($_SESSION['user_id']))
						{
    						$user_id = $_SESSION['user_id'];						    
						}

						$queryString = "SELECT * from favrouite where user_id = '$user_id' and  brand_id = '$brand_id'";
						$resultString = mysqli_query($db, $queryString);
						
						if($resultString->num_rows > 0){ 
							$fav_class = 'fa-heart heartColor';	
						}

					?>
					
					<span id="fav"> <i class="fa <?php echo $fav_class; ?>" id="fav-i" aria-hidden="true"></i> Favourite </span>
				   
				   </div>
				   
				   </div>
				   
					  <div class="col-sm-3">
						 <div class="brand-details-inner-offer">
						 
						 <div class="offer-content">
						 <span class="area"> Area Required </span> 
						 <span class="size"><?php echo $row_brand['area_reqired'];?></span> 
						 <span class="investment"> Investment Range   </span> 
							 <span class="range"> INR <?php echo $row_brand['investment_range_in_words'];?>  </span> 
							 
							 <span class="outlet"> Franchise Outlets   </span> 
							 <span class="number"> <?php echo $row_brand['franchise_outlets'];?>   </span> 
						 </div>
						 </div>
					  </div>
					
				</div>
			</section>
		<?php } ?>
			<!-- ***** New Arrivals Area End ***** -->


			<!-- ***** New Arrivals Area Start ***** -->
<?php $activeCount = 1;
		$brandDetail = mysqli_query($db,"select * from brand_details where brand_id = '$brand_id' ");
		if($brandDetail->num_rows > 0)
		{ 	?>	
			<section class="">
					<div class="container">
					 <div class="row">
						<div class="col-12 col-md-4 ">
							<div class=" sidebar" id="sidebar">
							<h3> Brand Details </h3>
							 <div class="nav">
								<?php while($row_detail=mysqli_fetch_array($brandDetail)){ 
								if(!empty($row_detail['left_menu_name'])) 
								   { ?>
										<a class="nav-item nav-link  <?php if($activeCount == 1) { echo 'active'; } $activeCount++; ?> " id="nav-profile-tab" data-toggle="tab" href="#<?php echo $row_detail['id']; ?>" role="tab" aria-controls="nav-home<?php echo $row_detail['id']; ?>" aria-selected="false"> <?php echo $row_detail['left_menu_name']; ?> </a>
									<?php 
									} 
								} ?>	
									
							</div>
							</div>
						</div>
						
						<div class="col-12 col-md-8">
						   <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
								<?php $sno = 1;
								$brandDetail_nw = mysqli_query($db,"select * from brand_details where brand_id = '$brand_id' ");
								while($row_detailContent=mysqli_fetch_array($brandDetail_nw)){ 
								if(!empty($row_detailContent['left_menu_name'])) {
										$brandID = 	$row_detailContent['brand_id'];
										$brandDetailID = 	$row_detailContent['id'];
									?>
									<div class="tab-pane fade <?php if($sno == 1) { echo 'show active'; } $sno++; ?> " id="<?php echo $row_detailContent['id']; ?>" role="tabpanel" aria-labelledby="nav-home<?php echo $row_detailContent['id']; ?>">
									
										<p> <?php 
										    if($row_detailContent['left_menu_name'] != 'Brand Origin')
                                            { echo $row_detailContent['content'];  } ?> </p>
											<div class="form-row">
												<?php if($row_detailContent['is_country'] == 'Yes') { ?>
														<div class="col-sm-4 mb-4">
														  <div class="card h-100">
															<h3 class="card-header">Country</h3>
															<div class="card-body">
															<p class="card-text">
															<?php
															$country = mysqli_query($db,"SELECT brand_country.id,brand_country.country_id, country.name FROM brand_country INNER JOIN country ON (brand_country.country_id = country.id) where brand_country.brand_detail_id = '$brandDetailID' and brand_country.brand_id = '$brandID' ");
															
															while($row_county = mysqli_fetch_array($country)){
																echo $row_county['name'];
															}
															?>
															  </p>
															</div>
														   
														  </div>
														</div>
												<?php } ?>
												<?php if($row_detailContent['is_state'] == 'Yes') { ?>

														<div class="col-sm-4 mb-4">
														  <div class="card h-100">
															<h3 class="card-header">State</h3>
															<div class="card-body">
															<p class="card-text">
															<?php
															$state = mysqli_query($db,"SELECT brand_state.id,brand_state.state_id, state.name FROM brand_state INNER JOIN state ON (brand_state.state_id = state.id) where brand_state.brand_detail_id = '$brandDetailID' and brand_state.brand_id = '$brandID' ");
															
															while($row_state = mysqli_fetch_array($state)){
																echo $row_state['name'].',';
															}
															?>
															  </p>
															</div>
														   
														  </div>
														</div>												
													<?php } ?>
												
												<?php if($row_detailContent['is_city'] == 'Yes') { ?>

														<div class="col-sm-4 mb-4">
														  <div class="card h-100">
															<h3 class="card-header">City</h3>
															<div class="card-body">
															<p class="card-text">
															<?php
															$country = mysqli_query($db,"SELECT brand_city.id,brand_city.city_id, cities.name FROM brand_city INNER JOIN cities ON (brand_city.city_id = cities.id) where brand_city.brand_detail_id = '$brandDetailID' and brand_city.brand_id = '$brandID'  ");
															
															while($row_county = mysqli_fetch_array($country)){
															echo	$row_county['name'].',';
															}
															?>
															  </p>
															</div>
														  </div>
														</div>
												<?php } ?>
											</div>

										<?php if($row_detailContent['is_gallery'] == 'Yes') { ?>
										<div class="row">
														<div class="col-12">
															<div class="shortcodes_content">
																<div class="gallery_area">
															<?php 
																	$gallery = mysqli_query($db,"select * from brand_gallery where  brand_id = '$brandID'");
																	if(!empty($gallery))
																	{
																	while($row_gallery = mysqli_fetch_array($gallery)){ ?>
																		
																	<div class="single_gallery_item" style="width: 30% !important;">
																		<a class="gallery_img" href="<?php echo $baseURL; ?><?php echo str_replace('../',"",$row_gallery['gallery_image_path']); ?>">
																			<img style="height: 180px;" class="d-block w-100" src="<?php echo $baseURL; ?><?php echo str_replace('../',"",$row_gallery['gallery_image_path']); ?>" alt="First slide">
																		</a>
																	</div>
																	<?php	} } else { echo 'No Images Found';  } ?>																
																	
																</div>
															</div>
														</div>
													</div>												
											<?php } ?>
									</div>
								<?php } 
								} ?>
							</div>
						</div>
					</div>
		  
				</div>
			</section>
		<?php } } } else { ?>  
		
				<div class="popular_section_heading mb-30 mt-30">
					<h2 class="title-text">No data found</h2>
				</div>				
		
		<?php }    ?>
 <?php include("footer.php");?>
 <input type="hidden" id="url" value="<?php echo $baseURL."ajax_favourite.php"; ?>" />
<script>
	$(document).ready(function(){ 
		$('#fav').click(function(){ 
			var userID = <?=$user_id?>;
			if(userID > 0)
			{
				var brand_id = <?=$id?>;
				var url_data = $('#url').val();
				$.ajax({
						type: "GET",
						async: false,
						url: url_data,
						data: "brand_id="+brand_id,
						cache: false,
						success: function(result){
							if(result == 1)
							{
								$('#fav-i').addClass('fa-heart-o');
								$('#fav-i').removeClass('fa-heart');
								$('#fav-i').removeClass('heartColor'); 							
								alert('Removed from favourite list !');
								
							}
							if(result == 2)
							{
								$('#fav-i').removeClass('fa-heart-o');
								$('#fav-i').addClass('fa-heart'); 
								$('#fav-i').addClass('heartColor'); 
								alert('Brand added to favourite list !');
								
							}
							if(result == 3)
							{
								$('#fav-i').removeClass('fa-heart-o');
								$('#fav-i').removeClass('fa-heart'); 
								$('#fav-i').removeClass('heartColor');
								alert('Something went wrong !');
								
							}
							
						}
					});				
			}else { 
					window.location="http://franchisediscovery.in/login.php";
				}

			});
	});
	
	$('.menuImage').click(function(){
		 $('#myModal').modal('hide');
	});
	
	$('a.fistLink').addClass('active');	
	
	$('a.nav-link').click(function (){
			$('a.nav-link').removeClass('active');
			$(this).addClass('active');	
			var id = $(this).attr('href');		
			$('div.tab-pane').removeClass('show');
			$('div.tab-pane').removeClass('active');
			$('div'+id).addClass('show');
			$('div'+id).addClass('active');
	});
</script>
</body>
</html>
 