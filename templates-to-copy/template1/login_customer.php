<?php
if (isset($_POST['login_email'])){
	session_start();
	$login_email = $_POST['login_email'];
	$login_password = $_POST['login_password'];
	$file = fopen('user_folder/user_data.json', 'r');
	if (filesize('user_folder/user_data.json') > 0){
		$file_read = fread($file, filesize('user_folder/user_data.json'));
		$read_data = json_decode($file_read, true);
		if (isset($read_data['root'][$login_email])){
			$password = $read_data['root'][$login_email]['password'];
			if ($password == $login_password){
				$_SESSION['reg_name'] = $read_data['root'][$login_email]['name'];
				$_SESSION['reg_email'] = $login_email;
				if (isset($read_data['root'][$login_email]['wishlist'])){
					$_SESSION['wishlist'] = $read_data['root'][$login_email]['wishlist'];
				}
				if (isset($_SESSION['redirect'])){
					if ($_SESSION['redirect'] == 'add_to_wishlist'){
						header("location:add_to_wishlist.php");
					}
					else if ($_SESSION['redirect'] == 'checkout1'){
						header("location:checkout1.php");
					}
					else if ($_SESSION['redirect'] == 'customer-wishlist'){
						header("location:customer-wishlist.php");
					}
					else if ($_SESSION['redirect'] == 'customer-orders'){
						header("location:customer-orders.php");
					}
				}
				else{
					header("location:customer-orders.php");
				}
			}
			else{
				echo "<script>alert('Email and password not matched, please try again!');
				window.location.href='register.php'
				</script>";
			}
		}
		else{
			echo "<script>alert('Email and password not matched, please try again!');
			window.location.href='register.php'
			</script>";
		}
	}
	else{
		echo "<script>alert('Email and password not matched, please try again!');
		window.location.href='register.php'
		</script>";
	}
	fclose($file);
}
else if (isset($_POST['login_email1'])){
	session_start();
	$login_email = $_POST['login_email1'];
	$login_password = $_POST['login_password1'];
	$file = fopen('user_folder/user_data.json', 'r');
	if (filesize('user_folder/user_data.json') > 0){
		$file_read = fread($file, filesize('user_folder/user_data.json'));
		$read_data = json_decode($file_read, true);
		if (isset($read_data['root'][$login_email])){
			$password = $read_data['root'][$login_email]['password'];
			if ($password == $login_password){
				$_SESSION['reg_name'] = $read_data['root'][$login_email]['name'];
				$_SESSION['reg_email'] = $login_email;
				if (isset($read_data['root'][$login_email]['wishlist'])){
					$_SESSION['wishlist'] = $read_data['root'][$login_email]['wishlist'];
				}
				if (isset($_SESSION['redirect'])){
					if ($_SESSION['redirect'] == 'add_to_wishlist'){
						header("location:add_to_wishlist.php");
					}
					else if ($_SESSION['redirect'] == 'checkout1'){
						header("location:checkout1.php");
					}
					else if ($_SESSION['redirect'] == 'customer-wishlist'){
						header("location:customer-wishlist.php");
					}
					else if ($_SESSION['redirect'] == 'customer-orders'){
						header("location:customer-orders.php");
					}
				}
				else {
					header("location:customer-orders.php");
				}
			}
			else{
				echo "<script>alert('Email and password not matched, please try again!');
				window.location.href='register.php'
				</script>";
			}
		}
		else{
			echo "<script>alert('Email and password not matched, please try again!');
			window.location.href='register.php'
			</script>";
		}
	}
	else{
		echo "<script>alert('Email and password not matched, please try again!');
		window.location.href='register.php'
		</script>";
	}
	fclose($file);
}
else{
	header("location:register.php");
}
?>