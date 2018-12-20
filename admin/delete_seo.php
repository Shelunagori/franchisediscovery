<?php
session_start();
require('config.php');
	$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$sql = "delete from page_seo where id = '$id' ";
		if ($db->query($sql) === TRUE) {
			
			$_SESSION["status"] = "delete_success";
		} else {
			
			$_SESSION["status"] = "delete_fail";	
		}

	header("Location: list_seo.php"); exit();
?>