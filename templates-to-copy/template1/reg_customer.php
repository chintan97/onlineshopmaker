<?php
if (isset($_POST['reg_name'])){
	$name = $_POST["reg_name"];
	$email = $_POST["reg_email"];
	$password = $_POST["reg_password"];
	$file = fopen('user_folder/user_data.json', 'a+');
	if (filesize('user_folder/user_data.json') == 0){
		$temp_data = array('name' => (String)$name, 'password' => (String)$password);
		$temp_data2[$email] = $temp_data;
		$data['root'] = $temp_data2;
	}
	else{
		$file_read = fread($file, filesize('user_folder/user_data.json'));
		$read_data = json_decode($file_read, true);
		$temp_data = $read_data['root'];  // previous data
		if (!isset($temp_data[$email])){
			$temp_array = array('name' => (String)$name, 'password' => (String)$password); // new array to be merged
			$temp_array2[$email] = $temp_array;
			$temp_data = array_merge($temp_data, $temp_array2);
			$data['root'] = $temp_data;
		}
		else{
			echo "<script>alert('Email already registered. Use another Email!');
			window.location.href='register.php'
			</script>";
		}
	}
	if ($data){
		file_put_contents('user_folder/user_data.json', json_encode($data));
	}
	fclose($file);
	echo "<script>alert('Thank you for registering. You can login now.');
		window.location.href='register.php'
		</script>";
}
else{
	header("location:register.php");
}
?>