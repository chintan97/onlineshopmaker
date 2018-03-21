<?php
	if (isset($_GET['ind'])){
		session_start();
		array_splice($_SESSION['cart'], $_GET['ind'], 1);
		if (count($_SESSION['cart']) == 0){
			echo "<script>window.location.href='index.php'</script>";
		}
		else{
			echo "<script>window.location.href='basket.php'</script>";
		}
	}
	else {
		echo "<script>window.location.href='basket.php'</script>";
	}
?>