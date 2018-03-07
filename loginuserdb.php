<?php
session_start();
$username=$_POST["uname"];
$pwd=$_POST["pwd"];
if (file_exists('user_folders/'.$username)){
	$file = fopen('user_folders/'.$username.'/owner_data.json', 'r');
	$file_read = fread($file, filesize('user_folders/'.$username.'/owner_data.json'));
	$file_data = json_decode($file_read, true);
	$file_pwd = $file_data[$username]['password'];
	if ($file_pwd == $pwd){
		$_SESSION['username']=$username;
		$_SESSION['other']=$file_data[$username]['name'].'#'.$file_data[$username]['email'];
		if($_SESSION['go']==1){
			$_SESSION['go']=0;
			header("location:websitebuilder.php");
		}
		else if ($_SESSION['go']==2){
			$_SESSION['go']=0;
			header("location:admin-page.php");
		}
		else{
			header("location:index.php");
		}
	}
}
else{
	echo '<script language="javascript">
	alert("You have not Verified Your Email or username, password not matched!")
	window.location.href="login.php"
	</script>';
}
?>