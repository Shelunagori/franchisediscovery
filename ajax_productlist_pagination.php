<?php require('admin/config.php'); 
    
	$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 12;
	$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;
	$id = @$_GET['catId'];
	$cname = @$_GET['cname']; 
	

	$selectedValue = $_GET['selectedValue'];
		
	if(!empty($selectedValue)){
		
		if($selectedValue == 'no'){
			
			$query_brand=mysqli_query($db,"select brands.name,brands.seo_name,brands.brand_image,brands.investment_range_in_words,brands.title from brand_rows INNER JOIN brands ON brands.id = brand_rows.brand_id where brands.status = 'Active' and brand_rows.category_id = '$id'  order by brands.investment_range ASC LIMIT $limit OFFSET $offset");
		
		}else{
			
			$query_brand=mysqli_query($db,"select brands.name,brands.seo_name,brands.brand_image,brands.investment_range_in_words,brands.title from brand_rows INNER JOIN brands ON brands.id = brand_rows.brand_id where brands.status = 'Active' and brand_rows.category_id = '$id' order by brands.investment_range $selectedValue  LIMIT $limit OFFSET $offset");
		}
		
	


		if($query_brand->num_rows > 0)
		{	
			while($row_brand=mysqli_fetch_array($query_brand)){ 
			
		?>
		
			<div class="col-sm-4 col-12">
			<div class="article">
				<div class="brand-details">
					<h4> <?php echo $row_brand['name']; ?> </h4>
					<div class="brand-details-left">
						<a href="<?php echo $baseURL; ?>brand-detail/<?php echo $cname; ?>/<?php echo $row_brand['seo_name']; ?>">
						<img src="<?php echo $baseURL; ?><?php echo str_replace('../',"",$row_brand['brand_image']); ?>" class='img-height'>
						</a>
						<span><strong> Investment: </strong> Rs. <?php echo $row_brand['investment_range_in_words']; ?></span>
					</div>
					<div class="brand-details-right">
						<p><?php echo substr($row_brand['title'],0,75); ?>, 
						</p>
					</div>
					
				  <div class="brand-details-footer"> 
						<a target="_blank" href="<?php echo $baseURL; ?>brand-detail/<?php echo $cname; ?>/<?php echo $row_brand['seo_name']; ?>">
						<button type="button"  class="btn btn-danger">Brand Details</button>
						</a>
					</div>
				</div>
			</div>
		</div>
		
		<?php } 
		}   }else{ ?>
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
				