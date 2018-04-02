<?php
	session_start();
	if (!isset($_SESSION['username'])){
		echo "<script>window.location.href='index.php';</script>";
	}
?>
<html>
<head>
	<script src="js/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>
	<noscript>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
	</noscript>

	<script type="text/javascript">
		function check_data(){
			var old_password = document.getElementById('old_password').value;
			var new_password_1 = document.getElementById('new_password_1').value;
			var new_password_2 = document.getElementById('new_password_2').value;
			var pass_pattern = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
			if (old_password == ''){
				event.preventDefault();
				alert("Please enter old password!");
				document.getElementById('old_password').focus();
				return false;
			}
			else if (new_password_1 == ''){
				event.preventDefault();
				alert("Please enter new password!");
				document.getElementById('new_password_1').focus();
				return false;
			}
			else if (new_password_1 != new_password_2){
				event.preventDefault();
				alert("New passwords not matched!");
				document.getElementById('new_password_2').focus();
				return false;
			}
			else if (pass_pattern.test(new_password_1) == false){
				event.preventDefault();
				alert("Password must contain at least one number, one special character(!@#$%^&*), one upper and lower case character with the length between 8-20!");
				document.getElementById('new_password_1').focus();
				return false;
			}
			document.change_password.submit();
		}
	</script>
</head>
<body>
	<form method="post" action="" name="change_password">
		&nbsp;
		<input type="password" id="old_password" name="old_password" style="background-color: #e6ffcc; width: 500px; border: 1px solid black"><label>Old password<font Size="5" Color="red">*</font></label>
		<input type="password" id="new_password_1" name="new_password_1" style="background-color: #e6ffcc; width: 500px; border: 1px solid black"><label>New password<font Size="5" Color="red">*</font></label>
		<input type="password" id="new_password_2" name="new_password_2" style="background-color: #e6ffcc; width: 500px; border: 1px solid black"><label>Retype new password<font Size="5" Color="red">*</font></label>
		
		<button type="submit" onclick="check_data();" style="color: #FFFFFF; background-color: #944dff; width: 100px; height: 30px; border-radius: 5px;">Submit</button>
	</form>
</body>
</html>

<?php
	if (isset($_POST['new_password_1'])){
		$old_password = $_POST['old_password'];
		$new_password = $_POST['new_password_1'];
		$file = fopen('../owner_data.json', 'a+');
		$file_read = fread($file, filesize('../owner_data.json'));
		$read_data = json_decode($file_read, true);
		if ($read_data[$_SESSION['username']]['password'] == $old_password){
			$read_data[$_SESSION['username']]['password'] = $new_password;
			file_put_contents('../owner_data.json', json_encode($read_data));
			echo "<script>alert('Password successfully changed!');</script>";
		}
		else {
			echo "<script>alert('Old password not matched! Please try again!');</script>";
		}
		unset($_POST['new_password_1']);
		unset($_POST['new_password_2']);
		unset($_POST['old_password']);
		fclose($file);
	}
?>