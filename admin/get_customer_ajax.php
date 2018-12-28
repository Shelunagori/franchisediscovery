<?php 
require('config.php');

$customer_type = @$_GET['customer_type'];
if($customer_type == 'all'){
	$query=mysqli_query($db,"SELECT * FROM registration where status = 0 order by id DESC ");  
			
			while($row=mysqli_fetch_array($query)){
				echo "<option value='".$row['id']."'>".$row['first_name'].' '.$row['last_name']."</option>";			
		 } 
}else if($customer_type == 'investor' || $customer_type == 'brand'){
		
		$query=mysqli_query($db,"SELECT * FROM registration where reg_type = '$customer_type' and status = 0 order by id DESC ");  
			
			while($row=mysqli_fetch_array($query)){
				echo "<option value='".$row['id']."'>".$row['first_name'].' '.$row['last_name']."</option>";			
		 } 
	}else{ ?>
		<div class="popular_section_heading mb-30 mt-30">
			<h2 class="title-text">No List found</h2>
		</div>	
	<?php } exit;
 ?>