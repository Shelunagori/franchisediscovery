<?php session_start();
require('config.php');

	if(isset($_POST['editSEO']))
	{	$id = mysqli_real_escape_string($db,$_POST['id']);
		$page_id = mysqli_real_escape_string($db,$_POST['page_id']);
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

		
		$sql = "update page_seo set page_id = '$page_id',title = '$title', meta_description = '$meta_description',meta_keywords = '$meta_keywords',meta_robots = '$meta_robots',meta_abstract = '$meta_abstract',meta_topic = '$meta_topic',meta_url = '$meta_url',g_name = '$g_name',g_description = '$g_description',g_image = '$g_image',t_title = '$t_title',t_description = '$t_description',t_image = '$t_image',og_title = '$og_title',og_type = '$og_type',og_url = '$og_url',og_image = '$og_image',og_description = '$og_description',og_site_name = '$og_site_name',fb_admins = '$fb_admins',canonical = '$canonical' where id = '$id' ";
		
		if ($db->query($sql) === TRUE) {
			$_SESSION["status"] = 'success';
		} else { 
			$_SESSION["status"] = 'fail';
		}
		
		header("Location: list_seo.php"); exit();
		
	}
?>