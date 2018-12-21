<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
.header-slider {
	background-color: #171A29;
	padding: 20px 0 20px;	
}
@media (max-width: @screen-xs-min) {
  .modal-xs { width: @modal-sm; }
}

.new_arrivals_slides .owl-nav, .you_make_like_slider .owl-nav {
	height: 40px;
	left: 200px;
	position: absolute;
	top: -46px;
	width: 60px;
}

.featured_offer_text {
	background-color: rgba(255, 255, 255, 0.5);
	display: inline-block;
	margin-left: 15px;
	padding: 30px 100px 30px 30px;
	border-radius: 2px;
}

.page-link {
	
	color: #193985;
	
}

.page-link:focus, .page-link:hover {
	color: #fff;
	text-decoration: none;
	background-color: #193985;
	border-color: #dee2e6;
}
.nav { padding:5px 15px;}
.nav a {
	float: left;
	display: inline;
	width: 100%;
	text-align: right;
}

.nav a.active{
	border-right: 4px solid #f00;
}

.user_thumb:hover >ul {

	display: block;
}
.my-dropdown {
    background-color: #f4f6f8;
    border-radius: 3px;
    padding: 15px;
    position: absolute;
    right: -10px;
    text-align: left;
    top: 40px;
    display: none;
    width: 150px;
    z-index: 100;
    box-shadow: 0 7px 10px rgba(0, 0, 0, 0.15);
    -webkit-transition-duration: 750ms;
            transition-duration: 750ms;
}

.my-dropdown .user-title {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 10px;
}

.my-dropdown .user-title span {
    font-weight: 400;
}

.my-dropdown a {
    font-size: 13px;
    font-weight: 600;
    padding: 5px 0;
    display: block;
}
.sidebar {

  
  top: 15%;
  
  padding: 15px;
}
.is_stuck{  top: 15% !important;}

.sidebar h3{ font-size:18px; text-align:right; font-weight:600; margin-bottom:0;} 
</style>
<!-- ***** Header Area Start ***** -->
    <header class="header_area">
        <!-- Top Header Area Start -->
        <div class="top_header_area">
            <div class="container h-100">
                <div class="row d-md-flex h-100 align-items-center">
                    <div class="col-6 col-md-6">
                        <div class="top_single_area d-sm-flex align-items-center">
                            <!-- Top Mail Area Start -->
                            <div class="top_mail mr-5">
                              <a> Call for Enquiry :- +91 8108335523 </a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-6 col-md-6 ">
                        
                        <!-- Top Social Area Start -->
                            <div class="top_social">
                                <div class="footer_social_area ">
									<a href="https://www.facebook.com/franchisediscovery" target="_blank" style="color:#3B5998"><i class="fa fa-facebook" aria-hidden="true"></i></a>
									<a href="https://twitter.com/FranchiseFly" target="_blank" style="color:#33ccff"><i class="fa fa-twitter" aria-hidden="true"></i></a>
									<a href="https://www.linkedin.com/company/franchisediscov" target="_blank" style="color:#007bb7">
									<i class="fa fa-linkedin" aria-hidden="true"></i></a>
								   <a href="https://www.instagram.com/franchisediscovery/" target="_blank" style="color:#BF2D7B" ><i class="fa fa-instagram" aria-hidden="true"></i></a>
								</div>
                            </div>
                        
                        
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Header Area End -->

        <!-- Bottom Header Area Start -->
        <div class="bottom-header-area" id="stickyHeader">
            <div class="main_header_area">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Logo Area Start -->
                        <div class="col-6 col-md-6 padding-right0">
                            <div class="logo_area">
                                <a href="<?php echo $baseURL; ?>"><img src="<?php echo $baseURL; ?>img/Franchise-logo.png"> franchisediscovery.in </a>
                            </div>
                        </div>
                        <!-- Search Area Start -->
                        <div class="col-12 col-md-3">
                            <div class="hero_search_area">
                                <form action="<?php echo $baseURL; ?>search.php" method="get">
                                    <input type="text" class="form-control" id="search" aria-describedby="search" placeholder="Search Food & Beverages" name="q" value="<?php echo @$_GET['q']; ?>">
                                    <button type="submit" class="btn"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Hero Meta Area Start -->
                        <div class="col-6 col-md-3">
							<div class="hero_meta_area d-flex text-right align-items-center justify-content-end"">
                                <!-- Wishlist Area -->
								<?php
								@$reg_type=$_SESSION['reg_type']; 
								@$user_id=$_SESSION['user_id'];
								if(empty($user_id)){ ?>
                                 <a href="<?php echo $baseURL; ?>register.php">
									 <div class="wishlist login-btn">
										<button type="button" onclick="window.location.href='register.php'" class="btn btn-secondary "> Register</button>
									</div>
								</a>
                                <!-- Cart Area -->
                               <a href="<?php echo $baseURL; ?>login.php"> 
								   <div class="cart login-btn">
										<button type="button " onclick="window.location.href='login.php'" class="btn btn-secondary ">Login</button>
									</div>
								</a>
								<?php } ?>
                                <!-- User Area -->
								<?php if(!empty($user_id)){ ?>
									   <span style="padding: 12px 2px 5px 0px !important;" class="user-title">Hello,</span><?php echo  @$first_name=$_SESSION['first_name']; ?>
									   &nbsp;
                                <div class="user_thumb">
									<a href="#" id="header-user-btn"><img class="img-fluid" src="<?php echo $baseURL;
										if(!empty($_SESSION['profile']))
										{
											echo $_SESSION['profile'];
										}else { echo 'img/bg-img/user.jpg'; }
									?>" alt=""></a>
                                    <!-- User Meta Dropdown Area Start -->
                                    <ul class="my-dropdown" id="menu" style="width: 160px; top: 35px;">
                                 
                                        <?php
									if($reg_type=="Brand")
										
										{?>	
											<li><a  href="manage-profile.php">
											<i class="ti-unlock"></i>&nbsp;&nbsp; Manage Profile</a></li>
											<li><a href="crm-details.php"><i class="ti-user"></i>
											&nbsp;&nbsp;CRM Details</a></li>
											<li><a href="request-for-listing.php"><i class="ti-menu"></i>&nbsp;&nbsp; Request For Listing</a></li>
											<li><a href="marketing-with-us.php"><i class="ti-heart"></i>&nbsp;&nbsp; Marketing With Us</a></li>
											
											<li><a href="support.php"><i class="fa fa-life-ring"></i>&nbsp;&nbsp; Support </a></li>
											<li><a href="my-support-tickets.php"><i class="fa fa-ticket"></i>&nbsp;&nbsp; My Support Tickets </a></li>
											<li><a href="notification.php"><i class="fa fa-bell-o"></i>&nbsp;&nbsp; Notification</a></li>
											<li><a href="<?php echo $baseURL; ?>logout.php"><i class="ti-lock"></i>&nbsp;&nbsp; Logout</a></li>
								<?php
										}
										else
										{
								?>
								<ul>
										<li><a href="manage-profile.php" ><i class="ti-unlock"></i> &nbsp;
										&nbsp;Manage Profile</a></li>
										<li><a  href="book_appointment.php" ><i class="fa fa-clock-o"></i> 
										&nbsp;&nbsp;Book Appointment</a></li>
										<li><a href="favourite.php"><i class="ti-menu"></i> &nbsp;&nbsp;Favourite List</a></li>
										
										<!--<li><a class="<?php if($currentPage == 'Book Appointments') { echo 'active acolor';}?>" href="#"><i class="ti-heart"></i> Book Appointments</a></li> -->
											<li><a  href="support.php"><i class="fa fa-life-ring"></i> &nbsp;&nbsp;Support </a></li>
											<li><a href="my-support-tickets.php"><i class="fa fa-ticket"></i> &nbsp;&nbsp;My Support Tickets </a></li>
										<li><a href="notification.php"><i class="fa fa-bell-o"></i> &nbsp;&nbsp;Notification</a></li>
										<li><a href="<?php echo $baseURL; ?>logout.php"><i class="ti-lock"></i> &nbsp;&nbsp;Logout</a></li>
								</ul>
								<?php
										}
								?>
                                        <!--<li><a href="<?php echo $baseURL; ?>logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>-->
                                    </ul>
                                
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mainmenu_area">
                <div class="container">
                    <nav id="bigshop-nav" class="navigation">
                        <!-- Logo Area Start -->
                        <div class="nav-header">
                            <div class="nav-toggle"></div>
                        </div>
                        <!-- Nav Text Area Start -->
                        <span class="nav-text align-to-right"><a data-toggle="modal" data-target="#exampleModal"class="btn enquire-btn">Enquire Now</a></span>

                        <!-- Main Menus Wrapper
								<a href="<?php echo $baseURL; ?>category/<?php echo  str_replace(" ","-",$row_cat['name']); ?>/list/<?php echo base64_encode($row_cat['id']); ?>"> 
						-->
                        <div class="nav-menus-wrapper">
                            <ul class="nav-menu">
                                <?php
									$query_cat=mysqli_query($db,"select * from categories where status = 0 and id != 7");
									if($query_cat->num_rows > 0)
									{
									while($row_cat=mysqli_fetch_array($query_cat)){
										   
								?>
									<li>
										<a href="<?php echo $baseURL; ?>food/<?php echo $row_cat['seo_name']; ?>"> 
										
											<?php echo $row_cat['name']; ?> 
										</a> 
									</li>
									<?php } } ?>
							</ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Bottom Header Area End -->
    </header>
    <!-- ***** Header Area End ***** -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Enquire Now</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="contact_from">
								<form action="#" method="post" id="main_contact_form">
									<div class="text-center">
										<div class="form-group radio">
											<label class="radio-inline"><input type="radio" name="top_enquire_type" value="franchise" checked>  Buy a Franchise  </label>
											<label class="radio-inline"><input type="radio" name="top_enquire_type" value="brand"> Expand My Brand   </label>
										</div>
									</div>
									<div class="contact_input_area">
										<div class="contact_input_area" id="top_expandmybrand">
												<div id="top_exsuccess_fail_info" class="top_exsuccess_fail_info"></div>
												<div class="row" style="padding:10px;">
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" class="form-control" name="top_exname" id="top_exname" placeholder="Name" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" class="form-control" name="top_exbrandname" id="top_exbrandname" placeholder="Brand Name" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input type="email" class="form-control" name="top_exemail" id="top_exemail" placeholder="Email" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" class="form-control" name="top_exmobile" id="top_exmobile" placeholder="Mobile No." required>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<input type="text" class="form-control" name="top_exbrandorigin" id="top_exbrandorigin" placeholder="Brand origin" required>
														</div>
													</div>	
													<div class="col-12">
														<div class="form-group">
															<textarea name="top_exmessage" class="form-control" id="top_exmessage" cols="30" rows="3" placeholder="Message *" required></textarea>
														</div>
													</div>									
												</div>
											</div>

											<div class="contact_input_area" id="top_buyafranchise">
												<div id="top_success_fail_info" class="top_success_fail_info"></div>
												<div class="row" style="padding:10px;">
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" class="form-control" name="top_name" id="top_name" placeholder="Name">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" class="form-control" name="top_emailBUF" id="top_emailBUF" placeholder="Email">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input type="number" class="form-control" name="top_mobile" id="top_mobile" placeholder="Mobile No.">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" class="form-control" name="top_city" id="top_city" placeholder="City">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" class="form-control" name="top_brand_name" id="top_brand_name" placeholder="Brand Name">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" class="form-control" name="top_investment" id="top_investment" placeholder="Investment">
														</div>
													</div>
													
													<div class="col-12">
														<div class="form-group">
															<textarea name="top_requirment" class="form-control" id="top_requirment" cols="30" rows="2" placeholder="Requirement *" ></textarea>
														</div>
													</div>
													
													<div class="col-12">
														<div class="form-group">
															<textarea name="top_messageBUF" class="form-control" id="top_messageBUF" cols="30" rows="2" placeholder="Your Message *"></textarea>
														</div>
													</div>
												</div>
											</div>											
											<div class="col-12 text-center">
												<button type="submit" id="top_eq_Button" class="btn bigshop-btn">Send Message</button>
											</div>
									</div>
								</form>
							</div>
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>

