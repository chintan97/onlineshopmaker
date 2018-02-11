<?php
session_start();
$username=$_POST["uname"];
$pwd=$_POST["pwd"];
$go_to=$_POST['hidden_go'];
$c=mysql_connect("localhost","root","");
$z=mysql_select_db("2594801_onlineshopmaker", $c);
$au="select User_name,Active,Email,Name from user where User_name='".$username."' AND Password='".$pwd."'";
$q=mysql_query($au);
$res = mysql_fetch_assoc($q);
if($res['Active']==1){
	$_SESSION['username']=$res['User_name'];
	$_SESSION['other']=$res['Name'].'#'.$res['Email'];
	if($_SESSION['go']==1){
		$_SESSION['go']=0;
		header("location:websitebuilder.php");
	}
	else{
		header("location:index.php");
	}
}
else{
	echo '<script language="javascript">
	alert("You have not Verified Your Email. Please Verify To Log In.")
	window.location.href="login.php"
	</script>';
}
?>