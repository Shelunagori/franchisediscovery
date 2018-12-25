<?php
	include('config.php');
	include('header.php');
	$status="";
	$message="";
		$id=base64_decode($_GET['id']);
		
		
?>
<style>

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
			
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						 <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>User Detail</h3>
					</div>
						
					<div class="box-body">
					<div class=col-md-12>
						<div class="col-sm-4">
							<a  class="btn btn-primary  Profile" href="profile_view.php?id=<?php echo base64_encode($id); ?>"><i class="fa fa-user "></i>  Profile</a>
						</div>
						<div class="col-sm-4">
							<a class="btn btn-primary t Favrouite" href="favrouite_view.php?id=<?php echo base64_encode($id); ?>"><i class="fa fa fa-thumbs-o-up"></i>  Favrouite List</a>
						</div>
					</div><br></br></br>
					<div class="cpl-md-12">
						<div class="col-sm-4">
							<a class="btn btn-primary Request" href="listing_request.php?id=<?php echo base64_encode($id); ?>"><i class="fa fa-file "></i>   Request Listing</a>
						</div>
						<div class="col-sm-4">
							<a class="btn btn-primary Ticket" href="support_ticket.php?id=<?php echo base64_encode($id); ?>"><i class="fa fa-ticket "></i>Tickets</a>
						</div>
					</div>
				</div>
			</div>
				</div>
				</div>
			<!-- /.box -->
		</div>
	</section>
</div>	


<?php
require('footer.php');
?>

     
	

