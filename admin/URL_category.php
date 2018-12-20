<?php
	include('config.php');
	$category_query=mysqli_query($db,"SELECT id,name FROM categories");
	while($category_result=mysqli_fetch_array($category_query))
	{
		$category_id=$category_result['id'];
		$category_name=$category_result['name'];
		$link = SEO_URL($category_name);
		$link = $link.'-franchises';
		$category_update_query="UPDATE categories SET seo_name = '$link' WHERE id='$category_id'";
		$category_update_result=mysqli_query($db,$category_update_query);
	}

?>