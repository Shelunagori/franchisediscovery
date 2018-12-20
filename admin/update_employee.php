<?php
	include('config.php');
	$employee_id=$_GET['employee_id'];
	$user_id=$_GET['userid'];
	$user_query="UPDATE registration SET employee_id='$employee_id' WHERE id='$user_id'";
		if ($db->query($user_query) === TRUE)
		{
			echo "done";
		}
		else
		{
			echo "fail";
		} 
	
	
?>