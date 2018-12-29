</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 --><script src="admin_assest/dist/js/app.min.js"></script>
<script src="admin_assest/dist/js/demo.js"></script>
<script src="admin_assest/plugins/jQuery/jQuery-2.2.0.min.js"></script>

<script src="admin_assest/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="admin_assest/plugins/select2/select2.full.min.js"></script>
<script src="admin_assest/dist/js/app.min.js"></script>
<link rel="stylesheet" href="admin_assest/plugins/datepicker/datepicker3.css">
<script  src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
<script 
src="https://mpryvkin.github.io/jquery-datatables-row-reordering/1.2.2/jquery.dataTables.rowReordering.js"></script>
<script  src='http://code.jquery.com/ui/1.11.4/jquery-ui.min.js'></script>
<script src="admin_assest/plugins/iCheck/icheck.min.js"></script>
<script src="admin_assest/bootstrap/js/bootstrap.min.js"></script>
<script src="admin_assest/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="admin_assest/plugins/fastclick/fastclick.js"></script>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

<script src="admin_assest/plugins/datatables/dataTables.bootstrap.min.js"></script>



<script type="text/javascript">
$(function () {
 $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
  $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

 $(".select2").select2();
 $('#datepicker').datepicker({
      autoclose: true
    });
     });
  </script>
 


<script>
  $(function () {
	
    var table = $("#example1").DataTable({
		rowReorder: true,
		paging:   false,
       // ordering: false,
		 "createdRow": function( row, data, dataIndex ) {
         $(row).attr('id', 'row-' + dataIndex);
      },
	});
	
   table.draw();
   
   table.rowReordering();
   
   
   
   $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
	
	$('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
	  $('#example5').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
	$('#example4').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
	
  });
</script>  
</body>
</html>
