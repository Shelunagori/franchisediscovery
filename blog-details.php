<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php
		session_start();
		require('admin/config.php');
		$query=mysqli_query($db,"SELECT * FROM page_seo where page_id = 11 ");  
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
    <section class="singl-blog-post-area section_padding_50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="singl-blog-post">
                        <figure>
                            <!-- Blog Main Image -->
                            <div class="blog-img">
                                <img src="img/bg-img/blog-3.jpg" alt="blog-img">
                            </div>

                            <!-- Blog Title -->
                            <div class="singl-blog-title">
                                <h3>This is a Blog Post with Demo Image</h3>
                            </div>

                            <!-- Blog Status Bar Area -->
                            <div class="singl-blog-status-bar">
                                <span>
								    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> by Rajnesh</a>
								</span>
                                <span>
								    <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 16 Sep, 17</a>
								</span>
                                <span>
								    <a href="#"><i class="fa fa-folder-o" aria-hidden="true"></i> Women</a>
								</span>
                                <span>
								    <a href="#"><i class="fa fa-comments" aria-hidden="true"></i> 3 Comments</a>
								</span>
                            </div>

                            <!-- Single Blog Details Area -->
                            <div class="singl-blog-details">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae to vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae to vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates officiis consectetur incidunt eveniet mollitia itaque tempore eius asperiores. Iste praesentium libero unde maiores, aspernatur numquam deserunt quisquam doloremque reprehenderit, hic ducimus fugit. Distinctio maxime harum ipsam sunt, voluptatem quod ut?</p>
                            </div>

                            <!-- Blog Tag and Share Area -->
                            <div class="tag-share clearfix">
                                <div class="share-links pull-left">
                                    <span class="share-promt">Share This Post:</span>
                                    <!-- Social Links -->
                                    <ul class="social-links">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="line"></div>

                            <!-- Comment Area Start -->
                            <div class="comment_area clearfix">
                                <h6 class="title">4 Comments</h6>
                                <ol>
                                    <!-- Single Comment Area -->
                                    <li class="single_comment_area">
                                        <div class="comment-wrapper clearfix">
                                            <!-- Comment Meta -->
                                            <div class="comment-meta">
                                                <div class="comment-author-img">
                                                    <img class="img-circle" src="img/partner-img/tes-1.png" alt="">
                                                </div>
                                            </div>
                                            <!-- Comment Content -->
                                            <div class="comment-content">
                                                <h5 class="comment-author"><a href="#">Lim Jannat</a></h5>
                                                <p>This post is very helpful. I like your fashion tips. Keep up awesome job!</p>
                                                <a href="#" class="reply">Reply</a>
                                            </div>
                                        </div>
                                        <ul class="children">
                                            <li class="single_comment_area">
                                                <div class="comment-wrapper clearfix">
                                                    <!-- Comment Meta -->
                                                    <div class="comment-meta">
                                                        <div class="comment-author-img">
                                                            <img class="img-circle" src="img/partner-img/tes-2.png" alt="">
                                                        </div>
                                                    </div>
                                                    <!-- Comment Content -->
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
                                            <!-- Comment Meta -->
                                            <div class="comment-meta">
                                                <div class="comment-author-img">
                                                    <img class="img-circle" src="img/partner-img/tes-3.png" alt="">
                                                </div>
                                            </div>
                                            <!-- Comment Content -->
                                            <div class="comment-content">
                                                <h5 class="comment-author"><a href="#">Naznin Ritu</a></h5>
                                                <p>Great post about treanding fashion 2017. Thank you.</p>
                                                <a href="#" class="reply">Reply</a>
                                            </div>
                                        </div>
                                        <ul class="children">
                                            <li class="single_comment_area">
                                                <div class="comment-wrapper clearfix">
                                                    <!-- Comment Meta -->
                                                    <div class="comment-meta">
                                                        <div class="comment-author-img">
                                                            <img class="img-circle" src="img/partner-img/tes-2.png" alt="">
                                                        </div>
                                                    </div>
                                                    <!-- Comment Content -->
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
                            </div>
                        </figure>
                    </div>
                </div>

                <!--  Sidebar Area -->
                <div class="col-12 col-lg-4">
                    <!-- Blog Sidebar -->
                    <div class="blog_sidebar xs-mt-30">
                        <!-- Search Post -->
                        <div class="search_post mb-30">
                            <h6>Search Post</h6>
                            <form action="#" method="get">
                                <div class="form-group">
                                    <input type="search" class="form-control" placeholder="Enter Keyword...">
                                    <button type="submit" class="btn hidden">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- Latest Post -->
                        <div class="latest_post mb-30">
                            <h6>Recent Post</h6>
                            <div class="single_latest_post">
                                <img src="img/bg-img/blog-1.jpg" alt="">
                                <a href="#">7 Quick Ways to Make a Great Event Successful</a>
                                <p>5 min ago</p>
                            </div>
                            <div class="single_latest_post">
                                <img src="img/bg-img/blog-2.jpg" alt="">
                                <a href="#">7 Quick Ways to Make a Great Event Successful</a>
                                <p>37 min ago</p>
                            </div>
                            <div class="single_latest_post">
                                <img src="img/bg-img/blog-3.jpg" alt="">
                                <a href="#">7 Quick Ways to Make a Great Event Successful</a>
                                <p>1h ago</p>
                            </div>
                        </div>
                        <!-- Catagory -->
                        <div class="catagory_section mb-30">
                            <h6>Catagory</h6>
                            <ul>
                                <li><a href="#">- Women <span class="text-muted">(21)</span></a></li>
                                <li><a href="#">- Men <span class="text-muted">(5)</span></a></li>
                                <li><a href="#">- Fashion <span class="text-muted">(17)</span></a></li>
                                <li><a href="#">- Electronice <span class="text-muted">(11)</span></a></li>
                                <li><a href="#">- Sports <span class="text-muted">(16)</span></a></li>
                                <li><a href="#">- Intimates <span class="text-muted">(9)</span></a></li>
                            </ul>
                        </div>
                        <!-- Achives -->
                        <div class="achive_section mb-30">
                            <h6>Achives</h6>
                            <ul>
                                <li><a href="#">- September - 2017</a></li>
                                <li><a href="#">- Auguest - 2017</a></li>
                                <li><a href="#">- July - 2017</a></li>
                                <li><a href="#">- June - 2017</a></li>
                                <li><a href="#">- May - 2017</a></li>
                                <li><a href="#">- April - 2017</a></li>
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