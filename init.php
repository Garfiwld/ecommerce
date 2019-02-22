<?php
	session_start();
?>
<?php
	$db = mysqli_connect('sql202.freehost.in.th', 'feton_23024403', 'pBxpW#37', 'feton_23024403_ecommerce_db');
	if(mysqli_connect_errno()) {
		echo 'Database connection failed with following errors: '.mysqli_connect_error();
		die();
	}
	//require_once $_SERVER['DOCUMENT_ROOT'].'/ecommerce/config.php';
?>
