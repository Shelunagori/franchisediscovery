<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php	
		session_start();
		require('admin/config.php');
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
   
    <!-- Favicon  -->
    <link rel="shortcut icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
  
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
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
	
	

    <!-- ***** New Arrivals Area Start ***** -->
    <section class="  clearfix ">
        
           <div class="container">
			
		   <div class="row top-brands">
           <div class="col-sm-12">
			 <div class="shortcodes_area section_padding_50">
     
            <!-- Shortcodes Accordians Start -->
            <div class="row">
                <div class="col-12">
                    <div class="shortcodes_title text-center mb-30">
                        <h4>Testimonials</h4>
                    </div>
                </div>
            </div>
            <!-- Shortcodes Content Start -->
            <div class="row">
                <div class="col-12">
                    <div class="shortcodes_content">
                        <blockquote class="bigshop-blockquote br-10">
                            <p>Bigshop is smart &amp; elegant e-commerce HTML5 Template. It's suitable for all e-commerce business platform. It's come with 55+ Pages &amp; exciting all features. It's super responsive for all desktop/mobile layout.</p>
							
							<span> <b>Rajnesh Prajapati</b> </span><span> ( flavour stone ) </span>
                        </blockquote>
						<blockquote class="bigshop-blockquote br-10">
                            <p>Bigshop is smart &amp; elegant e-commerce HTML5 Template. It's suitable for all e-commerce business platform. It's come with 55+ Pages &amp; exciting all features. It's super responsive for all desktop/mobile layout.</p>
								<span> <b>Rajnesh Prajapati</b> </span><span> ( flavour stone ) </span>
                        </blockquote>
						 <blockquote class="bigshop-blockquote br-10">
                            <p>Bigshop is smart &amp; elegant e-commerce HTML5 Template. It's suitable for all e-commerce business platform. It's come with 55+ Pages &amp; exciting all features. It's super responsive for all desktop/mobile layout.</p>
								<span> <b>Rajnesh Prajapati</b> </span><span> ( flavour stone ) </span>
                        </blockquote>
						<blockquote class="bigshop-blockquote br-10">
                            <p>Bigshop is smart &amp; elegant e-commerce HTML5 Template. It's suitable for all e-commerce business platform. It's come with 55+ Pages &amp; exciting all features. It's super responsive for all desktop/mobile layout.</p>
								<span> <b>Rajnesh Prajapati</b> </span><span> ( flavour stone ) </span>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <<<<<<<<<<<<<<<<<<<< Shortcodes Area End >>>>>>>>>>>>>>>>>>>> -->
			</div>
			</div>
		
    </section>

    
     <?php include("footer.php");?>
		 
	 
</body>

</html>