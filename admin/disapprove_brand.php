<?php
session_start();
require('config.php');
	$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$sql = "update brands set is_approve = 'Pending' where id = '$id' ";
		if ($db->query($sql) === TRUE) {
			echo '<script> alert("Brand Disapproved Successfully !"); </script>';	
		} else {
			
			echo '<script> alert("Sorry ! Something went wrong !"); </script>';	
		}

	header("Refresh:0; url= lsit_brand.php");
	exit();
?>