<?php
session_start();
require('config.php');
	$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$sql = "update brands set status = 'Deactive' where id = '$id' ";
		if ($db->query($sql) === TRUE) {
			$topCatsql = "delete from tobrand_catewise where brand_id = '$id' ";
			$res = $db->query($topCatsql);
			
			$gridsql = "delete from brand_grid where brand_id = '$id' ";
			$res_gridsql = $db->query($gridsql);
			
			$_SESSION["status"] = "delete_success";
		} else {
			
			$_SESSION["status"] = "delete_fail";	
		}

	header("Location: lsit_brand.php");
	exit();
?>