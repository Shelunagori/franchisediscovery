<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
      <?php	
		session_start();
		require('admin/config.php');

		$data =  $_GET['data_row']; 
		$queryString = "SELECT * from categories where seo_name = '$data'";
		$resultString = mysqli_query($db, $queryString);
		$rowString = mysqli_fetch_assoc($resultString);
		$id = $rowString['id']; 
		$footer_content = $rowString['footer_content'];
		$get_Category_name = $rowString['name'];
		$category_id = 0; 
		if(empty($id)) { header("Location: $baseURL"); die(); }
		else { $category_id = $id;  }
		
		
		$query=mysqli_query($db,"SELECT * FROM page_seo where page_id = 2 and category_id = '$id' ");  
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
    <link rel="stylesheet" href="<?php echo $baseURL; ?>css/custom-pro.css">

    <!-- Responsive CSS -->
    <link href="<?php echo $baseURL; ?>css/responsive.css" rel="stylesheet">
    
	<link href="http://demos.codexworld.com/bootstrap-datetimepicker-add-date-time-picker-input-field/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	
	
	
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
	
	<!-- ***** New Arrivals Area Start ***** -->
	<?php $cname = '';
		$query=mysqli_query($db,"SELECT brands.id,brands.name as bname,brands.seo_name as brand_seo_name ,categories.seo_name as cname,brands.brand_image FROM tobrand_catewise INNER JOIN brands ON (tobrand_catewise.brand_id = brands.id) INNER JOIN categories ON (tobrand_catewise.category_id = categories.id) where brands.status = 'Active' and tobrand_catewise.category_id = '$id' order by tobrand_catewise.id DESC ");
		if($query->num_rows > 0)
		{ ?>
		<section class="header-slider section_padding_100 clearfix" style="background-image: url(http://franchisediscovery.in/img/bg-image-5.jpg);height: 220px;">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section_heading new_arrivals top-slider">
							<h3>Top <?php echo $get_Category_name; ?> Brands</h3>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="new_arrivals_slides">
							<?php
							while($row=mysqli_fetch_array($query)){
								$cname = $row['cname'];
							?>
								<div class="single_arrivals_slide">
									<a href="<?php echo $baseURL; ?>brand-detail/<?php echo $cname; ?>/<?php echo $row['brand_seo_name']; ?>"> 
										<img src="<?php echo $baseURL; ?><?php echo str_replace('../',"",$row['brand_image']); ?>" style="height: 150px;"> 
									</a>
								</div>
							<?php }  ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<input type="hidden" id="cname" value="<?php echo $cname; ?>" />
		<?php } ?>
    <!-- ***** New Arrivals Area End ***** -->


    <!-- ***** New Arrivals Area Start ***** -->
    <section class="new_arrivals_area  clearfix ">
        <div class="container ">
            <div class="row">
                <div class="col-10">
                    <div class="section_heading new_arrivals">
                        <h3>Popular <?php echo $get_Category_name; ?> Brands</h3>
                    </div>
                </div>
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
			<div class="row top-brands" id="results">
				<!-- all data appearing from ajax ajax_productlist_pagination.php  -->
			</div>
			<div class="row">
                <div class="col-12 mt-30">
                    <div class="shortcodes_content">
						<center>
							<div id="loader_image"><img src="<?php echo $baseURL; ?>img/loader.gif" alt="" width="24" height="24"> Loading...please wait</div>
							<div id="loader_message"></div>
						<center>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php include("footer.php");?>
	<input type="hidden" id="url" value="<?php echo $baseURL."ajax_productlist_pagination.php"; ?>" />
	<input type="hidden" id="CB_url" value="<?php echo $baseURL."ajax_contactBrand.php"; ?>" />
	<script type="text/javascript">
      var busy = false;
	  var limit = 12;
      var offset = 0;
	  var catId = <?php echo $id; ?>;	
	  var url_data = $('#url').val();
	  var cname = $('#cname').val();
      function displayRecords(lim, off) {  
        $.ajax({
          type: "GET",
          async: false,
          url: url_data,
          data: "limit="+lim+"&offset="+off+"&catId="+catId+"&cname="+cname,
          cache: false,
          beforeSend: function() {
            $("#loader_message").html("").hide();
            $('#loader_image').show();
          },
          success: function(html) {
           $('#loader_image').hide();
		   
			if (html.length == 4) {
              $("#loader_message").html('<button class="btn btn-default" type="button">No more records.</button>').show()
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

	$(document).ready(function() {	  
		$('.contactBrand').click(function(){
			var obj = $(this).attr('contactBrand');
			var CB_brandValue = $('#CB_brandValue'+obj).val();
			var customer_name = $('#CB_name'+obj).val();
			var CB_email = $('#CB_email'+obj).val();
			var CB_contact_no = $('#CB_contact_no'+obj).val();
			var CB_date_time = $('#CB_date_time'+obj).val();
			var CB_investment_budget = $('#CB_investment_budget'+obj).val();
			var CB_message = $('#CB_message'+obj).val();
			var url_data = $('#CB_url').val();	
			var CB_time = $('#CB_time'+obj).val();	
			CB_date_time = CB_date_time + CB_time;
			var isSend = 0; 
			
			if(customer_name == '')
			{
				alert('Please Enter Customer Name');
				isSend = 1;
				return false;
			}
			
			if(CB_email == '')
			{
				alert('Please Enter Email Address');
				isSend = 1;
				return false;
			}
			
			if(CB_contact_no == '')
			{
				alert('Please Enter Contact Number');
				isSend = 1;
				return false;
			}
			
			if(CB_date_time == '')
			{
				alert('Please Select Date');
				isSend = 1;
				return false;
			}
			
			if(CB_time == '')
			{
				alert('Please Select Time');
				isSend = 1;
				return false;
			}
			
			if(CB_investment_budget == '')
			{
				alert('Please Select Investment budget');
				isSend = 1;
				return false;
			}
			
			if(CB_message == '')
			{
				alert('Please Enter Message');
				isSend = 1;
				return false;
			}
			
			if(isSend == 0)
			{
				$.ajax({
				  type: "GET",
				  async: false,
				  url: url_data,
				  data: "brand_id="+CB_brandValue+"&customer_name="+customer_name+"&CB_email="+CB_email+"&CB_contact_no="+CB_contact_no+"&CB_date_time="+CB_date_time+"&CB_investment_budget="+CB_investment_budget+"&CB_message="+CB_message,
				  cache: false,
				  beforeSend: function() {
					
				  },
				  success: function(html) {
					    $('.modal').modal('hide');
					//alert(html);
				  }
				});					
			}
			
		});
	});	

    </script>





	 
</body>

</html>