<?php
	$username = $_SESSION['username'];
	$file_name = '../product_data.json';
	$file_read = file_get_contents($file_name);
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

	// new orders checking
	if (file_exists('../orders.json')){
		$order_file = file_get_contents('../orders.json');
		$order_file_data = json_decode($order_file, true);
		$_SESSION['new_orders'] = count($order_file_data[$_SESSION['shop_name']]);
	}
	else {
		$_SESSION['new_orders'] = 0;
	}

	// total customer checking
	if (file_exists('../user_folder/user_data.json') && filesize('../user_folder/user_data.json') > 0){
		$customer_file = file_get_contents('../user_folder/user_data.json');
		$customer_file_data = json_decode($customer_file, true);
		$_SESSION['total_customers'] = count($customer_file_data['root']);
	}
	else {
		$_SESSION['total_customers'] = 0;
	}

	// total products sold checking
	if (file_exists('../order_summary.json')){
		$order_summary_file = file_get_contents('../order_summary.json');
		$order_summary_file_data = json_decode($order_summary_file, true);
		$_SESSION['products_sold'] = $order_summary_file_data[$_SESSION['shop_name']]['products_sold'];
	}
	else {
		$_SESSION['products_sold'] = 0;
	}
?>