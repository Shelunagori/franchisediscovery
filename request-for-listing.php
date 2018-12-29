<!DOCTYPE html>
<?php session_start();
	 if(!isset($_SESSION['user_id'])){
	  header("location:login.php");
   }
	include('admin/config.php');
	 $email=$_SESSION['email'];
	$status="";
	$message="";
	if(isset($_POST['submit']))
	{
		$brand_name=$_POST['brand_name'];
		$outlet_qty=$_POST['outlet_qty'];
		$investment_required=$_POST['investment_required'];
		$market_area=$_POST['market_area'];
		$query=mysqli_query($db,"SELECT * FROM registration WHERE email='$email'");
		$type = explode('.',$_FILES["slider_image"]["name"]);
		$type = $type[count($type)-1];
		$url_folder = "../request_for_listing/";
		$url_name = uniqid(rand()).'.'.$type;
		$url = $url_folder.$url_name;
		$url_insert = "request_for_listing/".$url_name;
		$total = count($_FILES['slider_image']['name']);
		if($total > 0)
		{
			move_uploaded_file($_FILES["slider_image"]["tmp_name"],$url_insert);	
		}else
		{
			$url = '';
		}
		while($result=mysqli_fetch_array($query))
		{
			$id=$result['id'];
			$sql = "INSERT INTO listing_request(brand_name,outlet_qty,investment_required,market_area,register_id,file_path) VALUES ('$brand_name','$outlet_qty','$investment_required','$market_area','$id','$url_insert')";
			$result_query=mysqli_query($db,$sql);
			if($result_query)
			{
			$status = 'success';
			$message = 'Request successfully  sent!';
			} else {
				$status = 'fail';
				$message = 'Something went wrong !';
			}
		}
	}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title  -->
    <title>Franchise Discovery</title>

    <!-- Favicon  -->
    <link rel="shortcut icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
  
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
	
	
    
	  <!-- <<<<<<<<<<<<<<<<<<<< My Profile Area Start >>>>>>>>>>>>>>>>>>>>>>>> -->
    <div class="my_profile_area section_padding_50">
        <div class="container">
		<div class="row">
		<div class="col-md-12">
			<?php if($status == 'success')
			{ ?>
				<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong><?php echo $message; ?></strong> 
				</div>
		  <?php }?>
		  <?php if($status == 'fail')
			{ ?>
				<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong><?php echo $message; ?></strong> 
				</div>
		  <?php }?>		

		 </div>
		<div class="col-sm-12">
		  <div class="section_heading new_arrivals">
                        <h1>Client Area</h1>
                    </div>
					</div>
					</div>
            <div class="row">
			<div class="col-12 col-md-3">
					<?php $currentPage = 'Request For Listing'; 
						include('sidebar.php'); ?>
				</div>
			<div class="col-12 col-md-6">
                    <div class="profile_form">
                        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="text-left" enctype='multipart/form-data'>
                            <div class="row">
                                <div class="col-12 col-md">
                                    <div class="form-group">
                                        <label for="first_name">Brand Name</label>
                                        <input type="text" class="form-control" name="brand_name" >
                                    </div>
                                </div>
                                <div class="col-12 col-md">
                                    <div class="form-group">
                                        <label for="last_name">No of outlets</label>
                                        <input type="text" class="form-control" name="outlet_qty" >
                                    </div>
                                </div>
                            </div>
							
							<div class="row">
                                <div class="col-12 col-md">
                                   <div class="form-group">
										<label for="">Investment Details</label>
										<input type="text" class="form-control" name="investment_required" >
									</div>
                                </div>
								<div class="col-12 col-md">
										<div class="form-group">
										<label for="p_number">Expansion Plan</label>
										<input type="text" class="form-control" name="market_area" >
									</div>
                                </div>
							</div>
							<div class="row">
								<div class="col-12 col-md">
                                   <div class="form-group">
										<label for="">Attachment</label>
										<input type="file" class="form-control" name="slider_image">
									</div>
                                </div>	
							</div>
                            
                          
                            <button type="submit" class="btn btn-success" name="submit">Send Request</button>
                        </form>
                    </div>
                </div>

              
            </div>
        </div>
    </div>
    <!-- <<<<<<<<<<<<<<<<<<<< My Profile Area End >>>>>>>>>>>>>>>>>>>>>>>> -->
	

     <?php include("footer.php");?>

    
	 
		
</body>

</html>