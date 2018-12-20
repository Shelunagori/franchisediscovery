<?php require('admin/config.php'); 
    
	$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 12;
	$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;
	$cat = @$_GET['cat'];

	if(!empty($cat) and $cat != 0)
	{
		$query_nw=mysqli_query($db,"SELECT news_blogs.id,news_blogs.video_url,news_blogs.type,admin.name as create_by, categories.name,categories.seo_name as catSeoName, news_blogs.title, news_blogs.content, news_blogs.image, news_blogs.create_on,news_blogs.seo_name FROM news_blogs INNER JOIN admin ON (news_blogs.create_by = admin.id) INNER JOIN categories ON (news_blogs.category_id = categories.id) where news_blogs.type = 'Video' and news_blogs.category_id = '$cat' order by news_blogs.id DESC LIMIT $limit OFFSET $offset");  
		
	}else
	{
		$query_nw=mysqli_query($db,"SELECT news_blogs.id,news_blogs.video_url,news_blogs.type,admin.name as create_by, categories.name,categories.seo_name as catSeoName, news_blogs.title, news_blogs.content, news_blogs.image, news_blogs.create_on,news_blogs.seo_name FROM news_blogs INNER JOIN admin ON (news_blogs.create_by = admin.id) INNER JOIN categories ON (news_blogs.category_id = categories.id) where news_blogs.type = 'Video' order by news_blogs.id DESC LIMIT $limit OFFSET $offset");  
	}							
	
	if(!empty($query_nw)){ 
	while($row_nw=mysqli_fetch_array($query_nw)){ ?>	
		<div class="col-12 col-sm-4">
			<div class="single_blog_area mb-30 video">
				<div class="blog_post_thumb">
					<iframe width="100%" height="200" src="<?php echo trim($row_nw['video_url']); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
				<?php $title = str_replace("?","",$row_nw['title']);  ?>
			   <h3> <a href="<?php echo $baseURL; ?>videodetail/<?php echo $row_nw['catSeoName']; ?>/<?php echo $row_nw['seo_name']; ?>"> <?php echo $row_nw['title']; ?> </a></h3>
			</div>
		</div>
	<?php }}else { echo 0; exit; } ?>		
		