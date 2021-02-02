<?php
	include('db.php');
	$session_uid='';
	$_SESSION['uid']=''; 
	if(empty($session_uid) && empty($_SESSION['uid'])) {
		$url='signin.php';
		header("Location: $url");
	}
?>