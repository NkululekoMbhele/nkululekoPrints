<?php
	require_once('../session.php');
	require_once('../class.user.php');
	$user_logout = new USER();

	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$user_logout->doLogout();
		$user_logout->redirect('../index.php');
	}

?>