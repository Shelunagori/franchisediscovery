<?php 
		$reg_type=$_SESSION['reg_type'];
?>
<style>
	#sidebar_wid_menu li a:hover {
		background-color: #0056b3 !important;
	}
	
	
	.acolor { color : #fff !important; }
</style>
 <div class="sidebar_widget_menu">
                        <nav id="sidebar_wid_menu">
                            <ul>
								<?php
									if($reg_type=="Brand")
										
										{?>	
											<li><a class="<?php if($currentPage == 'Manage Profile') { echo 'active acolor';}?>" href="manage-profile.php"><i class="ti-unlock"></i>Manage Profile</a></li>
											<li><a class="<?php if($currentPage == 'Brand') { echo 'active acolor';}?>" href="brand_list_brand.php"><i class="ti-wand"></i> Brand List</a></li>
											
											<li><a class="<?php if($currentPage == 'CRM Details') { echo 'active acolor';}?>" href="crm-details.php"><i class="ti-user"></i> CRM Details</a></li>
											<li><a class="<?php if($currentPage == 'Request For Listing') { echo 'active acolor';}?>" href="request-for-listing.php"><i class="ti-menu"></i> Request For Listing</a></li>
											<li><a class="<?php if($currentPage == 'Marketing With Us') { echo 'active acolor';}?>" href="marketing-with-us.php"><i class="ti-heart"></i> Marketing With Us</a></li>
											<li><a class="<?php if($currentPage == 'Support') { echo 'active acolor';}?>" href="support.php"><i class="fa fa-life-ring"></i> Support </a></li>
											<li><a class="<?php if($currentPage == 'My Support Tickets') { echo 'active acolor';}?>" href="my-support-tickets.php"><i class="fa fa-ticket"></i> My Support Tickets </a></li>
											<li><a class="<?php if($currentPage == 'Notification') { echo 'active acolor';}?>" href="notification.php"><i class="fa fa-bell-o"></i> Notification</a></li>
											<li><a href="<?php echo $baseURL; ?>logout.php"><i class="ti-lock"></i> Logout</a></li>
								<?php
										}
										else
										{
								?>
								<ul>
										<li><a class="<?php if($currentPage == 'Manage Profile') { echo 'active acolor';}?>" href="manage-profile.php" ><i class="ti-unlock"></i>Manage Profile</a></li>
										<li><a class="<?php if($currentPage == 'CRM Details') { echo 'active acolor';}?>" href="crm-details.php"><i class="ti-user"></i> CRM Details</a></li>
										<li><a class="<?php if($currentPage == 'Favourite List') { echo 'active acolor';}?>" href="favourite.php"><i class="ti-menu"></i> Favourite List</a></li>
										
										<li><a class="<?php if($currentPage == 'Book Appointment') { echo 'active acolor';}?>" href="book_appointment.php"><i class="ti-heart"></i> Book Appointments</a></li> 
											<li><a class="<?php if($currentPage == 'Support') { echo 'active acolor';}?>" href="support.php"><i class="fa fa-life-ring"></i> Support </a></li>
											<li><a class="<?php if($currentPage == 'My Support Tickets') { echo 'active acolor';}?>" href="my-support-tickets.php"><i class="fa fa-ticket"></i> My Support Tickets </a></li>
										<li><a class="<?php if($currentPage == 'Notification') { echo 'active acolor';}?>" href="notification.php"><i class="fa fa-bell-o"></i> Notification</a></li>
										<li><a href="<?php echo $baseURL; ?>logout.php"><i class="ti-lock"></i> Logout</a></li>
								</ul>
								<?php
										}
								?>
                                
                            </ul>
                        </nav>
                    </div>