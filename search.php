<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <?php	
	   session_start();
		require('admin/config.php');
		$query=mysqli_query($db,"SELECT * FROM page_seo where page_id = 4 ");  
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


    
 </head>

<body>
    <?php include("header.php");?>
	<section class="new_arrivals_area  clearfix ">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading new_arrivals">
                        <h1>Search Result for "<?php echo @$_GET['q']; ?>"</h1>
                    </div>
                </div>
            </div>
			<div class="row top-brands">
		    <?php $isresult = 0; $search = mysqli_real_escape_string($db,$_GET['q']); 
				if(!empty($search))
				{
				$query_brand=mysqli_query($db,"select * from brands where status = 'Active' and (name LIKE '%$search%' OR address LIKE '%$search%' OR title LIKE '%$search%' OR investment_range LIKE '%$search%' OR investment_range_in_words LIKE '%$search%' OR food_type LIKE '%$search%') ");
				
				if($query_brand->num_rows > 0)
				{	
					while($row_brand=mysqli_fetch_array($query_brand)){ 
					
					$catId = $row_brand['category_id'];
					$queryString = "SELECT * from categories where id = '$catId'";
					$resultString = mysqli_query($db, $queryString);
					$rowString = mysqli_fetch_assoc($resultString);
					$cname = $rowString['seo_name']; 
					
					
					?>
					<div class="col-sm-4 col-12">
						<div class="brand-details">
							<h3> <?php echo $row_brand['name']; ?> </h3>
							<div class="brand-details-left">
								<a href="<?php echo $baseURL; ?>brand-detail/<?php echo $cname; ?>/<?php echo $row_brand['seo_name']; ?>">
								<img src="<?php echo $baseURL; ?><?php echo str_replace('../',"",$row_brand['brand_image']); ?>">
								</a>
							</div>
							<div class="brand-details-right">
								<p> <?php echo substr($row_brand['title'],0,75).'...'; ?>, 
									<a href="<?php echo $baseURL; ?>brand-detail/<?php echo $cname; ?>/<?php echo $row_brand['seo_name']; ?>">
										read more 
									</a>
								</p>
							</div>
						  <div class="brand-details-footer"> 
						  <a href="<?php echo $baseURL; ?>brand-detail/<?php echo $cname; ?>/<?php echo $row_brand['seo_name']; ?>">
							<button type="button" class="btn btn-danger">Contact Brand</button>
							</a>
						   </div>
						</div>
					</div>
				
			<?php } } else {  $isresult = $isresult+1; ?>
					<?php $categoryDetails = mysqli_query($db,"select * from categories where name LIKE '%$search%' ");
					if($categoryDetails->num_rows > 0)
					{
						while($categoryDetail=mysqli_fetch_array($categoryDetails)){
							$catID = $categoryDetail['id'];
							$cname = $categoryDetail['seo_name'];
							$query_brand=mysqli_query($db,"select * from brands where status = 'Active' and category_id = '$catID'");
								if(!empty($query_brand))
								{	
									while($row_brand=mysqli_fetch_array($query_brand)){ ?>
									<div class="col-sm-4 col-12">
										<div class="brand-details">
											<h3> <?php echo $row_brand['name']; ?> </h3>
											<div class="brand-details-left">
												<a href="<?php echo $baseURL; ?>brand-detail/<?php echo $cname; ?>/<?php echo $row_brand['seo_name']; ?>">
												<img src="<?php echo str_replace('../',"",$row_brand['brand_image']); ?>">
												</a>
											</div>
											<div class="brand-details-right">
												<p> <?php echo substr($row_brand['title'],0,75).'...'; ?>, 
													<a href="<?php echo $baseURL; ?>brand-detail/<?php echo $cname; ?>/<?php echo $row_brand['seo_name']; ?>">
														read more 
													</a>
												</p>
											</div>
										  <div class="brand-details-footer"> 
										  <a href="<?php echo $baseURL; ?>brand-detail/<?php echo $cname; ?>/<?php echo $row_brand['seo_name']; ?>">
											<button type="button" class="btn btn-danger">Contact Brand</button>
											</a>
										   </div>
										</div>
									</div>
								
							<?php 	}
								}  
						}
					}else { $isresult = $isresult+1; ?> 
					
						<?php $chartDetails = mysqli_query($db,"select * from chart where name LIKE '%$search%' ");
						if($chartDetails->num_rows > 0)
						{
							while($chartDetail=mysqli_fetch_array($chartDetails)){
								$chartID = $chartDetail['id'];
								
								$query_brand=mysqli_query($db,"select * from brands where status = 'Active' and chart_id = '$chartID'");
									if(!empty($query_brand))
									{	
										while($row_brand=mysqli_fetch_array($query_brand)){ 
												$catId = $row_brand['category_id'];
												$queryString = "SELECT * from categories where id = '$catId'";
												$resultString = mysqli_query($db, $queryString);
												$rowString = mysqli_fetch_assoc($resultString);
												$cname = $rowString['seo_name']; 
										
										?>
										<div class="col-sm-4 col-12">
											<div class="brand-details">
												<h3> <?php echo $row_brand['name']; ?> </h3>
												<div class="brand-details-left">
													<a href="<?php echo $baseURL; ?>brand-detail/<?php echo $cname; ?>/<?php echo $row_brand['seo_name']; ?>">
													<img src="<?php echo str_replace('../',"",$row_brand['brand_image']); ?>">
													</a>
												</div>
												<div class="brand-details-right">
													<p> <?php echo substr($row_brand['title'],0,75).'...'; ?>, 
														<a href="<?php echo $baseURL; ?>brand-detail/<?php echo $cname; ?>/<?php echo $row_brand['seo_name']; ?>">
															read more 
														</a>
													</p>
												</div>
											  <div class="brand-details-footer"> 
												<a href="<?php echo $baseURL; ?>brand-detail/<?php echo $cname; ?>/<?php echo $row_brand['seo_name']; ?>">
												<button type="button" class="btn btn-danger">Contact Brand</button>
												</a>
											   </div>
											</div>
										</div>
									
								<?php 	}
									}  
							}
						}else { $isresult = $isresult+1; } ?>					
					
					
					<?php } ?>






			<?php }  ?>  
			
			<?php if($isresult == 3) { ?>
					<div class="popular_section_heading mb-30 mt-30">
						<h2 class="title-text">No result found for <?php echo @$_GET['q']; ?> </h2>
					</div>	
				<?php } } else { ?>  
				
					<div class="popular_section_heading mb-30 mt-30">
						<h2 class="title-text">No result found </h2>
					</div>	
				
				<?php } ?>		
				
			</div>
        </div>
    </section>

    
     <?php include("footer.php");?>
		 
	 
</body>

</html>