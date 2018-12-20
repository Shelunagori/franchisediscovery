<?php
	include('config.php');
	$employee_id=$_GET['employee_name'];
	$user_id=$_GET['user_id'];
	$user_query="UPDATE registration SET employee_id='$employee_id' WHERE id='$user_id'";
	echo $user_query;
	exit;
	
		if ($db->query($user_query) === TRUE)
		{
			echo "done";
		}
		else
		{
			echo "fail";
		}
	}
	
?>