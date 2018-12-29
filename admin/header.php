<?php session_start();
 if(!isset($_SESSION['login_id'])){
      header("location:index.php");
   }

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Franchise Discovery | Admin Panel</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link rel="stylesheet" href="admin_assest/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="admin_assest/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="admin_assest/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="admin_assest/plugins/select2/select2.min.css">	
  <link rel="stylesheet" href="admin_assest/plugins/iCheck/all.css">
  <link rel="stylesheet" href="admin_assest/css/datepicker.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Franchise Discovery</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Franchise Discovery</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		  <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <span class="hidden-xs">
				<i class="fa fa-user" aria-hidden="true"></i> 
				<?php echo ucfirst($_SESSION['login_user']); ?>
			 </span>
            </a>
            <ul class="dropdown-menu">
             <li class="user-footer">
                <div class="pull-left">
                  <a href="admin/changepassword" class="btn btn-default btn-flat">
				  <i class="fa fa-user-secret" aria-hidden="true"></i>
				  Change Password</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">
				  <i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="treeview">
          <a href="dashboard.php">
           <i class="fa fa-asterisk" aria-hidden="true"></i><span>Dashboard</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
        </li>

		<li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-cogs"></i> <span> Master & Setup</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
			<li class="treeview">
			  <a href="category.php">
				<i class="fa fa-list-alt" aria-hidden="true"></i> <span>Category Master</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			</li>

			<li class="treeview">
			  <a href="chart.php">
				<i class="fa fa-pie-chart"></i> 
					<span>Chart Master</span> <i class="fa fa-angle-left pull-right"></i>
			  </a>
			</li>				
			<li class="treeview">
			  <a href="slider.php">
				<i class="fa fa-sliders"></i> <span>Slider Master</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			</li>			

			<li class="treeview">
			  <a href="testimonial.php">
				<i class="fa fa-list-alt" aria-hidden="true"></i> <span>Testimonial</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			</li>					
			
			<li><a href="employee_master.php">
				<i class="fa fa-fw fa-child"></i> <span>Employee Master</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
			</li>
      <li><a href="expenses.php">
        <i class="fa fa-fw fa-child"></i> <span>Expenses Master</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
      </li>
      <li><a href="new_category.php">
        <i class="fa fa-fw fa-child"></i> <span>New Categories</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
      </li>

			<li><a href="footer_page.php">
					<i class="fa fa-fw fa-flag"></i> <span>Footer Pages </span>
					<i class="fa fa-angle-left pull-right"></i> 
				</a>
			</li>
			
			<li><a href="countryMaster.php">
					<i class="fa fa-circle-o"></i> <span>Country Master</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
			</li>
            <li><a href="stateMaster.php"><i class="fa fa-circle-o"></i> <span>State Master</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a></li>
			<li><a href="cityMaster.php"><i class="fa fa-circle-o"></i> <span>City Master</span> 
				<i class="fa fa-angle-left pull-right"></i></a></li>
				
			<li><a href="department_master.php"><i class="fa fa-circle-o"></i> <span>Department Master</span> 
				<i class="fa fa-angle-left pull-right"></i></a></li>	
				
				<li><a href="related_services.php"><i class="fa fa-circle-o"></i> <span>Related Service</span> 
				<i class="fa fa-angle-left pull-right"></i></a></li>	

			
          </ul>
        </li> 

		<li class="treeview">
		  <a href="brand_grid.php">
			<i class="fa fa-th"></i> <span>Brand Grid</span>
			<i class="fa fa-angle-left pull-right"></i>
		  </a>
		</li>
		<li class="treeview">
		  <a href="top_brand.php">
			<i class="fa fa-fw fa-cube"></i> <span>Top Brand</span>
			<i class="fa fa-angle-left pull-right"></i>
		  </a>
		</li>		




		<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Brand Master</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_brand.php"><i class="fa fa-circle-o"></i> Add New</a></li>
            <li><a href="lsit_brand.php"><i class="fa fa-circle-o"></i> List View</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-feed"></i> <span> Franchise News & Blogs </span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="addNews.php"><i class="fa fa-circle-o"></i> Add News & Blogs</a></li>
			<li><a href="list_blogs_news.php"><i class="fa fa-circle-o"></i> List News & Blogs </a></li>
		  </ul>
        </li> 

		<li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-bullseye"></i> <span> SEO </span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="addSEO.php"><i class="fa fa-circle-o"></i> Add Page SEO</a></li>
			<li><a href="list_seo.php"><i class="fa fa-circle-o"></i> List SEO </a></li>
		  </ul>
        </li> 


		<li class="treeview">
          <a href="listing_request.php">
            <i class="fa fa-fw fa-sticky-note-o"></i> <span>Listing Request</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
        </li>	
		
		<li class="treeview">
          <a href="news_letter.php">
            <i class="fa fa-fw fa-sticky-note-o"></i> <span>News Letter Subscribe</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
        </li>	
		<li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-user"></i> <span>Customer</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="customer_list.php"><i class="fa fa-circle-o"></i>Brand</a></li>
            <li><a href="Investor.php"><i class="fa fa-circle-o"></i>Investor</a></li>
          </ul>
        </li> 
          <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-user"></i> <span>Form</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="investor_dataform.php"><i class="fa fa-circle-o"></i>Investor Enquiry</a></li>
            <li><a href="brand_enquiry.php"><i class="fa fa-circle-o"></i>Brand Enquiry</a></li>
          </ul>
        </li> 


		<li class="treeview">
          <a href="notification.php">
            <i class="fa fa-fw fa-bell"></i> <span>Notification</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
        </li>			
		<li class="treeview">
          <a href="support_ticket.php">
            <i class="fa fa-fw fa-bell"></i> <span>Support Ticket</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
        </li>		
		
		<li class="treeview">
			<a href="#">
				<i class="fa fa-fw fa-cogs"></i> <span> Reports</span> <i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li class="treeview">
				  <a href="enquire_report.php">
					<i class="fa fa-th"></i> <span>Enquire Report</span>
					<i class="fa fa-angle-left pull-right"></i>
				  </a>
				</li>
				<li class="treeview">
				  <a href="advertise_with_us.php">
					<i class="fa fa-th"></i> <span>Advertise With Us</span>
					<i class="fa fa-angle-left pull-right"></i>
				  </a>
				</li>
				<li class="treeview">
				  <a href="feedback.php">
					<i class="fa fa-th"></i> <span>Feedback</span>
					<i class="fa fa-angle-left pull-right"></i>
				  </a>
				</li>
				<li class="treeview">
				  <a href="brand_enquire_report.php">
					<i class="fa fa-th"></i> <span>Brand Enquire Report</span>
					<i class="fa fa-angle-left pull-right"></i>
				  </a>
				</li>	
			</ul>
        </li> 		
		
		
       </ul>
    </section>
    <!-- /.sidebar -->
  </aside>