<?php
	session_start();
	if (isset($_GET['pro']) || isset($_SESSION['temp_data'])){
		if (!isset($_SESSION['reg_email'])){
			$_SESSION['redirect'] = 'add_to_wishlist';
			$_SESSION['temp_data'] = [$_GET['cat'], $_GET['subcat'], $_GET['pro'], $_GET['id']];
			echo "<script>alert('You must sign in to add this product in wishlist!');
			window.location.href='register.php';</script>";
		}
		else{
			if (!isset($_SESSION['wishlist'])){
				$_SESSION['wishlist'] = [];
			}
			if (!isset($_SESSION['temp_data'])){
				array_push($_SESSION['wishlist'], [$_GET['cat'], $_GET['subcat'], $_GET['pro'], $_GET['id']]);
			}
			else{
				array_push($_SESSION['wishlist'], $_SESSION['temp_data']);
			}
			$file = fopen('user_folder/user_data.json', 'a+');
			$file_read = fread($file, filesize('user_folder/user_data.json'));
			$file_data = json_decode($file_read, true);
			$file_data['root'][$_SESSION['reg_email']]['wishlist'] = $_SESSION['wishlist'];
			print_r($_SESSION['wishlist']);
			print_r($file_data);
			file_put_contents('user_folder/user_data.json', json_encode($file_data));
			if (isset($_GET['pro'])){
				echo "<script>window.location.href='detail.php?pro=".$_GET['pro']."&id=".$_GET['id']."'</script>";
			}
			else{
				$temp_proname = $_SESSION['temp_data'][2];
				$temp_proid = $_SESSION['temp_data'][3];
				unset($_SESSION['temp_data']);
				echo "<script>window.location.href='detail.php?pro=".$temp_proname."&id=".$temp_proid."'</script>";
			}
		}
	}
	else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>