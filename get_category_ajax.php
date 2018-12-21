<?php require('admin/config.php'); 
    
	$selectedValue = @$_GET['selectedValue'];
	if(!empty($selectedValue)){
		if($selectedValue == 'no'){
			$query=mysqli_query($db,"SELECT brand_grid.id as gridID,brand_grid.position,brands.id, brands.name , brands.brand_image, brands.investment_range_in_words,brands.category_id,brands.seo_name as brand_seo_name FROM brand_grid INNER JOIN brands ON (brand_grid.brand_id = brands.id) order by brand_grid.position ASC");
		}else{
			$query=mysqli_query($db,"SELECT brand_grid.id as gridID,brands.id, brands.name , brands.brand_image, brands.investment_range_in_words,brands.category_id,brands.seo_name as brand_seo_name FROM brand_grid INNER JOIN brands ON (brand_grid.brand_id = brands.id) order by investment_range $selectedValue");
		}
		
					while($row=mysqli_fetch_array($query)){
						?>
						<div class="col-6 col-sm-3 col-md-3 col-lg-2 ">
							<div class="article">
							<?php
								$catID = $row['category_id'];
								$query_cat = "SELECT seo_name as catSEO FROM categories where id = '$catID'";
								$result_cat = mysqli_query($db, $query_cat);
								$row_cat = mysqli_fetch_assoc($result_cat);
								$catSEO =  $row_cat['catSEO'];
							?>
							
							<a href="<?php echo $baseURL; ?>brand-detail/<?php echo $catSEO; ?>/<?php echo $row['brand_seo_name']; ?>"> 
								<div class="brand-details">
								<div class="brand-details-left">
									<center>
										<img class="gridImg" src="<?php echo $baseURL; ?><?php echo str_replace('../',"",$row['brand_image']); ?>">
									</center>
								</div>
								<span class="brand-name-home"> <?php echo substr($row['name'],0,20); ?>  </span>
								<span> <strong> Investment: </strong> Rs. <?php echo $row['investment_range_in_words']; ?></span>
							</div>							
							</a>
							</div>
						</div>
					<?php } 
	}else{ ?>
		<div class="popular_section_heading mb-30 mt-30">
						<h2 class="title-text">No data found</h2>
		</div>	
	<?php } ?>
	 <script>
$(document).ready(function(){
			var _arrays = [];
	 $('.article').each(function(){ 
		var intHeight = 0; 
		$(this).find('div.brand-details').each(function(){
			 if ($(this).outerHeight() > intHeight) {
				intHeight = $(this).outerHeight(); 
				_arrays.push(intHeight);
			}
		});
	});   
	
	var rowHeights = Math.max.apply(Math,_arrays);
		$('.article').each(function(){ 
			$(this).find('div.brand-details').attr('style','height:'+rowHeights+'px');
		});
});
	</script>	