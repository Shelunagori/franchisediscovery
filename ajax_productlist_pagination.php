<?php require('admin/config.php'); 
    
	$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 12;
	$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;
	$id = @$_GET['catId'];
	$cname = @$_GET['cname']; 
	
	
	$selectedValue = @$_GET['selectedValue'];
	if(!empty($selectedValue)){
		if($selectedValue == 'no'){
			$query=mysqli_query($db,"SELECT brand_grid.id as gridID,brand_grid.position,brands.id, brands.name , brands.brand_image, brands.investment_range_in_words,brands.category_id,brands.seo_name as brand_seo_name FROM brand_grid INNER JOIN brands ON (brand_grid.brand_id = brands.id) order by brand_grid.position ASC");
		}else{
			$query=mysqli_query($db,"SELECT brand_grid.id as gridID,brands.id, brands.name , brands.brand_image, brands.investment_range_in_words,brands.category_id,brands.seo_name as brand_seo_name FROM brand_grid INNER JOIN brands ON (brand_grid.brand_id = brands.id) order by investment_range $selectedValue");
		}
	isme category se data lana hai
	
	
		$query_brand=mysqli_query($db,"select * from brand_rows where status = 'Active' and category_id = '$id' LIMIT $limit OFFSET $offset");
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
		}    ?>
		
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
				