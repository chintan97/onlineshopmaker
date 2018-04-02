<?php
	if (isset($_GET['ind'])){
		session_start();
		$file = fopen('user_folder/user_data.json', 'a+');
		$file_read = fread($file, filesize('user_folder/user_data.json'));
		$file_data = json_decode($file_read, true);
		$temp_data = $file_data['root'][$_SESSION['reg_email']]['wishlist'];
		array_splice($temp_data, $_GET['ind'], 1);
		$file_data['root'][$_SESSION['reg_email']]['wishlist'] = $temp_data;
		file_put_contents('user_folder/user_data.json', json_encode($file_data));
		fclose($file);
		array_splice($_SESSION['wishlist'], $_GET['ind'], 1);
		echo "<script>window.location.href='customer-wishlist.php'</script>";
	}
	else {
		echo "<script>window.location.href='index.php'</script>";
	}
?>