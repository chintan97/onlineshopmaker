<?php
	$username = $_SESSION['username'];
	$file_name = 'user_folders/'.$username.'/product_data.json';
	$file = fopen($file_name, 'r');
	$file_read = fread($file, filesize($file_name));
	$read_data = json_decode($file_read, true);

	$product_count = 0;
	foreach ($read_data as $shop => $value) {
		$_SESSION['shop_name'] = $shop;
		foreach ($value as $category => $value1) {
			foreach ($value1 as $subcategory => $value2) {
				foreach ($value2 as $productname => $value) {
					$product_count++;
				}
			}
		}
	}
	$_SESSION['total_products'] = $product_count;
?>