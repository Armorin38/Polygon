<?php
	error_reporting(E_ERROR);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$con = mysqli_connect('127.0.0.1', 'root', '', 'Polygon_BD');
	mysqli_set_charset($con, 'utf8');
	if (!$con) {
		die("Connection failed: " . mysqli_connect_error());
	}

?>