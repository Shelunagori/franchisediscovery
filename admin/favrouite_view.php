<?php
include('config.php');
@$id=base64_decode($_GET['id']);
if(isset($_POST['add']))
{
	$brand_id=$_POST['brand_id'];
	$add_fav="INSERT INTO favrouite(user_id,brand_id) VALUES ('$id','$brand_id')";
	$add_result=mysqli_query($db,$add_fav);
}

		if(@$_GET["Action"] == "Del")
			{
				$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
				echo$delete_query = "delete from favrouite where id=$id";
					if ($db->query($delete_query) === TRUE) {
						header('location:favrouite_view.php');
					} else {
						$status = 'fail';
						$message = 'Something went wrong !';
					}
			}
include('header.php');
?>
<style>
.favr
{
	padding-right:290px;
}
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
						<?php
							$sql=mysqli_query($db,"select first_name from registration where id=$id");
							$result=mysqli_fetch_array($sql);

						?>
						 <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>Favrouite List Of <?= $result['first_name'] ?></h3>
						 
					</div>
						
					<div class="box-body">
					
			<div class="col-md-">
				<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">Add to Favrouite</h3>

			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				  <i class="fa fa-times"></i></button>
			  </div>
			</div>
			<div class="box-body">
				<div class="box-body">
					<div class="form-group">
					<form role="form" method="post" action="#" enctype="multipart/form-data">
					<table>
						<tr>
							<td><select  name="brand_id" class="form-control favr select2 employee_name " style="width: 100%;" userid=<?php echo $rows['id']; ?>>
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
							<button type="submit" name="add" class="btn btn-primary ">Add</button>
						</td>
					</tr>
				</table>
			</form>
					</div>
				 </div>
			</div>       
        </div>


					
				
				
      <!-- /.box -->
  </div> 
				</div>
			</div>
			<div>
			<table class="table table-striped">
				<tr>
					<th>S.no</th>
					<th>Brand</th>
					<th>Action</th>
				</tr>
					<?php 
						$i=0;
						$fav_query="select * FROM favrouite WHERE user_id=$id";
						$fav_row=mysqli_query($db,$fav_query);
						while($fav_result=mysqli_fetch_array($fav_row))
						{
							$i++;
					?>
				<tr>
					<td><?= $i ?></td>
					<td><?php
							$brand_id=$fav_result['brand_id'];
							$brand_query="select * from brands where id=$brand_id";
							$brand_row=mysqli_query($db,$brand_query);
							while($brand_result=mysqli_fetch_array($brand_row))
							{
								echo $brand_result['name'];
							}
						?></td>
						<td>
							<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="favrouite_view.php?Action=Del&id=<?php echo base64_encode($fav_result['id']); ?>">
							<span class="fa fa-times"></span>
							</a></td>
					</tr>		
							
				<?php } ?> 
					
			</table>
		</div>
		</div>
		
	</div>
	</section>
</div>	
<?php
include('footer.php');
?>