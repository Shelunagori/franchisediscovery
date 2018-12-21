<?php session_start();
require('config.php');
if(isset($_POST['add']))
{
	$dataTypes = mysqli_real_escape_string($db,$_POST['type']);
	$news_blog_id = mysqli_real_escape_string($db,$_POST['news_blog_id']);	
	$create_by = $_SESSION['login_id'];
	$create_on = date('Y-m-d');
	$news_blogs_id = 0;
	
	$sql = "INSERT INTO news_blog_contents(type, news_blog_id, status, created_by, created_on, deactivated_by, deactivated_on) 
	VALUES('$dataTypes','$news_blog_id','Active','$create_by','$create_on',0,'0000-00-00')"; 
	if ($db->query($sql) === TRUE) {
		$_SESSION["status"] = "success";
	} else {
		$_SESSION["status"] = "fail";
	}
	
	header("Location: content_limit_page.php");
	exit();		
}



if(isset($_GET['Action']))
{
	$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
	$sql = "update news_blog_contents set status ='Deactivate' where id = $id ";
	if ($db->query($sql) === TRUE) {			
		$_SESSION["status"] = "delete_success";
	} else {
		
		$_SESSION["status"] = "delete_fail";	
	}

	header("Location: content_limit_page.php");
	exit();
}


?>