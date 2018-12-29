<?php
session_start();
require('config.php');
	$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$sql = "update sms_bulks set is_deleted = '1' where id = '$id' ";
		if ($db->query($sql) === TRUE) {
			
			$_SESSION["status"] = "success";
		} else {
			
			$_SESSION["status"] = "fail";	
		}

	header("Location: sms_bulks.php");
	exit();
?>