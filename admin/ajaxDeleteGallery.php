<?php
require('config.php');

	$id = mysqli_real_escape_string($db,$_GET['id']);
	$sql = "delete from brand_gallery where id = '$id'";
	if ($db->query($sql) === TRUE) {
		$status = 'success';
		
	} else {
		$status = 'fail';
		
	}

	echo json_encode($status); exit;

?>