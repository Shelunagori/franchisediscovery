<?php
		session_start();
		require('admin/config.php');
		
		$data =  $_GET['rowValue']; 
		$queryString = "SELECT * from chart where seo_name = '$data'";
		$resultString = mysqli_query($db, $queryString);
		$rowString = mysqli_fetch_assoc($resultString);
		 $cname = $rowString['name']; 
		 $id = $rowString['id']; 
		 if(empty($id)) 
		{ header("Location: $baseURL"); die(); } 

?>
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<head>
    <meta charset="UTF-8">
      <?php			
		$query=mysqli_query($db,"SELECT * FROM page_seo where page_id = 7 ");  
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
     <?php include("header.php");
	 
	 	 
		//$cname = base64_decode($_GET['rowValue']);
	 
	 ?>
    <section class="new_arrivals_area  clearfix " style="margin-top:0px;">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading new_arrivals">
                        <h1><?php echo $cname; ?></h1>
						<input type="hidden" id="cname" value="<?php echo $cname; ?>" />
                    </div>
                </div>
            </div>
			<div class="row top-brands" id="results">
		    <?php $rowCount = 1;  ?>

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
<?php include("footer.php");?>
	<input type="hidden" id="url" value="<?php echo $baseURL."ajax_chart_pagination.php"; ?>" />
 <script type="text/javascript">
      var busy = false;
	  var limit = 12;
      var offset = 0;
	  var chartId = <?php echo $id; ?>;	
	    var url_data = $('#url').val();
	  var cname = $('#cname').val();
      function displayRecords(lim, off) {  
        $.ajax({
          type: "GET",
          async: false,
          url: url_data,
          data: "limit="+lim+"&offset="+off+"&chartId="+chartId+"&cname="+cname,
          cache: false,
          beforeSend: function() {
            $("#loader_message").html("").hide();
            $('#loader_image').show();
          },
          success: function(html) {
            $("#results").append(html);
            $('#loader_image').hide();
            if (html == "") {
              $("#loader_message").html('<button class="btn btn-default" type="button">No more records.</button>').show()
            } else {
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