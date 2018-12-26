<?php
include('config.php');
@$cat_id=$_GET['cat_id'];
	$according_category="SELECT * From brand_rows WHERE category_id='$cat_id'";
	$according_category_result=mysqli_query($db,$according_category);
	$arr = "<option value=''> --Select--";

	while($category_row=mysqli_fetch_array($according_category_result))
	{
		$brand_id=$category_row['brand_id'];
		$brand_query="select name,id from brands where id=$brand_id";
		$brand_result=mysqli_query($db,$brand_query);
		$brand_row=mysqli_fetch_array($brand_result);
	
		$brand_name=$brand_row['name'];
		$arr.="<option value='".$brand_row['id']."'>".$brand_name."";
	

	}
		
			echo $arr;

?>
