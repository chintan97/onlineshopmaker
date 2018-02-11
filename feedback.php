<?php

$name=$_POST["name"];
$email=$_POST["email"];
$message=htmlspecialchars($_POST["message"]);
$c=mysql_connect("localhost","root","");
$z=mysql_select_db("2594801_onlineshopmaker", $c);
$au="insert into feedback values('','".$name."','".$email."','".$message."')";
$aa=mysql_query($au);
if($aa){
	echo '<script language="javascript">
	alert("Feedback Recieved!!!")
	window.location.href="index.php"
	</script>';
}
else{
	echo '<script language="javascript">
	alert("Something Went Wrong!!!")
	window.location.href="index.php"
	</script>';
}
?>