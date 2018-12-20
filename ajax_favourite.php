<?php
	session_start();
	include('admin/config.php');
	$brand_id=$_GET['brand_id'];
	$user_id=$_SESSION['user_id'];
	
	
		$queryString = "SELECT * from favrouite where user_id = '$user_id' and  brand_id = '$brand_id'";
		$resultString = mysqli_query($db, $queryString);
		
		if($resultString->num_rows > 0){ 
			$rowString = mysqli_fetch_assoc($resultString);
			$id = $rowString['id']; 
			$sql = "delete from favrouite where id = '$id'";
			if ($db->query($sql) === TRUE) {
				echo '1';
			} else {
				echo '3';
			}	
		}
		else
		{
			$sql="INSERT INTO favrouite(user_id,brand_id) VALUES ('$user_id','$brand_id')";
			$result=mysqli_query($db,$sql);
			if($result)
			{
				echo '2';
			}
			else
			{
				echo '3';
			}
		}
?>