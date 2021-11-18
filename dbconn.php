<?php

	if (!defined('__Dinamo__')) {
		die("Hacking prevention via define");
	}

	$MySQL = mysqli_connect("localhost","root","","ntpws") or die('Error connecting to MySQL server.');
?>