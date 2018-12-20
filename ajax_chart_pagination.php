<?php require('admin/config.php'); 
    
	$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 12;
	$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;
	$id = @$_GET['chartId'];
	$cname = @$_GET['cname'];
	
	$query_brand=mysqli_query($db,"select * from brands where status = 'Active' and chart_id = '$id' LIMIT $limit OFFSET $offset ");
			if(!empty($query_brand))
			{	
				while($row_brand=mysqli_fetch_array($query_brand)){ 
					$cat_id = $row_brand['category_id'];
					$queryString = "SELECT seo_name from categories where id = '$cat_id'";
					$resultString = mysqli_query($db, $queryString);
					$rowString = mysqli_fetch_assoc($resultString);
					$cname = $rowString['seo_name']; 
				
			?>
			
				<div class="col-sm-4 col-12">
					<div class="brand-details">
						<h3> <?php echo $row_brand['name']; ?> </h3>
						<div class="brand-details-left">
							<a href="<?php echo $baseURL; ?>brand-detail/<?php echo $cname; ?>/<?php echo $row_brand['seo_name']; ?>">
							<img src="<?php echo $baseURL; ?><?php echo str_replace('../',"",$row_brand['brand_image']); ?>">
							</a>	
						</div>
						<div class="brand-details-right">
							<p> <?php echo substr($row_brand['title'],0,75).'...'; ?>, 
								<a href="<?php echo $baseURL; ?>brand-detail/<?php echo $cname; ?>/<?php echo $row_brand['seo_name']; ?>">
									read more 
								</a>
							</p>
						</div>
					  <div class="brand-details-footer"> 
						<a href="<?php echo $baseURL; ?>brand-detail/<?php echo $cname; ?>/<?php echo $row_brand['seo_name']; ?>">
							<button type="button" class="btn btn-danger">Contact Brand</button>
						</a>
					   </div>
					</div>
				</div>
			
			<?php } 
			} else { ?>  
			
					<div class="popular_section_heading mb-30 mt-30">
						<h2 class="title-text">No data found</h2>
					</div>				
			
			<?php }  ?>