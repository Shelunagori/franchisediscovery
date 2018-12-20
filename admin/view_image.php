<?php
	$attachment_file=base64_decode($_GET['image']);
?>
<img src="<?php echo $attachment_file;?>">
