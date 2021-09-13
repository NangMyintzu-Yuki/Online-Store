<?php  
	include("confs/config.php");
	unset($_SESSION['auth']);
	header("location:index.php");
?>