<?php require('config.php'); 
    
	$selectedValue = @$_GET['selectedValue'];
	if(!empty($selectedValue)){
		
		$query=mysqli_query($db,"SELECT * FROM news_blogs where type = '$selectedValue' and status = 'Active' order by id DESC ");  
			
			while($row=mysqli_fetch_array($query)){
				echo "<option value='".$row['id']."'>".$row['title']."</option>";			
		 } 
	}else{ ?>
		<div class="popular_section_heading mb-30 mt-30">
			<h2 class="title-text">No List found</h2>
		</div>	
	<?php } exit;?>
	