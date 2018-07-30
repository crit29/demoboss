<?php 
	// error_reporting(0);
	ob_start();
	session_start();
	if (isset($_GET['lg']) == 'en') {
		DEFINE("LANGUAGE_DIRECT","languages/en/");
	} else {
		DEFINE("LANGUAGE_DIRECT","languages/vn/");
	}
	require "router/router.php";
 ?>