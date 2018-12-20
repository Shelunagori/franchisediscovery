<?php
	include('config.php');
	$status=$_GET['status'];
	$ticket_id=$_GET['ticket_id'];
	$user_query="UPDATE support_ticket SET status='$status' WHERE id='$ticket_id'";
		if ($db->query($user_query) === TRUE)
		{
			echo "Status changed successfully !";
		}
		else
		{
			echo "Some thing went wrong !";
		} 
	
	
?>