<?php session_start();
require('config.php');

$action = @$_GET['action'];
$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));

if(isset($_POST['add']))
{
	
	$content = mysqli_real_escape_string($db,$_POST['content']);
	$created_by= $_SESSION['login_id'];
	$created_on= date('Y-m-d');
$sql = "INSERT INTO news_letter_rows(content,created_by,created_on) VALUES('$content','$created_by','$created_on')";
	if ($db->query($sql) === TRUE) {
		$news_letter_row_id = mysqli_insert_id($db);
		
		$sql="SELECT * FROM  news_letter order by news_letter.id ASC  ";
		$result=mysqli_query($db,$sql);
		$num_rowss = $result->num_rows;
			if(@$num_rowss > 0){
				while($row=mysqli_fetch_array($result)){
					$news_letter_id = $row['id'];
					$sql = "INSERT INTO news_letter_emails(news_letter_id,news_letter_row_id) VALUES('$news_letter_id','$news_letter_row_id')";
					if ($db->query($sql) === TRUE) {
						$_SESSION["status"] = "success";
					}else{
						$_SESSION["status"] = "fail";
					}
				}
				
			}
	}else{
		$_SESSION["status"] = "fail";
	}	
	
	header("Location: news_letter_emails.php");
	exit();
}

if($action == "Del"){
	$sql = "update news_letter_rows set is_deleted = '1' where id=$id";
		if ($db->query($sql) === TRUE) {
			$_SESSION["status"] = "success";
			$sqlDelete = "delete from news_letter_emails where news_letter_row_id = '$id'";
			$db->query($sqlDelete);
		}else{
			$_SESSION["status"] = "fail";
		}
}else{
	$_SESSION["status"] = "fail";
}
header("Location: news_letter_emails.php");
	exit();

?>