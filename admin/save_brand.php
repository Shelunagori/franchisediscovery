<?php session_start();
require('config.php');
if(isset($_POST['add']))
{
	$category_id_Arrays = $_POST['category_id'];
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
	
	$footer_content = mysqli_real_escape_string($db,$_POST['footer_content']);
	$investment_range_in_words = mysqli_real_escape_string($db,$_POST['investment_range_in_words']);
	$brand_details = $_POST['brand_details'];
	$brand_id = 0;
	if(empty($chart_id)) {  $chart_id = 0; }
	$type = explode('.',$_FILES["slider_image"]["name"]);
	$type = $type[count($type)-1];
	$url = "../brand_images/".'_'.$name.'_'.uniqid(rand()).'.'.$type;
	$is_country = 'No';
	$is_city = 'No';
	$is_state = 'No';
	$is_gallery = 'No';
	$page_id = 3;
		
	$title = mysqli_real_escape_string($db,$_POST['title']);
	$meta_description = mysqli_real_escape_string($db,$_POST['meta_description']);
	$og_title = mysqli_real_escape_string($db,$_POST['og_title']);
	$meta_keywords = mysqli_real_escape_string($db,$_POST['meta_keywords']);
	$og_type = mysqli_real_escape_string($db,$_POST['og_type']);
	$meta_robots = mysqli_real_escape_string($db,$_POST['meta_robots']);
	$og_url = mysqli_real_escape_string($db,$_POST['og_url']);
	$meta_abstract = mysqli_real_escape_string($db,$_POST['meta_abstract']);
	$og_image = mysqli_real_escape_string($db,$_POST['og_image']);
	$meta_topic = mysqli_real_escape_string($db,$_POST['meta_topic']);
	$og_description = mysqli_real_escape_string($db,$_POST['og_description']);
	$meta_url = mysqli_real_escape_string($db,$_POST['meta_url']);
	$og_site_name = mysqli_real_escape_string($db,$_POST['og_site_name']);
	$g_name = mysqli_real_escape_string($db,$_POST['g_name']);
	$fb_admins = mysqli_real_escape_string($db,$_POST['fb_admins']);
	$canonical = mysqli_real_escape_string($db,$_POST['canonical']);
	$g_description = mysqli_real_escape_string($db,$_POST['g_description']);
	$g_image = mysqli_real_escape_string($db,$_POST['g_image']);
	$t_title = mysqli_real_escape_string($db,$_POST['t_name']);
	$t_description = mysqli_real_escape_string($db,$_POST['t_description']);
	$t_image = mysqli_real_escape_string($db,$_POST['t_image']);

	$company_name = mysqli_real_escape_string($db,$_POST['company_name']);	
	$fb_link = mysqli_real_escape_string($db,$_POST['fb_link']);	
	$insta_link = mysqli_real_escape_string($db,$_POST['insta_link']);	
	$tw_link = mysqli_real_escape_string($db,$_POST['tw_link']);	
	$yt_link = mysqli_real_escape_string($db,$_POST['yt_link']);	
	$delivery_partner = mysqli_real_escape_string($db,$_POST['delivery_partner']);	
	$other_link = mysqli_real_escape_string($db,$_POST['other_link']);	
	
	
	
	$seo_name = seo_url($name);
	$seo_name = $seo_name.'-franchises';
    if(in_array($type,array("jpg","jpeg","gif","png")))
	{
		move_uploaded_file($_FILES["slider_image"]["tmp_name"],$url);
	}
	
	$sql = "INSERT INTO brands(chart_id, name,company_name, title, contact_no, rating, avg_rating, food_type, area_reqired, investment_range,investment_range_in_words, franchise_outlets, brand_image,address,seo_name,footer_content,fb_link,insta_link,tw_link,yt_link,delivery_partner,other_link) VALUES('$chart_id','$name','$company_name','$description','$contact_no','$rating','$avg_rating','$food_type','$area_reqired','$investment_range','$investment_range_in_words','$franchise_outlets','$url','$address','$seo_name','$footer_content','$fb_link','$insta_link','$tw_link','$yt_link','$delivery_partner','$other_link')";
	
	if ($db->query($sql) === TRUE) {
		$brand_id = mysqli_insert_id($db);

		$total = count($_FILES['menudetail']['name']);
		if($total > 0)
		{
			for( $i=0 ; $i < $total ; $i++ ) {
				$tmpFilePath = $_FILES['menudetail']['tmp_name'][$i];
				if($tmpFilePath != ""){
					$newFilePath_menu = "../brand_menu_images/" .uniqid(rand()). $_FILES['menudetail']['name'][$i];
					if(move_uploaded_file($tmpFilePath, $newFilePath_menu)) {
						$menuImage = "INSERT INTO brand_menu_images(brand_id,image_path) 
						VALUES('$brand_id','$newFilePath_menu')";					
						$countryRes = $db->query($menuImage);	
					}
				} 
			}			
		}

		foreach($brand_details as $brand_detail)
		{ 
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
					$urls = "../roi_images/".'_'.$left_menu_name.'_'.uniqid(rand()).'.'.$types;
				}
				
				
				foreach($_FILES['brand_details']["tmp_name"] as $b){
					if(in_array($types,array("pdf","doc","docx","xls","xlsx")))
					{
						move_uploaded_file($b["content"],$urls);
					}
				}
	//	print_r($brand_id);
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
					$newFilePath = "../brand_gallery/" .uniqid(rand()). $_FILES['upload']['name'][$i];
					if(move_uploaded_file($tmpFilePath, $newFilePath)) {
						$gallery = "INSERT INTO brand_gallery(brand_id, brand_detail_id, gallery_image_path) 
						VALUES('$brand_id','$brand_detail_id','$newFilePath')";					
						$countryRes = $db->query($gallery);	
					}
				} 
			}			
		}
	
		$sql_seo = "INSERT INTO page_seo(page_id,brand_id,title, meta_description, meta_keywords, meta_robots, meta_abstract, meta_topic, meta_url, g_name, g_description, g_image, t_title, t_description, t_image, og_title, og_type, og_url, og_image, og_description, og_site_name, fb_admins, canonical) VALUES ('$page_id','$brand_id','$title','$meta_description','$meta_keywords','$meta_robots','$meta_abstract','$meta_topic','$meta_url','$g_name','$g_description','$g_image','$t_title','$t_description','$t_image','$og_title','$og_type','$og_url','$og_image','$og_description','$og_site_name','$fb_admins','$canonical')";
		$seo = $db->query($sql_seo);
		
		if(!empty($category_id_Arrays)){
			foreach($category_id_Arrays as $category_id){
	$sql_br = "INSERT INTO brand_rows(brand_id,category_id)VALUES('$brand_id','$category_id')";
				$save_rows = $db->query($sql_br);
			}
		}
			//exit;
		$_SESSION["status"] = "success";	
		
	}else
	{
		$_SESSION["status"] = "fail";
	}
	
	header("Location: add_brand.php");
	exit();
}

?>









