<?php
	if(!empty($_SESSION['uid'])) {
		$session_id=$_SESSION['uid'];
		$hide= 0;
	} 
	if(empty($session_id)) {
		$url=$BASE_URL.$link.$_SESSION['uid'];
		header("Location: $url");
	}
?>