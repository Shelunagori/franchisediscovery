<?php session_start();
require('config.php');
//print_r($_POST);exit;
if(isset($_POST['add']))
{
	$dataTypes = mysqli_real_escape_string($db,$_POST['type']);
	$category_id = mysqli_real_escape_string($db,$_POST['category_id']);
	$main_title = mysqli_real_escape_string($db,$_POST['main_title']);
	$create_on = mysqli_real_escape_string($db,date('Y-m-d',strtotime($_POST['create_on'])));
	$content = mysqli_real_escape_string($db,$_POST['content']);
	$video_url = mysqli_real_escape_string($db,$_POST['video_url']);
	$create_by = $_SESSION['login_id'];
	$news_blogs_id = 0;
	$type = explode('.',$_FILES["image"]["name"]);
	$type = $type[count($type)-1];
	
	$seo_name = seo_url($main_title);
	
	$url = "../news_blogs/".uniqid(rand()).'.'.$type;
	
	 $sql = "INSERT INTO news_blogs(type, category_id, title, content, image, video_url, create_by, create_on,seo_name) VALUES('$dataTypes','$category_id','$main_title','$content','$url','$video_url','$create_by','$create_on','$seo_name')"; 
	if ($db->query($sql) === TRUE) {
		$news_blogs_id = mysqli_insert_id($db);
		if(in_array($type,array("jpg","jpeg","gif","png")))
		{
			move_uploaded_file($_FILES["image"]["tmp_name"],$url);
		}
		$_SESSION["status"] = "success";
	} else {
		$_SESSION["status"] = "fail";
	}
	
	if($dataTypes == 'Blogs')
	{
		$page_id = 11;
	}
	else if($dataTypes == 'News'){
		$page_id = 9;
	}
	else if($dataTypes == 'Video')
	{
		$page_id = 13;
	}

		
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

	$sql_seo = "INSERT INTO page_seo(page_id,category_id,news_blogs_id,title, meta_description, meta_keywords, meta_robots, meta_abstract, meta_topic, meta_url, g_name, g_description, g_image, t_title, t_description, t_image, og_title, og_type, og_url, og_image, og_description, og_site_name, fb_admins, canonical) VALUES ('$page_id','$category_id','$news_blogs_id','$title','$meta_description','$meta_keywords','$meta_robots','$meta_abstract','$meta_topic','$meta_url','$g_name','$g_description','$g_image','$t_title','$t_description','$t_image','$og_title','$og_type','$og_url','$og_image','$og_description','$og_site_name','$fb_admins','$canonical')";
	$seo = $db->query($sql_seo);	
	
	
	
	
	header("Location: list_blogs_news.php");
	exit();		
}


//print_r($_POST);exit;
if(isset($_POST['editBLogNews']))
{	
	$dataTypes = mysqli_real_escape_string($db,$_POST['type']);
	$category_id = mysqli_real_escape_string($db,$_POST['category_id']);
	$main_title = mysqli_real_escape_string($db,$_POST['main_title']); 
	$create_on = mysqli_real_escape_string($db,date('Y-m-d',strtotime($_POST['create_on'])));
	$content = mysqli_real_escape_string($db,$_POST['content']);
	$video_url = mysqli_real_escape_string($db,$_POST['video_url']);
	$id = mysqli_real_escape_string($db,$_POST['id']);
	$create_by = $_SESSION['login_id'];
//	print_r($_FILES['image']); exit;
	$total = $_FILES['image']['error']; 
	
	$seo_name = seo_url($main_title);
	
	if($total == 0)
	{
		$type = explode('.',$_FILES["image"]["name"]);
		$type = $type[count($type)-1];
		
	    $url = "../news_blogs/".uniqid(rand()).'.'.$type;
		if(in_array($type,array("jpg","jpeg","gif","png")))
		{
			move_uploaded_file($_FILES["image"]["tmp_name"],$url);
		}	
		$sql = "update news_blogs set image = '$url' where id = '$id'";
		 $resultData = $db->query($sql);
	}	
	
	
	 $sql = "update news_blogs set type = '$dataTypes', category_id='$category_id', title = '$main_title', content = '$content', video_url = '$video_url' ,create_on = '$create_on', seo_name = '$seo_name' where id = '$id'  "; 
	if ($db->query($sql) === TRUE) {
		/* if(in_array($type,array("jpg","jpeg","gif","png")))
		{
			move_uploaded_file($_FILES["image"]["tmp_name"],$url);
		} */

		if($dataTypes == 'Blogs')
		{
			$page_id = 11;
		}
		else if($dataTypes == 'News'){
			$page_id = 9;
		}
		else if($dataTypes == 'Video')
		{
			$page_id = 13;
		}

		
		$seo_id = mysqli_real_escape_string($db,$_POST['seo_id']);
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
		$news_blogs_id = $id;
		if(!empty($seo_id) && $seo_id > 0)
		{ 
			$sql_seo = "update page_seo set page_id = '$page_id', title = '$title', meta_description = '$meta_description',meta_keywords = '$meta_keywords',meta_robots = '$meta_robots',meta_abstract = '$meta_abstract',meta_topic = '$meta_topic',meta_url = '$meta_url',g_name = '$g_name',g_description = '$g_description',g_image = '$g_image',t_title = '$t_title',t_description = '$t_description',t_image = '$t_image',og_title = '$og_title',og_type = '$og_type',og_url = '$og_url',og_image = '$og_image',og_description = '$og_description',og_site_name = '$og_site_name',fb_admins = '$fb_admins',canonical = '$canonical' where id = '$seo_id' ";
			
			$seo = $db->query($sql_seo);		
		}else
		{   
			$sql_seo = "INSERT INTO page_seo(page_id,category_id,news_blogs_id,title, meta_description, meta_keywords, meta_robots, meta_abstract, meta_topic, meta_url, g_name, g_description, g_image, t_title, t_description, t_image, og_title, og_type, og_url, og_image, og_description, og_site_name, fb_admins, canonical) VALUES ('$page_id','$category_id','$news_blogs_id','$title','$meta_description','$meta_keywords','$meta_robots','$meta_abstract','$meta_topic','$meta_url','$g_name','$g_description','$g_image','$t_title','$t_description','$t_image','$og_title','$og_type','$og_url','$og_image','$og_description','$og_site_name','$fb_admins','$canonical')";
			$seo = $db->query($sql_seo);	
		}		
		
		
		
		$_SESSION["status"] = "update_success";
	} else {
		$_SESSION["status"] = "update_fail";
	}

	
	header("Location: list_blogs_news.php");
	exit();			
}

if(isset($_GET['del']))
{
	$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
	$sql = "delete from news_blogs where id = '$id' ";
	if ($db->query($sql) === TRUE) {			
		$_SESSION["status"] = "delete_success";
	} else {
		
		$_SESSION["status"] = "delete_fail";	
	}

	header("Location: list_blogs_news.php");
	exit();
}


?>