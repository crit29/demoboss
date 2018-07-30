<?php 
	if (isset($_GET['lg'])&&$_GET['lg'] == 'en') {
		$_SESSION['lg'] == 'en';
	} elseif (isset($_GET['lg'])&&$_GET['lg'] == 'vn') {
		$_SESSION['lg'] == 'vn';
	}
	header('location:?router=common/dashboard');

?>