<?php
	include('config.php');
	$category_id=$_GET['category_id'];
	$sql="SELECT * FROM brands WHERE category_id='$category_id'";
	$result=mysqli_query($db,$sql);

	$arr = "<option value=''> --Select--";

	while($rowDaata = mysqli_fetch_array($result))
	{
		$name=$rowDaata['name'];
		$arr.="<option value='".$rowDaata['id']."'>".$name."";
	}
	echo $arr;
?>