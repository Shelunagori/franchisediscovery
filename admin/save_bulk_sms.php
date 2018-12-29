<?php 
session_start();
require('config.php');

	if(isset($_POST['save']))
	{
		$sms_to = mysqli_real_escape_string($db,$_POST['sms_to']);
		$customer_type = mysqli_real_escape_string($db,$_POST['customer_type']);
		$customer_id = $_POST['customer_id'];
		$employee_id = $_POST['employee_id'];
		$created_on = date('Y-m-d');
		$created_by = $_SESSION['login_id'];
		$sms_content = mysqli_real_escape_string($db,$_POST['sms_content']);
		
		
		$sql = "INSERT INTO sms_bulks(sms_content, sms_to, created_on, created_by) values('$sms_content','$sms_to','$created_on','$created_by')";
		
		if ($db->query($sql) === TRUE) {
			$sms_bulk_id = mysqli_insert_id($db);
			
			if($sms_to == "customer"){
				if($customer_type == 'all'){
					$query=mysqli_query($db,"select * from registration where status = 0");
					while($row=mysqli_fetch_array($query)){
						$cust_id = $row['id'];
						$sms_bulk_rows_sql = "INSERT INTO sms_bulk_rows(sms_bulk_id, employee_id, registration_id, status) VALUES($sms_bulk_id,'0','$cust_id','0')";	
						$res = $db->query($sms_bulk_rows_sql);
					}
				}else{
					if(!empty($customer_id)){
						foreach($customer_id as $cust_id){ 
							$sms_bulk_rows_sql = "INSERT INTO sms_bulk_rows(sms_bulk_id, employee_id, registration_id, status) VALUES($sms_bulk_id,'0','$cust_id','0')";	
							$res = $db->query($sms_bulk_rows_sql);
						}
					}
				}
				
				
			}else if($sms_to == "employee"){
				if(!empty($employee_id)){
					foreach($employee_id as $emp_id){
						$sms_bulk_rows_sql = "INSERT INTO sms_bulk_rows(sms_bulk_id, employee_id, registration_id, status) VALUES($sms_bulk_id,'$emp_id','0','0')";	
						$res = $db->query($sms_bulk_rows_sql);
					}
				}	
				
			}
			$_SESSION["status"] = "success";
			
		}else{
			$_SESSION["status"] = "fail";
		}
		
		header("Location: sms_bulks.php");
		exit();
	}
?>