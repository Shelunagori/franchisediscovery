<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="google-site-verification" content="TOlZTCsRsuhHSXCwGXuCpDLNASZcYZX9lFrzoy0cS_Y" />
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style>
		.gridImg { margin-left: 3px; height:100px; }
	</style>

<?php	session_start();
		require('admin/config.php');
		
		$footer_text_query=mysqli_query($db,"SELECT * FROM footer_pages_detail where page_id = 26");  
		if($footer_text_query->num_rows > 0){  
			while($footer_text_row=mysqli_fetch_array($footer_text_query)){ 
				$footer_content = $footer_text_row['detail'];
			}
		}
		
		
		$query=mysqli_query($db,"SELECT * FROM page_seo where page_id = 1 ");  
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


    <link rel="shortcut icon" href="<?php echo $baseURL; ?>img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?php echo $baseURL; ?>css/core-style.css">
    <link rel="stylesheet" href="<?php echo $baseURL; ?>style.css">
    <link rel="stylesheet" href="<?php echo $baseURL; ?>css/custom.css">

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

    <!-- ***** Welcome Slides Area Start ***** -->
    <section class="welcome_area" >
        <div class="welcome_slides">
		<?php 
			$query_slider=mysqli_query($db,"select * from slider where position = 'slider'");
			while($row_slider=mysqli_fetch_array($query_slider)){ 
		?>
			<div class="height-400 bg-img">
				<a href="<?php echo $row_slider['slider_url']; ?>" target="_blank">
				<img src="<?php echo $row_slider['slider_image']; ?>" alt="<?php echo $row_slider['name']; ?>">
				</a>
			</div>
		<?php } ?>
		</div>
    </section> 
    <!-- ***** Welcome Slides Area End ***** -->

 	 

   

    <!-- ***** New Arrivals Area Start ***** -->
    <section class="new_arrivals_area section_padding_20 clearfix ">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading new_arrivals">
                        <h3>Top Food Brands with Franchise Discovery</h3>
                    </div>
                </div>
            </div>
		    <div class="row">
                <div class="col-12">
                    <div class="home-slider-3  top-food-brands">
						<?php 
							$query_slider=mysqli_query($db,"select * from slider where position = 'top_brand'");
							while($row_slider=mysqli_fetch_array($query_slider)){ 
						?>
							<div class="single_arrivals_slide">
								<a href="<?php echo $row_slider['slider_url']; ?>" 
									target="_blank">
								<img src="<?php echo $row_slider['slider_image']; ?>" alt="<?php echo $row_slider['name']; ?>">
								</a>
							</div>
						<?php } ?>					
					 </div>
				</div>
            </div>
			 <div class="row search-filter-margin">
                <div class="col-10"></div>
                
                <div class="col-2">
					<div class="form-group">
						<select class="form-control" id="selectSearch">
							<option value='no' selected>Search By</option>
							<option value="asc">Low To High</option>
							<option value="desc">High To Low</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row home-catg"></div>
		</div>
    </section>

    
	
	

          <?php include("footer.php");?>
	  <script>
		$(document).ready(function(){
			///search by brand ajax
			$('#selectSearch').on('change',function(){
				var selectedValue = $(this).val();
				$.ajax({
					url:'get_category_ajax.php?selectedValue='+selectedValue,
					type:"GET",
					}).done(function(response){  
					$(".home-catg").html(response);
				});
			});
			
			var selectedValue = $('#selectSearch option:selected').val();
			$.ajax({
				url:'get_category_ajax.php?selectedValue='+selectedValue,
				type:"GET",
				}).done(function(response){  
				$(".home-catg").html(response);
			});
			///search by brand ajax
		});
	  </script>
	  <script>
      var owl = $('.owl-carousel');
      owl.owlCarousel({
        margin: 10,
		autoplay: true,
    navigation: true,

        loop: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        }
      })
    </script>
	
		
	
		  <script>
	$( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
 $( ".owl-next").html('<i class="fa fa-chevron-right"></i>');
    </script>
	
	<script>
	$('.home-slider-3').owlCarousel({
  autoplay: true,
  center: true,
  loop: true,
 navigation: true,
   margin: 30,
   loop: true,
   
   navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          }
        }
           
});
	</script>
	
</body>

</html>