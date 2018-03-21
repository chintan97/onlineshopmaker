<?php
	session_start();
	$choice = $_GET['temp'];
	//mkdir("user_folders/chintan_admin/admin-folder");
    $src = "templates-to-copy/".$choice;
    $dst = "user_folders/".$_SESSION['username'];
    recurse_copy($src, $dst);
	function recurse_copy($src, $dst){
	    $dir = opendir($src); 
	    @mkdir($dst); 
	    while(false !== ( $file = readdir($dir)) ) { 
	        if (( $file != '.' ) && ( $file != '..' )) { 
	            if ( is_dir($src . '/' . $file) ) { 
	                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
	            } 
	            else { 
	                copy($src . '/' . $file,$dst . '/' . $file); 
	            } 
	        } 
	    } 
	    closedir($dir); 
	}
	echo "<script>alert('Your website is ready to use. You can download your website after login.');
	window.location.href='logout.php';</script>";
?>