<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
      <?php	
		session_start();
		require('admin/config.php');
		$data = $_GET['rowData'];
		$catseoname = $_GET['catseoname'];
		
		$queryStringCat = "SELECT id,footer_content from categories where seo_name = '$catseoname'";
		$resultStringCat = mysqli_query($db, $queryStringCat);
		$rowStringCat = mysqli_fetch_assoc($resultStringCat);
		$Catid = $rowStringCat['id']; 
		if(empty($Catid)) { header("Location: $baseURL"); die(); }
		
		$queryString = "SELECT * from news_blogs where seo_name = '$data'";
		$resultString = mysqli_query($db, $queryString);
		$rowString = mysqli_fetch_assoc($resultString);
		$id = $rowString['id']; 
		$type = $rowString['type'];
		$category_id = 0; 
		if(empty($id)) { header("Location: $baseURL"); die(); }
		else { $category_id = $id;  }
		$url_name = 'newsdetails';
		if($type=='Blogs')
		{
			$query=mysqli_query($db,"SELECT * FROM page_seo where page_id = 11 and news_blogs_id = '$id' ");  
			$url_name = 'blogdetail';
			$catURL = 'blog';
		}
		else if($type=='Video')
		{
			$query=mysqli_query($db,"SELECT * FROM page_seo where page_id = 13 and news_blogs_id = '$id' ");  
			$url_name = 'videodetail';
			$catURL = 'brand-video';
		}
		else {
			
			$query=mysqli_query($db,"SELECT * FROM page_seo where page_id = 9 and news_blogs_id = '$id' ");  
			$url_name = 'newsdetails';	
			$catURL = 'news';
		}
		
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
    <!-- Title  -->
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
    <!-- ***** Header Area Start ***** -->
     <?php include("header.php");?>
    <!-- >>>>>>>>>>>>>>>> Start Single Blog Post Area <<<<<<<<<<<<<<<< -->
    <section class="singl-blog-post-area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="singl-blog-post">
                        <figure>
                           <?php
							$query=mysqli_query($db,"SELECT news_blogs.video_url,news_blogs.type,admin.name as create_by, categories.name, news_blogs.title, news_blogs.content, news_blogs.image, news_blogs.create_on,news_blogs.seo_name FROM news_blogs INNER JOIN admin ON (news_blogs.create_by = admin.id) INNER JOIN categories ON (news_blogs.category_id = categories.id) where news_blogs.id = '$id' and news_blogs.type = '$type'");  
							$sno = 1;
							if(!empty($query)){ 
							while($row=mysqli_fetch_array($query)){
							?>
                            <div class="blog-img">
								<?php if(!empty(trim($row['video_url']))) { 
									$class = "singl-video-title";
								?>
								
								 <iframe width="100%" height="400" src="<?php echo trim($row['video_url']); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								
								<?php } else {  
									$class = 'singl-blog-title';
								?>
								<img src="<?php echo $baseURL; ?><?php echo str_replace('../',"",$row['image']); ?>" alt="<?php echo $row['title']; ?>">
								<?php } ?>
							</div>
							
							<div class="<?php echo $class; ?>">
                                <h3><?php echo $row['title']; ?></h3>
                            </div>

                            <!-- Blog Status Bar Area -->
                            <div class="singl-blog-status-bar">
                               <span>
								    <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date('d-M-Y',strtotime($row['create_on'])); ?></a>
								</span>
                                <span style="width: 20%;">
								    <a href="#"><i class="fa fa-folder-o" aria-hidden="true"></i> 
									<?php echo $row['name']; ?>
									</a>
								</span>
                                <!--<span>
								    <a href="#"><i class="fa fa-comments" aria-hidden="true"></i> 3 Comments</a>
								</span> -->
                            </div>

                            <!-- Single Blog Details Area -->
                            <div class="singl-blog-details">
                              <?php echo $row['content']; ?>
                            </div>
							<?php $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                            <!-- Blog Tag and Share Area -->
                            <div class="tag-share clearfix">
                                <div class="share-links pull-left">
                                    <span class="share-promt">Share This Post:</span>
                                    <!-- Social Links -->
                                    <ul class="social-links">
                                        <li><a href="http://www.facebook.com/sharer.php?u=<?php echo $currentURL; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://twitter.com/share?url=<?php echo $currentURL; ?>&amp;text=<?php echo $row['title']; ?>&amp;hashtags=franchisediscovery" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="https://plus.google.com/share?url=<?php echo $currentURL; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                        <!--<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li> -->
                                    </ul>
                                </div>
                            </div>
							<?php } } ?>
                            <div class="line"></div>

                            <!-- Comment Area Start -->
                           <!--  <div class="comment_area clearfix">
                                <h6 class="title">4 Comments</h6>
                                <ol>
                                    
                                    <li class="single_comment_area">
                                        <div class="comment-wrapper clearfix">
                                            
                                            <div class="comment-meta">
                                                <div class="comment-author-img">
                                                    <img class="img-circle" src="<?php echo $baseURL; ?>img/partner-img/tes-1.png" alt="">
                                                </div>
                                            </div>
                                           
                                            <div class="comment-content">
                                                <h5 class="comment-author"><a href="#">Lim Jannat</a></h5>
                                                <p>This post is very helpful. I like your fashion tips. Keep up awesome job!</p>
                                                <a href="#" class="reply">Reply</a>
                                            </div>
                                        </div>
                                        <ul class="children">
                                            <li class="single_comment_area">
                                                <div class="comment-wrapper clearfix">
                                                   
                                                    <div class="comment-meta">
                                                        <div class="comment-author-img">
                                                            <img class="img-circle" src="<?php echo $baseURL; ?>img/partner-img/tes-2.png" alt="">
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="comment-content">
                                                        <h5 class="comment-author"><a href="#">Nazrul Islam</a></h5>
                                                        <p>Thanks for your valuable feedback @Lim Jannat. Stay with us.</p>
                                                        <a href="#" class="reply">Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="single_comment_area">
                                        <div class="comment-wrapper d-flex clearfix">
                                            
                                            <div class="comment-meta">
                                                <div class="comment-author-img">
                                                    <img class="img-circle" src="<?php echo $baseURL; ?>img/partner-img/tes-3.png" alt="">
                                                </div>
                                            </div>
                                           
                                            <div class="comment-content">
                                                <h5 class="comment-author"><a href="#">Naznin Ritu</a></h5>
                                                <p>Great post about treanding fashion 2017. Thank you.</p>
                                                <a href="#" class="reply">Reply</a>
                                            </div>
                                        </div>
                                        <ul class="children">
                                            <li class="single_comment_area">
                                                <div class="comment-wrapper clearfix">
                                                    
                                                    <div class="comment-meta">
                                                        <div class="comment-author-img">
                                                            <img class="img-circle" src="<?php echo $baseURL; ?>img/partner-img/tes-2.png" alt="">
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="comment-content">
                                                        <h5 class="comment-author"><a href="#">Nazrul Islam</a></h5>
                                                        <p>Thanks for your valuable feedback @Ajoy Das, Stay with us.</p>
                                                        <a href="#" class="reply">Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ol>
                            </div>
                            <div class="line"></div>

                            <div class="comment_form_area">
                                <h6 class="title">Leave a Comment</h6>

                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="author">Name</label>
                                                <input type="text" class="form-control" name="author" id="author" value="" tabindex="1">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" name="email" id="email" value="" tabindex="2">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="url">Mobile No.</label>
                                                <input type="text" class="form-control" name="url" id="url" value="" tabindex="3">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="comment">Comment</label>
                                                <textarea class="form-control" name="comment" cols="30" rows="2" id="comment" tabindex="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn bigshop-btn bigshop-btn-sm" name="submit" type="submit" id="submit" tabindex="5" value="Submit">Submit Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                        </figure>
                    </div>
                </div>

                <!--  Sidebar Area -->
                <div class="col-12 col-lg-4">
                    <!-- Blog Sidebar -->
                    <div class="blog_sidebar xs-mt-30">
                        <!-- Search Post -->
                        <div class="search_post mb-30">
                            <h6>Search <?php echo $type; ?></h6>
                            <form action="#" method="get">
                                <div class="form-group">
                                    <input type="search" class="form-control" placeholder="Enter Keyword...">
                                    <button type="submit" class="btn hidden">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- Latest Post -->
                        <div class="latest_post mb-30">
                            <h6>Recent <?php echo $type; ?></h6>
                           <?php
							
							$query=mysqli_query($db,"SELECT * FROM news_blogs where type = '$type' and status = 'Active' and id != '$id' order by id DESC LIMIT 3 ");  
							$sno = 1;
							if(!empty($query)){ 
							while($row=mysqli_fetch_array($query)){
								$recentCat = $row['category_id'];
								$queryString = "SELECT * from categories where id = '$recentCat'";
								$resultString = mysqli_query($db, $queryString);
								$rowString = mysqli_fetch_assoc($resultString);
								$recentCatseo = $rowString['seo_name']; 
								
							?>		
							    <div class="single_latest_post" style="margin: 0px 0px 60px 0px;">
									<img src="<?php echo $baseURL; ?><?php echo str_replace('../',"",$row['image']); ?>" alt="<?php echo $row['title']; ?>">
									<a href="<?php echo $baseURL; ?><?php echo $url_name; ?>/<?php echo $recentCatseo;?>/<?php echo $row['seo_name']; ?>"><?php echo $row['title']; ?></a>
								</div>
								
							<?php } } ?>

                        </div>
                        <!-- Catagory -->
                        <div class="catagory_section mb-30">
                            <h6>Catagory</h6>
                            <ul>
								<?php
								$i = 1;
								$query=mysqli_query($db,"select * from categories where status = 0 order by name ASC ");
								while($row=mysqli_fetch_array($query)){
									$catId = $row['id'];
								?>
								
								
                                <li><a href="<?php echo $baseURL.$catURL; ?>/<?php echo $row['seo_name']; ?>">- <?php echo $row['name']; ?> 
										<span class="text-muted">
										<?php
											$resultCount = $db->query("SELECT COUNT(category_id) FROM news_blogs where category_id = '$catId' and type = '$type' and status = 'Active'");
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
        </div>
    </section>
    <!-- >>>>>>>>>>>>>>>> End Single Blog Post Area <<<<<<<<<<<<<<<< -->

    <!-- Map Area Start -->
           
        </div>
    </section>

    
     <?php include("footer.php");?>
		 
	 
</body>

</html>