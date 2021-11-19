<?php

	unset($_SESSION['user']);
	unset($_SESSION['success']);

	$_SESSION['user']['valid'] = 'false';
	$_SESSION['message'] = '<p>See you again soon!</p>';

	session_unset();

	header("Location: index.php?menu=1");
	exit;
	
?>