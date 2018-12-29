<?php
session_start();
	 if(!isset($_SESSION['user_id'])){
	  header("location:login.php");
   }
require('admin/config.php');
	$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$sql = "update brands set status = 'Deactive' where id = '$id' ";
		if ($db->query($sql) === TRUE) {
			$topCatsql = "delete from tobrand_catewise where brand_id = '$id' ";
			$res = $db->query($topCatsql);
			
			$gridsql = "delete from brand_grid where brand_id = '$id' ";
			$res_gridsql = $db->query($gridsql);
			
			$rowssql = "delete from brand_rows where brand_id = '$id' ";
			$res_rowsql = $db->query($rowssql);
			
			//$_SESSION["status"] = "delete_success";
			echo '<script> alert("Brand Deleted Successfully !"); </script>';	
		} else {
			echo '<script> alert("Sorry ! Something went wrong !"); </script>';	
			//$_SESSION["status"] = "delete_fail";	
		}
	header("Refresh:0; url= brand_list_brand.php");
	//header("Location: brand_list_brand.php");
	exit();
?>