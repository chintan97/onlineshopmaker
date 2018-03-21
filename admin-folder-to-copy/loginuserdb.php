<?php
session_start();
$username=$_POST["uname"];
$pwd=$_POST["pwd"];
	$file = fopen('../owner_data.json', 'r');
	$file_read = fread($file, filesize('../owner_data.json'));
	$file_data = json_decode($file_read, true);
	$file_pwd = $file_data[$username]['password'];
	if ($file_pwd == $pwd){
		$_SESSION['username']=$username;
		$_SESSION['other']=$file_data[$username]['name'].'#'.$file_data[$username]['email'];
		header("location:index.php");
	}
?>