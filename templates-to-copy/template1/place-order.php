<?php
	session_start();
	if (isset($_SESSION['buy_data'])){
		if (!file_exists('orders.json')){
			$file = fopen('orders.json', 'w');
			$read_data = '';
		}
		else {
			$file = fopen('orders.json', 'a+');
			$file_read = fread($file, filesize('orders.json'));
			$read_data = json_decode($file_read, true);
		}
		$user_file = fopen('user_folder/user_data.json', 'a+');
		$user_file_read = fread($user_file, filesize('user_folder/user_data.json'));
		$user_file_data = json_decode($user_file_read, true);
		$get_user_data = $user_file_data['root'][$_SESSION['reg_email']];
		date_default_timezone_set("Asia/Kolkata");
		$fetch_user_data = ['name' => $get_user_data['name'], 'email' => $get_user_data['contact_email'], 'phone' => $get_user_data['contact_phone'], 'address' => $get_user_data['street'], 'city' => $get_user_data['city'], 'zip' => $get_user_data['zip'], 'state' => $get_user_data['state'], 'country' => $get_user_data['country'], 'total_amount' => $_SESSION['grand_total'], 'date' => (String)date("d/m/Y"), 'time' => (String)date("h:i:sa")];
		$get_order_data = [];
		foreach ($_SESSION['buy_data'] as $key => $value) {
			if ($value[4] == ''){
				$price = $value[2];
			}
			else {
				$price = $value[4];
			}
			array_push($get_order_data, ['product_category' => (String)$value[7], 'product_subcategory' => (String)$value[8], 'product_name' => (String)$value[1], 'product_id' => (String)$value[5], 'product_quantity' => (String)$value[6], 'sold_price' => (String)$price, 'subtotal' => (String)((int)$value[6] * (int)$price), 'status' => 'order received']);
		}
		$order['order_detail'] = $get_order_data;
		$make_order = array_merge($order, $fetch_user_data);
		if ($read_data == ''){
			$order_id = "000001";
			$temp_array[$order_id] = $make_order;
			$temp_array2[$_GET['shop']] = $temp_array;
			file_put_contents('orders.json', json_encode($temp_array2));
			$file_order_summary = fopen('order_summary.json', 'a+');
			$temp_summary = ['max_id' => 1, 'products_sold' => count($get_order_data)];
			$temp_array3[$_GET['shop']] = $temp_summary;
			file_put_contents('order_summary.json', json_encode($temp_array3));
		}
		else {
			$file_order_summary = fopen('order_summary.json', 'a+');
			$file_order_summary_read = fread($file_order_summary, filesize('order_summary.json'));
			$file_order_summary_data = json_decode($file_order_summary_read, true);
			$previous_data = $read_data[$_GET['shop']];
			$order_id = $file_order_summary_data[$_GET['shop']]['max_id'] + 1;
			$order_id = str_pad($order_id, 6, '0', STR_PAD_LEFT);
			$temp_array[$order_id] = $make_order;
			$temp_array2[$_GET['shop']] = array_merge($previous_data, $temp_array);
			file_put_contents('orders.json', json_encode($temp_array2));
			$file_order_summary_data[$_GET['shop']]['max_id']++;
			$file_order_summary_data[$_GET['shop']]['products_sold'] = $file_order_summary_data[$_GET['shop']]['products_sold'] + count($get_order_data);
			file_put_contents('order_summary.json', json_encode($file_order_summary_data));
		}
		if (!isset($user_file_data['root'][$_SESSION['reg_email']]['orders'])){
			$user_file_data['root'][$_SESSION['reg_email']]['orders'] = [$order_id];	
		}
		else {
			array_push($user_file_data['root'][$_SESSION['reg_email']]['orders'], $order_id);
		}
		file_put_contents('user_folder/user_data.json', json_encode($user_file_data));
		fclose($user_file);
		$_SESSION['buy_data'] = [];
		$_SESSION['cart'] = [];
		echo "<script>alert('Thank you for shopping with us. We will place your order soon.');
		window.location.href='customer-orders.php';</script>";
	}
	else {
		echo '<script>window.location.href="index.php"</script>';
	}
?>