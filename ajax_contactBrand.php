<?php require('admin/config.php');

	$brand_id  =  mysqli_real_escape_string($db,base64_decode($_GET['brand_id']));  
	$customer_name = mysqli_real_escape_string($db,$_GET['customer_name']); 
	$CB_email = mysqli_real_escape_string($db,$_GET['CB_email']); 
	$CB_contact_no = mysqli_real_escape_string($db,$_GET['CB_contact_no']); 
	$CB_date_time = mysqli_real_escape_string($db,$_GET['CB_date_time']); 
	$CB_investment_budget = mysqli_real_escape_string($db,$_GET['CB_investment_budget']); 
	$CB_message = mysqli_real_escape_string($db,$_GET['CB_message']);
	
	
	$sql = "INSERT INTO contact_brands(name, email, contact_no, brand_id, date_time, investment_budget, message) VALUES('$customer_name','$CB_email','$CB_contact_no','$brand_id','$CB_date_time','$CB_investment_budget','$CB_message')";
	
	if ($db->query($sql) === TRUE) {
		echo 'Success';
	}
	else{
		echo 'Fail';
	}
	exit;
 ?>