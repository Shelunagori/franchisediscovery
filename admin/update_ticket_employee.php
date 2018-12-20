<?php
	include('config.php');
	$employee_id=$_GET['employee_id'];
	$ticket_id=$_GET['ticket_id'];
	$user_query="UPDATE support_ticket SET employee_id='$employee_id' WHERE id='$ticket_id'";
		if ($db->query($user_query) === TRUE)
		{
			echo "Employee assigned successfully !";
		}
		else
		{
			echo "Some thing went wrong !";
		} 
	
	
?>