<?php
	require_once 'functions.php';
	//getting POST with usual security
	$quackName = htmlspecialchars($_POST["name"]);
	//Check with Super Function if everything is okay or not
	if(regexAndWrite($quackName) == true)
		header('Location:  ../index.php');
	else
		header('Location:  ../index.php');
?>