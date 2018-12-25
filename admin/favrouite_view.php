<?php
include('config.php');
$id=base64_decode($_GET['id']);
if(isset($_POST['add']))
{
	$brand_id=$_POST['brand_id'];
	$add_fav="INSERT INTO favrouite(user_id,brand_id) VALUES ('$id','$brand_id')";
	$add_result=mysqli_query($db,$add_fav);
}

include('header.php');
?>
<style>
.top
{
	margin-top: 35px;
}
.dataTables_wrapper { padding: 0px 30px 0px 30px !important; }
#exTab1 .tab-content {
color : white;
background-color: #428bca;
padding : 5px 15px;
}

#exTab2 h3 {
color : white;
background-color: #428bca;
padding : 5px 15px;
}
.Profile
{
	margin-left: 158px;
	width:124px;
}
.Request
{
	margin-left: 172px;
}
.Ticket
{
	margin-left: 6px;
	width: 112px;
}
.link{
padding : 5px 15px;
}
.favrouite
{
	margin-left: 10px;
}

/* remove border radius for the tab */

#exTab1 .nav-pills > li > a {
border-radius: 0;
}

/* change border radius for the tab , apply corners on top*/

#exTab3 .nav-pills > li > a {
border-radius: 4px 4px 0 0 ;
}

#exTab3 .tab-content {
color : white;
background-color: #428bca;
padding : 5px 15px;
}
</style>

	
<div class="content-wrapper">
    <section class="content">
		<div class="row">
			
			<div class="col-md-6">
				<div class="box">
					<div class="box-header">
						 <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>User Detail</h3>
						 
					</div>
						
					<div class="box-body">
					<form method="post" enctype="multipart/form-data">
					
	<div class="col-md-6">
		<form role="form" method="post" action="#" enctype="multipart/form-data">
			<table>
				<tr>
					<td><select name="brand_id" class="form-control">
						<option value="">--select brand--</option>
						<?php
							$brand_options="select * from brands";
								$brand=mysqli_query($db,$brand_options);
								while($brand_results=mysqli_fetch_array($brand))
								{
									echo"<option value=".$brand_results['id'].">".$brand_results['name']."</option>";
								}
						?>
						
					</select>
					</td>
					<td>
						<button type="submit" name="add" class="btn btn-primary pull-right">Add</button>
					</td>
				</tr>
			</table>
		</form>
			<div class="box top">
				
				<?php 
				$fav_query="select * FROM favrouite WHERE user_id=$id";
					$fav_row=mysqli_query($db,$fav_query);
						while($fav_result=mysqli_fetch_array($fav_row))
						{
				?>
					<div class="box-body">
						<div class="form-group">
							<label for="name">Brand: </label>
							<?php
								$brand_id=$fav_result['brand_id'];
								$brand_query="select * from brands where id=$brand_id";
								$brand_row=mysqli_query($db,$brand_query);
								while($brand_result=mysqli_fetch_array($brand_row))
								{
									echo $brand_result['name'];
								}
							?>
							
							
					   </div>
					</div>
				<?php } ?> 
			</div>

			
			
      <!-- /.box -->
  </div> 
					</div>
				</div>
			</div>
		</div>
			<!-- /.box -->
	</section>
</div>	
<?php
include('footer.php');
?>