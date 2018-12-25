 <style>
.blog_post_content {
	left: 10%;
	position: absolute;
	right: 0;
	bottom: 10px;
	width: 80%;
	z-index: 2;
	border-radius: 6px;
}

.blog_text_area {
	background-color: rgba(255, 255, 255, 0.7);
	padding: 30px;
	border-radius: 6px;
}

#expend {
  display:none;  
}

#expend + .smalldesc {
  max-height:52px;
  overflow:hidden;
  transition:all .3s ease;
}

#expend:checked + .smalldesc {
  max-height:500px;  
}

label.expend {
	text-align: center;
	width: 100%;
	float: left;
}

.nav-tabs{ margin-bottom:15px}

 </style>
	 <section class=" popular_brands_area_margin top-brands">
        <div class="container advice">
  
               <div class="row">
			   
			   <div class=" col-sm-6 blog_sidebar">
			   
			   <ul class="nav nav-tabs" id="myTab1" role="tablist">
				  <li class="nav-item">
					<a class="nav-link active" id="news-tab" data-toggle="tab" href="#news" role="tab" aria-controls="home" aria-selected="true">Franchise News</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" id="blog-tab" data-toggle="tab" href="#Blog" role="tab" aria-controls="profile" aria-selected="false">Franchise Blogs</a>
				  </li>
				 
				</ul>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade show active" id="news" role="tabpanel" aria-labelledby="news-tab">
				   <div class="latest_post mb-30 news">              
						<?php
						
						if(isset($_GET['data_row']) && !empty($_GET['data_row']))
						{
							
							$sql = "SELECT news_blog_contents.id, news_blog_contents.type , news_blogs.title,news_blogs.category_id,news_blogs.content,news_blogs.seo_name,news_blogs.image FROM  news_blog_contents INNER JOIN news_blogs ON (news_blog_contents.news_blog_id = news_blogs.id) where news_blog_contents.status ='Active' and news_blog_contents.type = 'News' and news_blogs.category_id = '$category_id' order by news_blog_contents.id DESC ";
							$query=mysqli_query($db,$sql); 
						}else
						{
							$sql = "SELECT news_blog_contents.id, news_blog_contents.type , news_blogs.title,news_blogs.category_id,news_blogs.content,news_blogs.seo_name,news_blogs.image FROM  news_blog_contents INNER JOIN news_blogs ON (news_blog_contents.news_blog_id = news_blogs.id) where news_blog_contents.status ='Active' and news_blog_contents.type = 'News' order by news_blog_contents.id DESC ";
							$query=mysqli_query($db,$sql); 
						//	$query=mysqli_query($db,"SELECT * FROM news_blogs where type = 'News' and status = 'Active' order by id DESC LIMIT 3 ");  
						}
						
						if($query->num_rows == 0)
						{
							$sql = "SELECT news_blog_contents.id, news_blog_contents.type , news_blogs.title,news_blogs.category_id,news_blogs.seo_name ,news_blogs.content,news_blogs.image  FROM  news_blog_contents INNER JOIN news_blogs ON (news_blog_contents.news_blog_id = news_blogs.id) where news_blog_contents.status ='Active' and news_blog_contents.type = 'News' order by news_blog_contents.id DESC ";
							$query=mysqli_query($db,$sql);  	
						}
						
						$sno = 1;
						if(!empty($query)){ 
						while($row=mysqli_fetch_array($query)){
							$recentCat = $row['category_id'];
							$queryString = "SELECT * from new_categories where id = '$recentCat'";
							$resultString = mysqli_query($db, $queryString);
							$rowString = mysqli_fetch_assoc($resultString);
							$recentCatseo = $rowString['seo_name']; 
						?>		
							<div class="single_latest_post">
						<?php if(empty($row['image'])){ ?>
									<img src="<?php echo $baseURL; ?>img/no-image.png" 
									alt="">
								<?php }else{ ?>
									<img src="<?php echo $baseURL; ?><?php echo str_replace('../',"",$row['image']); ?>" alt="<?php echo $row['title']; ?>">
								<?php } ?>	
								<a href="<?php echo $baseURL; ?>newsdetails/<?php echo $recentCatseo; ?>/<?php echo $row['seo_name']; ?>"><?php echo $row['title']; ?></a>
								<p><?php echo substr($row['content'],0,150).'...'; ?></p>
						    </div>
						<?php } } ?>
					</div>
				  </div>
				  <div class="tab-pane fade" id="Blog" role="tabpanel" aria-labelledby="blog-tab">
					<div class="latest_post mb-30 news">
						<?php
							if(isset($_GET['data_row']) && !empty($_GET['data_row']))
							{
								$sql = "SELECT news_blog_contents.id, news_blog_contents.type , news_blogs.title,news_blogs.category_id,news_blogs.seo_name ,news_blogs.content,news_blogs.image  FROM  news_blog_contents INNER JOIN news_blogs ON (news_blog_contents.news_blog_id = news_blogs.id) where news_blog_contents.status ='Active' and news_blog_contents.type = 'Blogs' and news_blogs.category_id = '$category_id' order by news_blog_contents.id DESC ";
								$query=mysqli_query($db,$sql);  
							}else
							{
								$sql = "SELECT news_blog_contents.id, news_blog_contents.type , news_blogs.title,news_blogs.category_id,news_blogs.seo_name ,news_blogs.content,news_blogs.image  FROM  news_blog_contents INNER JOIN news_blogs ON (news_blog_contents.news_blog_id = news_blogs.id) where news_blog_contents.status ='Active' and news_blog_contents.type = 'Blogs' order by news_blog_contents.id DESC ";
								$query=mysqli_query($db,$sql); 
								
							}
							
							if($query->num_rows == 0)
							{
								$sql = "SELECT news_blog_contents.id, news_blog_contents.type , news_blogs.title,news_blogs.category_id,news_blogs.seo_name ,news_blogs.content,news_blogs.image  FROM  news_blog_contents INNER JOIN news_blogs ON (news_blog_contents.news_blog_id = news_blogs.id) where news_blog_contents.status ='Active' and news_blog_contents.type = 'Blogs' order by news_blog_contents.id DESC ";
								$query=mysqli_query($db,$sql); 			
							}
							$sno = 1;
							if(!empty($query)){ 
							while($row=mysqli_fetch_array($query)){
							$recentCat = $row['category_id'];
							$queryString = "SELECT * from new_categories where id = '$recentCat'";
							$resultString = mysqli_query($db, $queryString);
							$rowString = mysqli_fetch_assoc($resultString);
							$recentCatseo = $rowString['seo_name']; 								
						?>		
							<div class="single_latest_post">
								<?php if(empty($row['image'])){ ?>
									<img src="<?php echo $baseURL; ?>img/no-image.png" 
									alt="">
								<?php }else{ ?>
									<img src="<?php echo $baseURL; ?><?php echo str_replace('../',"",$row['image']); ?>" alt="news">
								<?php } ?>	
							    <a href="<?php echo $baseURL; ?>blogdetail/<?php echo $recentCatseo; ?>/<?php echo $row['seo_name']; ?>"><?php echo $row['title']; ?></a>
								<p><?php echo substr($row['content'],0,150).'...'; ?></p>
						    </div>
						<?php } } ?>
					</div>
				  </div>

				</div>
			   </div>
			    
				 <div class="offset-md-2 col-12 col-sm-4 ">
				 
				   <div class="col-12">
                    <div class="popular_section_heading mb-30">
                        <!--<h3 class="title-text">Free Advice - Ask Our Experts</h3> -->
                    </div>
			     </div>
		
			
				<div class="text-center">
					<div class="form-group radio">
						<label><input type="radio" name="enquire_type" value="franchise" checked>  Buy a Franchise  </label>
						<label><input type="radio" name="enquire_type" value="brand"> Expand My Brand   </label>
					</div>
				</div>
		
			  
				 
                  <div class="contact_from">
                        <form action="#" method="post" id="main_contact_form">
                            <div class="contact_input_area" id="expandmybrand">
                                <div id="exsuccess_fail_info" class="exsuccess_fail_info"></div>
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" name="exname" id="exname" placeholder="Name *">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" name="exbrandname" id="exbrandname" placeholder="Brand Name">
										</div>
									</div>
									<div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="exemail" id="exemail" placeholder="Email *">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="exmobile" id="exmobile" placeholder="Mobile No *">
                                        </div>
                                    </div>
									<div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="exbrandorigin" id="exbrandorigin" placeholder="Brand origin *">
                                        </div>
                                    </div>	
									<div class="col-12">
                                        <div class="form-group">
                                            <textarea name="exmessage" class="form-control" id="exmessage" cols="30" rows="3" placeholder="Message *"></textarea>
                                        </div>
                                    </div>									
								</div>
							</div>
															
							
							<!-- Message Input Area Start -->
                            <div class="contact_input_area" id="buyafranchise">
                                <div id="success_fail_info" class="success_fail_info"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name *">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="emailBUF" id="emailBUF" placeholder="Email *">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Mobile No. *">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="city" id="city" placeholder="City *">
                                        </div>
                                    </div>
									<div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Brand Name">
                                        </div>
                                    </div>
									<div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="investment" id="investment" placeholder="Investment *">
                                        </div>
                                    </div>
                                    
									<div class="col-12" style="display:none;">
                                        <div class="form-group">
                                            <textarea name="requirment" class="form-control" id="requirment" cols="30" rows="3" placeholder="Requirement" ></textarea>
                                        </div>
                                    </div>
									
									<div class="col-12">
                                        <div class="form-group">
                                            <textarea name="messageBUF" class="form-control" id="messageBUF" cols="30" rows="3" placeholder="Your Message *"></textarea>
                                        </div>
                                    </div>
								</div>
                            </div>
							<div class="col-12 text-center">
							   <button type="button" id="eq_Button" class="btn btn-outline-primary">Ask Our Experts</button>
							</div>
                        </form>
                    </div>
                    </div>
            </div>
        </div>
    </section>
	  
    <!-- ***** Best Rated/Onsale/Top Sale Product Area End ***** -->

    <!-- ***** Offer Area Start ***** -->
    <section class="offer_area">
        <div class="container">
            <div class="row ">
			   <div class="col-12">
                    <div class="popular_section_heading mb-30 mt-30">
                        <h3 class="title-text">Top of the <?php if(!empty($get_Category_name)) { echo $get_Category_name;  } ?> Charts</h3>
                    </div>
                </div>
			</div>
		   <div class="row ">
				<div class="offset-sm-1 col-sm-10 col-12">
					<div class="top-of-chart">

					<?php 
					$query=mysqli_query($db,"select * from chart");
					while($row=mysqli_fetch_array($query)){
						?>
						<a href="<?php echo $baseURL; ?>chart/<?php echo $row['seo_name']; ?>">
						<div class="item">
							<img src="<?php echo $baseURL; ?><?php echo $row['image_path'];?>" >
							<span> <?php echo $row['name'];?> </span>
						</div>
						</a>
					<?php } ?>
					
						
					</div>
				</div>
			</div>
		</div>
    </section>
    <!-- ***** Offer Area End ***** -->

	 <section class="popular_brands_area_margin_clents top-brands">
        <div class="container advice">
				<div class="row">
			    <div class="col-12">
                    <div class="popular_section_heading mb-30">
                        <h3 class="title-text"><?php if(!empty($get_Category_name)) { echo $get_Category_name.' Brands';  } ?> Videos</h3>
                    </div>
			     </div>
					<?php
					
						if(isset($_GET['data_row']) && !empty($_GET['data_row']))
						{
							
							$sql = "SELECT news_blog_contents.id, news_blog_contents.type , news_blogs.title,news_blogs.category_id,news_blogs.seo_name ,news_blogs.content,news_blogs.image  FROM  news_blog_contents INNER JOIN news_blogs ON (news_blog_contents.news_blog_id = news_blogs.id) where news_blog_contents.status ='Active' and news_blog_contents.type = 'Video' and news_blogs.category_id = '$category_id' order by news_blog_contents.id DESC ";
							$queryVB=mysqli_query($db,$sql); 
							
						}else
						{
							$sql = "SELECT news_blog_contents.id, news_blog_contents.type , news_blogs.title,news_blogs.category_id,news_blogs.seo_name ,news_blogs.content,news_blogs.image  FROM  news_blog_contents INNER JOIN news_blogs ON (news_blog_contents.news_blog_id = news_blogs.id) where news_blog_contents.status ='Active' and news_blog_contents.type = 'Video' order by news_blog_contents.id DESC ";
							$queryVB=mysqli_query($db,$sql); 
						}
						
						if($queryVB->num_rows == 0)
						{
							$sql = "SELECT news_blog_contents.id, news_blog_contents.type , news_blogs.title,news_blogs.category_id,news_blogs.seo_name ,news_blogs.content,news_blogs.image  FROM  news_blog_contents INNER JOIN news_blogs ON (news_blog_contents.news_blog_id = news_blogs.id) where news_blog_contents.status ='Active' and news_blog_contents.type = 'Video' order by news_blog_contents.id DESC ";
							$queryVB=mysqli_query($db,$sql); 		
						}
					
						if(!empty($queryVB)){ 
						while($rowVB=mysqli_fetch_array($queryVB)){
							
							$recentCat = $rowVB['category_id'];
							$queryString = "SELECT * from new_categories where id = '$recentCat'";
							$resultString = mysqli_query($db, $queryString);
							$rowString = mysqli_fetch_assoc($resultString);
							$recentCatseo = $rowString['seo_name']; 
							
					?>		
						<div class="col-sm-6 blog_sidebar">
							<div class="latest_post mb-30 news">
								<div class="single_latest_post ">
									<?php if(empty($rowVB['image'])){ ?>
										<img src="<?php echo $baseURL; ?>img/no-image.png" 
										alt="">
									<?php }else{ ?>
										<img src="<?php echo $baseURL; ?><?php echo str_replace('../',"",$rowVB['image']); ?>" alt="news">
									<?php } ?>	
								    <a href="<?php echo $baseURL; ?>videodetail/<?php echo $recentCatseo;?>/<?php echo $rowVB['seo_name']; ?>">
										<?php echo $rowVB['title']; ?></a>
									<p><?php echo substr($rowVB['content'],0,150).'...'; ?></p>
								</div>
								
							</div>
						</div>					
					<?php } } ?>				 
				</div>
			</div>
    </section>
	
	  <!-- ***** Testimonial Area Start ***** -->
    <section class="testimonials_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular_section_heading mb-30 text-center">
                        <h3>Few Words from Clients</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="testimonials_slides">
                       
					<?php $i = 1;
						$query=mysqli_query($db,"select * from testimonial order by id DESC");
						if($query){
						while($row=mysqli_fetch_array($query)){
						?>
						<div class="single_slide text-center">
                            <img src="<?php echo $baseURL; ?><?php echo $row['client_picture'];?>" alt="">
                            <span class="tes-quote">"</span>
                            <h5><?php echo $row['message'];?></h5>
                            <p><?php echo $row['name'];?></p>
                        </div>
						<?php }} ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Testimonial Area End ***** -->
 
 	  <!-- ***** Testimonial Area Start ***** -->
    <section class="testimonials_area section_padding_30">
        <div class="container">
		 
		 
		 <div class="row">

			<div class="col-sm-12 footer-text">
 	    
				<?php
				if(!empty($footer_content))
				{
					echo $footer_content;
				}
				else
				{
					
				}
					 ?>		

			</div>
		</div>
		</div>
   </section>
 
 
 <!-- ***** Footer Area Start ***** -->
    <footer class="footer_area section_padding_50" style="padding-bottom:10px">
        <div class="container">
            <div class="row">
                <!-- Single Footer Area Start -->
            
                <!-- Single Footer Area Start -->
                    <div class="col-md-6 col-lg-3 col-6 ">
                    <div class="single_footer_area">
                       
                        <ul class="footer_widget_menu">
                          
                            <li><a href="<?php echo $baseURL; ?>about.php">
								<i class="fa fa-angle-right" aria-hidden="true"></i>About Us
								</a>
							</li>
                            <li><a href="<?php echo $baseURL; ?>contact.php">
								<i class="fa fa-angle-right" aria-hidden="true"></i>Contact Us
								</a>
							</li>
                            <li><a href="<?php echo $baseURL; ?>feedback.php">
									<i class="fa fa-angle-right" aria-hidden="true"></i>Feedback
								</a>
							</li>
                            <li><a href="<?php echo $baseURL; ?>news.php">
								<i class="fa fa-angle-right" aria-hidden="true"></i>News
								</a>
							</li>
							<li><a href="<?php echo $baseURL; ?>blog.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Blog
								</a>
							</li>
                           <li><a href="<?php echo $baseURL; ?>sitemap.xml"><i class="fa fa-angle-right" aria-hidden="true"></i>Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Single Footer Area Start -->
                 <div class="col-6 col-md-6 col-lg-3">
                    <div class="single_footer_area">
                      
                        <ul class="footer_widget_menu">
                            <li><a href="<?php echo $baseURL; ?>help.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Help</a></li>
                       
                            <li><a href="<?php echo $baseURL; ?>advertise-with-us.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Advertise with Us</a></li>
                           
                            <li><a href="<?php echo $baseURL; ?>brand-video.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Brand Video</a></li>
                            <li><a href="<?php echo $baseURL; ?>logistic-partner.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Logistic Partner</a></li>
                            <li><a href="<?php echo $baseURL; ?>disclaimer.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Disclaimer</a></li>
                            <li><a href="<?php echo $baseURL; ?>terms-and-conditions.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Terms & Conditions</a></li>
                            <li><a href="<?php echo $baseURL; ?>privacy-policy.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Privacy Policy</a></li>
                         
            
                        </ul>
                    </div>
                </div>
				  <div class="col-6 col-md-6 col-lg-3">
                    <div class="single_footer_area">
                      
                        <ul class="footer_widget_menu">
                            <li><a href="<?php echo $baseURL; ?>vendor-management.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Vendor Management</a></li>
							<li><a href="<?php echo $baseURL; ?>marketing-consultant.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Marketing Consultant</a></li>
                            <li><a href="<?php echo $baseURL; ?>compliance-service.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Compliance Service</a></li>
                          
                            <li><a href="<?php echo $baseURL; ?>manual-inspection.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Manual Inspection</a></li>
                            <li><a href="<?php echo $baseURL; ?>digital-survey.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Digital Survey</a></li>
                            <li><a href="<?php echo $baseURL; ?>food-analysis.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Food Analysis</a></li>
                           
                         
            
                        </ul>
                    </div>
                </div>
                <!-- Single Footer Area Start -->
                 <div class="col-12 col-md-6 col-lg-3">
                    <div class="single_footer_area">
                         <h6>Newsletter Subscribe</h6>
                        <div class="subscribtion_form">
						 
                            <form action="<?php echo $baseURL; ?>news_letter.php" method="post" >
                                <input type="email" name="mail" class="mail" placeholder="Your E-mail Addrees">
                                <button type="submit" class="submit"><i class="ti-check" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="single_footer_area mt-30">
                        <div class="footer_heading mb-15">
                            <h6>Follow Us</h6>
                        </div>
                          <div class="footer_social_area mt-15">
							<a href="https://www.facebook.com/franchisediscovery" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="https://twitter.com/FranchiseFly" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a href="https://www.linkedin.com/company/franchisediscov" target="_blank">
							<i class="fa fa-linkedin" aria-hidden="true"></i></a>
						   <a href="https://www.instagram.com/franchisediscovery/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>							
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom Area Start -->
        <div class="footer_bottom_area">
            <div class="container">
                <div class="row">
                    <!-- Copywrite Content -->
                    <div class="col-12 col-md">
                        <div class="copywrite_text text-left d-flex align-items-center">
                            <p>Copyright@2018, <a href="http://franchisediscovery.in/">Secoya Franchise India Pvt. Ltd.</a></p>
						</div>
                    </div>
                    <!-- Payment Method -->
                    <div class="col-12 col-md">
                        <div class="payment_method text-right">
                            <img src="<?php echo $baseURL; ?>img/payment-method/paypal.png" alt="">
                            <img src="<?php echo $baseURL; ?>img/payment-method/maestro.png" alt="">
                            <img src="<?php echo $baseURL; ?>img/payment-method/western-union.png" alt="">
                            <img src="<?php echo $baseURL; ?>img/payment-method/discover.png" alt="">
                            <img src="<?php echo $baseURL; ?>img/payment-method/american-express.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="<?php echo $baseURL; ?>js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo $baseURL; ?>js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo $baseURL; ?>js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="<?php echo $baseURL; ?>js/plugins.js"></script>
    <!-- Active js -->
    <script src="<?php echo $baseURL; ?>js/active.js"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5bd94f37476c2f239ff6ad99/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
	
<script>
$(document).ready(function() {
	$('#expandmybrand').hide();
	$('#top_expandmybrand').hide();
	
	$('input[type=radio][name=enquire_type]').change(function() {
		if (this.value == 'franchise') {
			$('#expandmybrand').hide();
			$('#buyafranchise').show();
		}
		else if (this.value == 'brand') {
			$('#buyafranchise').hide();
			$('#expandmybrand').show();
		}
	});

	$('input[type=radio][name=top_enquire_type]').change(function() {
		if (this.value == 'franchise') {
			$('#top_expandmybrand').hide();
			$('#top_buyafranchise').show();
		}
		else if (this.value == 'brand') {
			$('#top_buyafranchise').hide();
			$('#top_expandmybrand').show();
		}
	});
	
	$('#eq_Button').click(function(){
		var eqtype= $('input[type=radio][name=enquire_type]:checked').val();
		var isGO = 0;
		
		if (eqtype == 'franchise') {
			var name = $('#name').val();
			var email = $('#emailBUF').val();
			var mobile = $('#mobile').val();
			var city = $('#city').val();
			var brand_name = $('#brand_name').val();
			var investment = $('#investment').val();
			//var requirment = $('#requirment').val();
			var requirment = 0;
			var message = $('#messageBUF').val();
			
				if(name == '')
				{
					alert('Please enter name');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				if(email == '')
				{
					alert('Please enter email');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				if(mobile == '')
				{
					alert('Please enter mobile no');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				if(city == '')
				{
					alert('Please enter city');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				
				if(investment == ''){alert('Please enter investment');isGO = 1;return false;}else { isGO = 0;  } 
				
				/* if(requirment == '')
				{
					alert('Please enter requirment');
					isGO = 1;
					return false;
				}else { isGO = 0;  } */
				if(message == '')
				{
					alert('Please enter message');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 

				if(isGO == 0)
				{					
					$.ajax({
						 type:"post",
						 url:"ajaxfranchiseEnquiry.php",
						 data:"name="+name+"&email="+email+"&mobile="+mobile+"&city="+city+"&brand_name="+brand_name+"&investment="+investment+"&requirment="+requirment+"&message="+message+"&eqtype="+eqtype,
						 success:function(data)
						 {
							if(data  == 'success')
							{
								$('div.success_fail_info').css({'font-size': '15px','margin-bottom': '10px','color': 'green','margin-left':'60px'});
								$('div.success_fail_info').html('Thank you ! Our team will get back to you shortly.');
							}
							if(data == 'fail')
							{
								$('div.success_fail_info').css({'font-size': '15px','margin-bottom': '10px','color': 'red','margin-left':'60px'});
								$('#success_fail_info').html('Sorry ! Something went wrong.');
							}
							
							$('#name').val("");
							$('#emailBUF').val("");
							$('#mobile').val("");
							$('#city').val("");
							$('#brand_name').val("");
							$('#investment').val("");
							$('#requirment').val("");
							$('#messageBUF').val(""); 
							
						 }
					});						
				}
			}
		else if (eqtype == 'brand') {
			
			var name = $('#exname').val();
			var brandname = $('#exbrandname').val();
			var email = $('#exemail').val();
			var mobile = $('#exmobile').val();
			var brandorigin = $('#exbrandorigin').val();
			var message = $('#exmessage').val();
			
			
				if(name == '')
				{
					alert('Please enter name');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				
				/* if(brandname == '')
				{
					alert('Please enter brand name');
					isGO = 1;
					return false;
				}else { isGO = 0;  } */
				if(email == '')
				{
					alert('Please enter email');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				if(mobile == '')
				{
					alert('Please enter mobile no');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				
				if(brandorigin == '')
				{
					alert('Please enter brand origin');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				
				if(message == '')
				{
					alert('Please enter message');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 

				if(isGO == 0)
				{					
					$.ajax({
						 type:"post",
						 url:"ajaxExpandEnquiry.php",
						 data:"name="+name+"&email="+email+"&mobile="+mobile+"&brandname="+brandname+"&brandorigin="+brandorigin+"&message="+message+"&eqtype="+eqtype,
						 success:function(data)
						 {
							if(data  == 'success')
							{
								$('div.exsuccess_fail_info').css({'font-size': '15px','margin-bottom': '10px','color': 'green','margin-left':'60px'});
								$('div.exsuccess_fail_info').html('Thank you ! Our team will get back to you shortly.');
							}
							if(data == 'fail')
							{
								$('div.exsuccess_fail_info').css({'font-size': '15px','margin-bottom': '10px','color': 'red','margin-left':'60px'});
								$('div.exsuccess_fail_info').html('Sorry ! Something went wrong.');
							}
						
							$('#exname').val("");
							$('#exbrandname').val("");
							$('#exemail').val("");
							$('#exmobile').val("");
							$('#exbrandorigin').val("");
							$('#exmessage').val("");
							
						 }
					});						
				}
		}	
	});


	$('#top_eq_Button').click(function(){
		var eqtype= $('input[type=radio][name=top_enquire_type]:checked').val();
		var isGO = 0;
		
		if (eqtype == 'franchise') {
			var name = $('#top_name').val();
			var email = $('#top_emailBUF').val();
			var mobile = $('#top_mobile').val();
			var city = $('#top_city').val();
			var brand_name = $('#top_brand_name').val();
			var investment = $('#top_investment').val();
			var requirment = $('#top_requirment').val();
			var message = $('#top_messageBUF').val();
			
				if(name == '')
				{
					alert('Please enter name');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				if(email == '')
				{
					alert('Please enter email');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				if(mobile == '')
				{
					alert('Please enter mobile no');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				if(city == '')
				{
					alert('Please enter city');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				if(investment == '')
				{
					alert('Please enter investment');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				if(requirment == '')
				{
					alert('Please enter requirment');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				if(message == '')
				{
					alert('Please enter message');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 

				if(isGO == 0)
				{					
					$.ajax({
						 type:"post",
						 url:"ajaxfranchiseEnquiry.php",
						 data:"name="+name+"&email="+email+"&mobile="+mobile+"&city="+city+"&brand_name="+brand_name+"&investment="+investment+"&requirment="+requirment+"&message="+message+"&eqtype="+eqtype,
						 success:function(data)
						 {
							if(data  == 'success')
							{
								$('div.top_success_fail_info').css({'font-size': '15px','margin-bottom': '10px','color': 'green','margin-left':'60px'});
								$('div.top_success_fail_info').html('Thank you ! Our team will get back to you shortly.');
							}
							if(data == 'fail')
							{
								$('div.top_success_fail_info').css({'font-size': '15px','margin-bottom': '10px','color': 'red','margin-left':'60px'});
								$('#top_success_fail_info').html('Sorry ! Something went wrong.');
							}
							
							$('#top_name').val("");
							$('#top_emailBUF').val("");
							$('#top_mobile').val("");
							$('#top_city').val("");
							$('#top_brand_name').val("");
							$('#top_investment').val("");
							$('#top_requirment').val("");
							$('#top_messageBUF').val(""); 
							
						 }
					});						
				}
			}
		else if (eqtype == 'brand') {
			
			var name = $('#top_exname').val();
			var brandname = $('#top_exbrandname').val();
			var email = $('#top_exemail').val();
			var mobile = $('#top_exmobile').val();
			var brandorigin = $('#top_exbrandorigin').val();
			var message = $('#top_exmessage').val();
			
			
				if(name == '')
				{
					alert('Please enter name');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				
				if(brandname == '')
				{
					alert('Please enter brand name');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				if(email == '')
				{
					alert('Please enter email');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				if(mobile == '')
				{
					alert('Please enter mobile no');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				
				if(brandorigin == '')
				{
					alert('Please enter brand origin');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 
				
				if(message == '')
				{
					alert('Please enter message');
					isGO = 1;
					return false;
				}else { isGO = 0;  } 

				if(isGO == 0)
				{					
					$.ajax({
						 type:"post",
						 url:"ajaxExpandEnquiry.php",
						 data:"name="+name+"&email="+email+"&mobile="+mobile+"&brandname="+brandname+"&brandorigin="+brandorigin+"&message="+message+"&eqtype="+eqtype,
						 success:function(data)
						 {
							if(data  == 'success')
							{
								$('div.top_exsuccess_fail_info').css({'font-size': '15px','margin-bottom': '10px','color': 'green','margin-left':'60px'});
								$('div.top_exsuccess_fail_info').html('Thank you ! Our team will get back to you shortly.');
							}
							if(data == 'fail')
							{
								$('div.top_exsuccess_fail_info').css({'font-size': '15px','margin-bottom': '10px','color': 'red','margin-left':'60px'});
								$('div.top_exsuccess_fail_info').html('Sorry ! Something went wrong.');
							}
						
							$('#top_exname').val("");
							$('#top_exbrandname').val("");
							$('#top_exemail').val("");
							$('#top_exmobile').val("");
							$('#top_exbrandorigin').val("");
							$('#top_exmessage').val("");
							
						 }
					});						
				}
		}	
	});


	
});
</script>	
	
	
	
	
	
	
	
	
	