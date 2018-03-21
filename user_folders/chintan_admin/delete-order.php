<?php 
	if (isset($_GET['id'])){
		$order_id = $_GET['id'];
		$index = $_GET['ind'];
		$shopname = $_GET['root'];
		$file = fopen('orders.json', 'a+');
		$file_data = fread($file, filesize('orders.json'));
		$file_read = json_decode($file_data, true);
		if ($file_read[$shopname][$order_id]['order_detail'][$index]['status'] == 'order received'){
			$file_read[$shopname][$order_id]['order_detail'][$index]['status'] = 'cancelled (user)';
		}
		file_put_contents('orders.json', json_encode($file_read));
		fclose($file);
		echo "<script>window.location.href='customer-orders.php';</script>";
	}
	else {
		echo "<script>window.location.href='customer-orders.php';</script>";	
	}
?>