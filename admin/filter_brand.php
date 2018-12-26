<?php
if(isset($_POST['brand_filter']))
			{
				$first_name=$_POST['name'];
				$email=$_POST['email'];
				$from_date= $_POST['from_datepicker']?date('d-m-Y',strtotime($_POST['from_datepicker'])):null;
				if(!$from_date==null)
					$from=$from_date;

				$to_date= $_POST['to_datepicker']?date('d-m-Y',strtotime($_POST['to_datepicker'])):null;
				if(!$to_date==null)
					$to=$to_date;

				if(!$first_name == null && $email == null && @$from == null  && @$to == null)
				{
					$brand_where="AND name LIKE '%$first_name%'";
				}
				else if($first_name==null && !$email==null && @$from== null && @$to == null)
				{
					$brand_where="AND email LIKE '%$email%'";
				}

				

				else if($first_name==null && $email==null && !@$from== null && !@$to == null)
				{
					$brand_where="AND enquite_date BETWEEN '$from' AND '$to'";
				}
				else if(!$first_name==null && !$email==null && !@$from== null && !@$to == null)
				{
					$brand_where="AND enquite_date BETWEEN '$from' AND '$to' AND email LIKE '%$email%' AND name LIKE '%$first_name%'";
				}
				else if($first_name==null && $email==null && !@$from== null && @$to == null)
				{
					$brand_where="AND  enquite_date > '$from'";
				}
				
				else if(!$first_name==null && !$email==null && @$from== null 
					&& @$to == null)
				{
					$brand_where="AND  email LIKE '%$email%' AND name LIKE '%$first_name%'";
				}
				
				else if($first_name==null && $email==null && @$from== null && !@$to == null)
				{
					$brand_where="AND enquite_date > '$to'";
				}
				
				
				

		}
?>
