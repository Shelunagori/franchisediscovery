<?php
require('config.php');

	$cat_id =  $_GET['cat_id']; 
?>

<select name="brand_id" class="form-control select2" style="width: 100%;" required>
				  <option value="" selected="selected">Select Brand</option>
					<?php
						$query=mysqli_query($db,"select id,name from brands where category_id = '$cat_id'");
						while($row=mysqli_fetch_array($query)){
					?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
					<?php } ?>
				</select>