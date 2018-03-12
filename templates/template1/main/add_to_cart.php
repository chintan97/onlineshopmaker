<?php
	if (isset($_GET['pro'])){
		session_start();
		if (!isset($_SESSION['cart'])){
			$_SESSION['cart'] = [];
		}
		array_push($_SESSION['cart'], [$_GET['cat'], $_GET['subcat'] ,$_GET['pro'], $_GET['id']]);
	}
	echo "<script>window.history.back();</script>";
?>