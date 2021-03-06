<?php 	session_start();
	require('admin/config.php');
	$cat = '';
	if(isset($_GET['rowCatData']))
	{
		$data =  $_GET['rowCatData']; 
		$queryString = "SELECT id,footer_content from new_categories where seo_name = '$data'";
		$resultString = mysqli_query($db, $queryString);
		$rowString = mysqli_fetch_assoc($resultString);
		$cat = $rowString['id']; 
		if(empty($cat))
		{
			echo '<script> location.replace("http://franchisediscovery.in"); </script>';
		}
	}
	else { 
		$cat = ''; 
	}?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
      <?php	
		$query=mysqli_query($db,"SELECT * FROM page_seo where page_id = 8 ");  
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
  
	<style>
	/*new_categories BADGE*/
.badge {
	font-weight: 600;
	font-size: 13px;
	color: white;
	background-color: #289dcc;
}
/*FEATURED*/
.mg-2, .mg-4{
	margin-left:-20px;
}
.linkfeat{
	background: rgba(76,76,76,0);
	background: -moz-linear-gradient(top, rgba(76,76,76,0) 0%, rgba(48,48,48,0) 49%, rgba(19,19,19,1) 100%);
	background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(76,76,76,0)), color-stop(49%, rgba(48,48,48,0)), color-stop(100%, rgba(19,19,19,1)));
	background: -webkit-linear-gradient(top, rgba(76,76,76,0) 0%, rgba(48,48,48,0) 49%, rgba(19,19,19,1) 100%);
	background: -o-linear-gradient(top, rgba(76,76,76,0) 0%, rgba(48,48,48,0) 49%, rgba(19,19,19,1) 100%);
	background: -ms-linear-gradient(top, rgba(76,76,76,0) 0%, rgba(48,48,48,0) 49%, rgba(19,19,19,1) 100%);
	background: linear-gradient(to bottom, rgba(76,76,76,0) 0%, rgba(48,48,48,0) 49%, rgba(19,19,19,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313', GradientType=0 );
}
.align-self-end h4,.align-self-end p{ color:#fff}

.singl-blog-status-bar > span {
	width: 22%;
}
	</style>
	
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
    <!-- ***** Header Area Start ***** -->
     <?php include("header.php");?>
	
	

<section class="blog_area home-3 blog-page-content section_padding_50">
        <div class="container">
		<div class="row">
                <div class="col-12">
                    <div class="section_heading new_arrivals text-center">
                        <h1>News</h1>
                    </div>
                </div>
            </div>
			
			
			
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
					
					<div class="col-sm-12  featcard">
					   <div id="featured" class="carousel slide carousel-fade" data-ride="carousel">
						 <div class="carousel-inner">
							<?php 
							if(!empty($cat))
							{
								$query=mysqli_query($db,"SELECT news_blogs.id,news_blogs.video_url,news_blogs.type,admin.name as create_by, new_categories.name,new_categories.seo_name as catSeoName, news_blogs.title, news_blogs.content, news_blogs.image, news_blogs.create_on,news_blogs.seo_name FROM news_blogs INNER JOIN admin ON (news_blogs.create_by = admin.id) INNER JOIN new_categories ON (news_blogs.category_id = new_categories.id) where news_blogs.category_id = '$cat' and news_blogs.type = 'News' order by news_blogs.id ASC LIMIT 3 ");  
								
							}else
							{
								$query=mysqli_query($db,"SELECT news_blogs.id,news_blogs.video_url,news_blogs.type,admin.name as create_by, new_categories.name,new_categories.seo_name as catSeoName, news_blogs.title, news_blogs.content, news_blogs.image, news_blogs.create_on,news_blogs.seo_name FROM news_blogs INNER JOIN admin ON (news_blogs.create_by = admin.id) INNER JOIN new_categories ON (news_blogs.category_id = new_categories.id) where news_blogs.type = 'News' order by news_blogs.id ASC LIMIT 3 ");  
							}
							
							
							$sno = 1;
							if(!empty($query)){ 
							while($row=mysqli_fetch_array($query)){ ?>
							<div class="carousel-item <?php if($sno == 1) {  echo 'active'; $sno++;} ?>">			  
								<div class="card bg-dark text-white">
								<img class="card-img img-fluid" src="<?php echo str_replace('../',"",$row['image']); ?>" alt="<?php echo $row['title']; ?>">
								<div class="card-img-overlay d-flex linkfeat">
								<?php $title = str_replace("?","",$row['title']); $title = str_replace("/","",$title);   ?>
								  <a href="<?php echo $baseURL; ?>newsdetails/<?php echo $row['catSeoName']; ?>/<?php echo $row['seo_name']; ?>" class="align-self-end">
									<span class="badge"><?php echo $row['name']; ?></span> 
									<h4 class="card-title"><?php echo $row['title']; ?></h4>
									<p class="textfeat" style="display: none;"><?php echo substr($row['content'],0,200).'...'; ?></p>
								  </a>
								</div>
							  </div>
							</div>
							<?php } } ?>
						</div>
						</div>
					</div>

                        <div class="latest_post mb-30 news" id="results">
							
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <!-- Blog Sidebar -->
                    <div class="blog_sidebar">
                        <!-- Search Post -->
                        <div class="search_post mb-30">
                            <h6>Search News</h6>
                            <form action="#" method="get">
                                <div class="form-group">
                                    <input type="search" class="form-control" placeholder="Enter Keyword...">
                                    <button type="submit" class="btn hidden">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- Latest Post -->
                        <div class="latest_post mb-30">
                            <h6>Recent News</h6>
                                <?php							
							$query=mysqli_query($db,"SELECT * FROM news_blogs where type = 'News' and status = 'Active' order by id DESC LIMIT 3 ");  
							$sno = 1;
							if(!empty($query)){ 
							while($row=mysqli_fetch_array($query)){
								
								$recentCat = $row['category_id'];
								$queryString = "SELECT * from new_categories where id = '$recentCat'";
								$resultString = mysqli_query($db, $queryString);
								$rowString = mysqli_fetch_assoc($resultString);
								$recentCatseo = $rowString['seo_name']; 
							?>		
							    <div class="single_latest_post" style="margin: 0px 0px 60px 0px;">
									<img src="<?php echo str_replace('../',"",$row['image']); ?>" alt="<?php echo $row['title']; ?>">
									
									<?php $title = str_replace("?","",$row['title']); $title = str_replace("/","",$title);   ?>
									
									<a href="<?php echo $baseURL; ?>newsdetails/<?php echo $recentCatseo;?>/<?php echo $row['seo_name']; ?>"><?php echo $row['title']; ?></a>
								</div>
								
							<?php } } ?>
							
							
                        </div>
                        <!-- Catagory -->
                        <div class="catagory_section mb-30">
                            <h6>Catagory</h6>
                            <ul>
                               <?php
								$i = 1;
								$query=mysqli_query($db,"select * from new_categories where status = 0 order by name ASC ");
								while($row=mysqli_fetch_array($query)){
									$catId = $row['id'];
								?>
                                <li><a href="<?php echo $baseURL; ?>news/<?php echo $row['seo_name']; ?>">- <?php echo $row['name']; ?> 
										<span class="text-muted">
										<?php
											$resultCount = $db->query("SELECT COUNT(category_id) FROM news_blogs where category_id = '$catId' and type = 'News' and status = 'Active'");
											$rowCount = $resultCount->fetch_row();
											echo '('.$rowCount[0].')';
										?>	
										
										</span>
									</a>
								</li>
								<?php } ?>
                            </ul>
                        </div>
					</div>
                </div>
            </div>

			<div class="row">
                <div class="col-12 mt-30">
                    <div class="shortcodes_content">
						<center>
							<div id="loader_image"><img src="img/loader.gif" alt="" width="24" height="24"> Loading...please wait</div>
							<div id="loader_message"></div>
						<center>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Area Start -->
           
        </div>
    </section>

    
     <?php include("footer.php");?>
	 <input type="hidden" id="url" value="<?php echo $baseURL."ajax_news_pagination.php"; ?>" />
	<script>
			 //FEATURED HOVER
	$(document).ready(function(){
		  $(".linkfeat").hover(
			function () {
				$(".textfeat").show(500);
			},
			function () {
				$(".textfeat").hide(500);
			}
		);
	});
	</script>

<script type="text/javascript">
      var busy = false;
	  var limit = 12;
      var offset = 0;
	  var url_data = $('#url').val();
	  var cat = <?php if(!empty($cat)) { echo $cat; } else { echo 0; }  ?>;	
      function displayRecords(lim, off) { 
        $.ajax({
          type: "GET",
          async: false,
          url: url_data,
          data: "limit="+lim+"&offset="+off+"&cat="+cat,
          cache: false,
          beforeSend: function() {
            $("#loader_message").html("").hide();
            $('#loader_image').show();
          },
          success: function(html) {
           $('#loader_image').hide();
			if (html == 0) {
				$("#loader_message").html('<button class="btn btn-default" type="button">No more records.</button>').show();
            } else {
				$("#results").append(html);
				 $("#loader_message").html('<button class="btn btn-default" type="button">Loading please wait...</button>').show();              
            }
            window.busy = false;
          }
        });
      }

      $(document).ready(function() {
        // start to load the first set of data
        if (busy == false) {
          busy = true;
          // start to load the first set of data
          displayRecords(limit, offset);
        }


        $(window).scroll(function() {
          // make sure u give the container id of the data to be loaded in.
          if ($(window).scrollTop() + $(window).height() > $("#results").height() && !busy) {
            busy = true;
            offset = limit + offset;

            // this is optional just to delay the loading of data
            setTimeout(function() { displayRecords(limit, offset); }, 500);

            // you can remove the above code and can use directly this function
            // displayRecords(limit, offset);

          }
        });

      });

    </script>

	
</body>

</html>