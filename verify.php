<?php

if(isset($_GET['user']) && !empty($_GET['user']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    $c=mysql_connect("localhost","root","");
	$z=mysql_select_db("2594801_onlineshopmaker", $c);
	$user = mysql_real_escape_string($c,$_GET['user']);
    $hash = mysql_real_escape_string($c,$_GET['hash']);
	$q = mysql_query("SELECT User_name, Password FROM user WHERE User_name='".$user."' AND Active='0'"); 
	$match  = mysql_num_rows($q);
	$res = mysql_fetch_assoc($q);
	if ($match > 0){
		$db_pwd=$res['Password'];
		$db_user=$res['User_name'];
		if($hash == openssl_encrypt($db_pwd,"AES-128-ECB",$db_user)){
			$q=mysql_query("UPDATE user SET Active='1' WHERE User_name='".$user."' AND Active='0'");
			mkdir('user_folders/'.$user);
			$file = fopen('user_folders/'.$user.'/product_data.json', 'w');
			fclose($file);
			echo '<script language="javascript">
			alert("Your Account Is Successfully Verified!!!Now You Can Log In with Your Credentials!")
			window.location.href="login.php"
			</script>';
		}
		else{
			echo '<script language="javascript">
			alert("Link is broken or Your account Has Been already verified!!!")
			window.location.href="index.php"
			</script>';
		}
	}
	else{
		echo '<script language="javascript">
		alert("Link is broken or Your account Has Been already verified!!!")
		window.location.href="index.php"
		</script>';
	}
	
}
else{
	echo '<script language="javascript">
	alert("This Link is broken or Your account Has Been already verified!!!")
	window.location.href="index.php"
	</script>';
	}

?>