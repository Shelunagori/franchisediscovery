									
	<?php
	require('admin/config.php');
	$email = $_POST['email'];
	$sql = "SELECT * FROM registration where email = '".$email."' ";
	$query=mysqli_query($db,$sql);  
	
	$num_rows = mysqli_num_rows($query);
		if($num_rows > 0){
			echo 'false';
		}else{
			echo 'true';
		}	
		
?>