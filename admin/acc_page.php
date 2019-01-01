<?php
	include('config.php');
	$page_id=$_GET['page_id'];
	echo$sql="SELECT * FROM position WHERE page_id='$page_id'";
	$result=mysqli_query($db,$sql);

	$arr = "<option value=''> --Select--";

	while($rowDaata = mysqli_fetch_array($result))
	{
		$position_name=$rowDaata['position_name'];
		$arr.="<option value='".$rowDaata['position_name']."'>".$position_name."";
	}
	echo $arr;
?>