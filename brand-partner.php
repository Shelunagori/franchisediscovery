<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php session_start();	
		require('admin/config.php'); ?>	

  

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
	
	


    <!-- ***** New Arrivals Area Start ***** -->
    <section class="  clearfix section_padding_50">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading new_arrivals">
                        <h1>Brand Partner</h1>
                    </div>
                </div>
            </div>
		    
			
			      <div class="row ">
   
			    <div class="col-12  col-sm-4 ">
			    <div class="brand-details ">
			  <h3> Brand Name </h3>
	            <img src="img/bg-img/cat-1.jpg">
			 
			   </div>
			   </div>
			
			  <div class="col-12  col-sm-4 ">
			    <div class="brand-details ">
				  <h3> Brand Name </h3>
	            <img src="img/bg-img/cat-2.jpg">
			 
			   </div>
			   </div>
			  <div class="col-12  col-sm-4 ">
			    <div class="brand-details ">
			  		  <h3> Brand Name </h3>
	            <img src="img/bg-img/cat-3.jpg">
			 
			   </div>
			   </div>
			  
			
		
			</div>
			
			 
			      <div class="row ">
   
			    <div class="col-12  col-sm-4 ">
			    <div class="brand-details ">
			  <h3> Brand Name </h3>
	            <img src="img/bg-img/cat-4.jpg">
			 
			   </div>
			   </div>
			
			  <div class="col-12  col-sm-4 ">
			    <div class="brand-details ">
				  <h3> Brand Name </h3>
	            <img src="img/bg-img/cat-1.jpg">
			 
			   </div>
			   </div>
			  <div class="col-12  col-sm-4 ">
			    <div class="brand-details ">
			  		  <h3> Brand Name </h3>
	            <img src="img/bg-img/cat-2.jpg">
			 
			   </div>
			   </div>
			  
			
		
			</div>
			
			
            <div class="row">
                <div class="col-12 mt-30">
                    <div class="shortcodes_content">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">«</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">9</a></li>
                                <li class="page-item"><a class="page-link" href="#">10</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">»</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
     <?php include("footer.php");?>
		 
	 
</body>

</html>