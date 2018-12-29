<?php 
	session_start();
	if(!isset($_SESSION['user_id'])){
	  header("location:login.php");
	}
	require('admin/config.php');
	$category_id_Arrays = $_POST['category_id'];
	$registration_id = $_SESSION['user_id']; 
	$chart_id = mysqli_real_escape_string($db,$_POST['chart_id']);
	$name = mysqli_real_escape_string($db,$_POST['name']);
	$rating = mysqli_real_escape_string($db,$_POST['rating']);
	$avg_rating = mysqli_real_escape_string($db,$_POST['avg_rating']);
	$area_reqired = mysqli_real_escape_string($db,$_POST['area_reqired']);
	$franchise_outlets = mysqli_real_escape_string($db,$_POST['franchise_outlets']);
	$investment_range = mysqli_real_escape_string($db,$_POST['investment_range']);
	$description = mysqli_real_escape_string($db,$_POST['description']);
	$food_type = mysqli_real_escape_string($db,$_POST['food_type']);
	$contact_no = mysqli_real_escape_string($db,$_POST['contact_no']);
	$address = mysqli_real_escape_string($db,$_POST['address']);
	//$footer_content = mysqli_real_escape_string($db,$_POST['footer_content']);
	$investment_range_in_words = mysqli_real_escape_string($db,$_POST['investment_range_in_words']);
	$brand_details = $_POST['brand_details'];
	$brand_id = 0;
	if(empty($chart_id)) {  $chart_id = 0; }
	$type = explode('.',$_FILES["slider_image"]["name"]);
	$type = $type[count($type)-1];
	$url = "brand_images/".'_'.$name.'_'.uniqid(rand()).'.'.$type;
	$is_country = 'No';
	$is_city = 'No';
	$is_state = 'No';
	$is_gallery = 'No';
	$page_id = 3;
		
	$seo_name = seo_url($name);
	$seo_name = $seo_name.'-franchises';
    if(in_array($type,array("jpg","jpeg","gif","png")))
	{
		move_uploaded_file($_FILES["slider_image"]["tmp_name"],$url);
	}
	
	$sql = "INSERT INTO brands(registration_id,chart_id, name, title, contact_no, rating, avg_rating, food_type, area_reqired, investment_range,investment_range_in_words, franchise_outlets, brand_image,address,seo_name) VALUES('$registration_id','$chart_id','$name','$description','$contact_no','$rating','$avg_rating','$food_type','$area_reqired','$investment_range','$investment_range_in_words','$franchise_outlets','$url','$address','$seo_name')";
	
	if ($db->query($sql) === TRUE) {
		$brand_id = mysqli_insert_id($db);

		$total = count($_FILES['menudetail']['name']);
		if($total > 0)
		{
			for( $i=0 ; $i < $total ; $i++ ) {
				$tmpFilePath = $_FILES['menudetail']['tmp_name'][$i];
				if($tmpFilePath != ""){
					$newFilePath_menu = "brand_menu_images/" .uniqid(rand()). $_FILES['menudetail']['name'][$i];
					if(move_uploaded_file($tmpFilePath, $newFilePath_menu)) {
						$newFilePath_menu = '../'.$newFilePath_menu;
						$menuImage = "INSERT INTO brand_menu_images(brand_id,image_path) 
						VALUES('$brand_id','$newFilePath_menu')";					
						$countryRes = $db->query($menuImage);	
					}
				} 
			}			
		}

		foreach($brand_details as $brand_detail)
		{ //print_r($brand_detail);
			if (array_key_exists("brand_country",$brand_detail))
			{
				$is_country = 'Yes';
			}else
			{
				$is_country = 'No';
			}
			if (array_key_exists("brand_city",$brand_detail))
			{
					$is_city = 'Yes';
			}else
			{
					$is_city = 'No';
			}
			
			if (array_key_exists("brand_state",$brand_detail))
			{
					$is_state = 'Yes';
			}else
			{
					$is_state = 'No';
			}
			
 			@$left_menu_name = mysqli_real_escape_string($db,$brand_detail['left_menu_name']);
			@$content = mysqli_real_escape_string($db,$brand_detail['content']); 
			
			
			$detail_sql = "INSERT INTO brand_details(brand_id, left_menu_name, content, is_country, is_city, is_gallery,is_state)
			VALUES($brand_id,'$left_menu_name','$content','$is_country','$is_city','$is_gallery','$is_state')";	
			$res = $db->query($detail_sql);
			$brand_detail_id = mysqli_insert_id($db);
			
			if($left_menu_name == "ROI"){ 
			
			$types='';$urls='';
				foreach($_FILES['brand_details']["name"] as $a){
					
					$types = explode('.',$a['content']);
					$types = $types[count($types)-1];
					$urls = "roi_images/".'_'.$left_menu_name.'_'.uniqid(rand()).'.'.$types;
				}
				
				
				foreach($_FILES['brand_details']["tmp_name"] as $b){
					if(in_array($types,array("pdf","doc","docx","xls","xlsx")))
					{
						move_uploaded_file($b["content"],$urls);
						$urls = '../'.$urls;
					}
				}
		
				$detail_sql_roi = "update brand_details set content = '$urls' where brand_id=$brand_id and left_menu_name='ROI'";	
				$db->query($detail_sql_roi);
				
			}
			
			
			if (array_key_exists("brand_country",$brand_detail))
			{
				foreach($brand_detail['brand_country'] as $countryDetail)
				{
					foreach($countryDetail['country_id'] as $cat_id)
					{
						//$cat_id = $countryDetail['country_id'];
						$country = "INSERT INTO brand_country(brand_id, brand_detail_id, country_id) 
						VALUES('$brand_id','$brand_detail_id','$cat_id')";					
						$countryRes = $db->query($country);								
					}
								
				}		
			}

			if (array_key_exists("brand_state",$brand_detail))
			{
				foreach($brand_detail['brand_state'] as $stateDetail)
				{
					foreach($stateDetail['state_id'] as $state_id)
					{
						$states = "INSERT INTO brand_state(brand_id, brand_detail_id, state_id) 
						VALUES('$brand_id','$brand_detail_id','$state_id')";					
						$countryRes = $db->query($states);	
					}		
				}		
			}


			
			if (array_key_exists("brand_city",$brand_detail))
			{
				foreach($brand_detail['brand_city'] as $cityDetail)
				{
					foreach($cityDetail['city_id'] as $city_id)
					{
						$city = "INSERT INTO brand_city(brand_id, brand_detail_id, city_id) 
						VALUES('$brand_id','$brand_detail_id','$city_id')";					
						$countryRes = $db->query($city);	
					}		
				}		
			}
		}

		$total = count($_FILES['upload']['name']);
		if($total > 0)
		{
			$detail_sql = "INSERT INTO brand_details(brand_id, left_menu_name,is_gallery)
			VALUES($brand_id,'Gallery','Yes')";	
			$res = $db->query($detail_sql);
			$brand_detail_id = mysqli_insert_id($db);
			for( $i=0 ; $i < $total ; $i++ ) {
				$tmpFilePath = $_FILES['upload']['tmp_name'][$i];
				if($tmpFilePath != ""){
					$newFilePath = "brand_gallery/" .uniqid(rand()). $_FILES['upload']['name'][$i];
					if(move_uploaded_file($tmpFilePath, $newFilePath)) {
						$newFilePath = '../'.$newFilePath;
						$gallery = "INSERT INTO brand_gallery(brand_id, brand_detail_id, gallery_image_path) 
						VALUES('$brand_id','$brand_detail_id','$newFilePath')";					
						$countryRes = $db->query($gallery);	
					}
				} 
			}			
		}
		if(!empty($category_id_Arrays)){
			foreach($category_id_Arrays as $category_id){
				$sql_br = "INSERT INTO brand_rows(brand_id,category_id)VALUES('$brand_id','$category_id')";
				$save_rows = $db->query($sql_br);
			}
		}
			
		echo '<script> alert("Congratulation !  Brand Created Successfully !"); </script>';	
		
	}else
	{
		echo '<script> alert("Sorry ! Something went wrong !"); </script>';	
	}
	
	header("Location: brand_list_brand.php");
	exit();
?>