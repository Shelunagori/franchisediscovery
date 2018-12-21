<?php 
session_start();
require('config.php');
$status = '';
$message = '';

	if(isset($_POST['add']))
	{	
		$position_Arrays = $_POST['position'];
		$countPosition=1;
		foreach($position_Arrays as $position_Array){
			$sql_seo = "update brand_grid ";
			$sql="update brand_grid set position=$countPosition where id=$position_Array";
			$exists=mysqli_query($db,$sql);
			if ($exists) {
				$status = 'success';
				$message = 'Brand successfully  added to sequence!';
			}else{
				$status = 'fail';
				$message = 'Something went wrong !!';
			}
			$countPosition++;	
		}
		header("Location: brand_grid.php");
		exit();
	}

	?>

