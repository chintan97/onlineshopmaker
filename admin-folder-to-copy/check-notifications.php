<?php
	session_start();
	$read_file = file_get_contents('../product_data.json');
	$file_data = json_decode($read_file, true);
	$notification_count = 0;
	$notifications = [];
	foreach ($file_data as $shopname => $shopdata) {
		foreach ($shopdata as $product_cat => $product_cat_data) {
			foreach ($product_cat_data as $product_subcat => $product_subcat_data) {
				foreach ($product_subcat_data as $product_name => $product_data) {
					if ((int)$product_data['product_stock'] < (int)$product_data['product_threshold']){
						array_push($notifications, [$product_cat, $product_subcat, $product_name, $product_data['product_id'] ,$product_data['product_stock'], $product_data['product_threshold']]);
						$notification_count++;
					}
				}
			}
		}
	}
	if ($notification_count > 0){

		if (!file_exists('../notifications.json') && count($notifications) > 0){
			$file = fopen('../notifications.json', 'w');
			$temp_count = 1;
			$data_to_write['root'] = [];
			foreach ($notifications as $key => $value) {
				$value1 = array_merge($value, ['unseen']);
				array_push($data_to_write['root'], $value1);
				$temp_count++;
			}
			
			file_put_contents('../notifications.json', json_encode($data_to_write));
			fclose($file);
			echo $notification_count;
		}
		else {
			$file_noti = fopen('../notifications.json', 'a+');
			$file_data_noti = fread($file_noti, filesize('../notifications.json'));
			$file_read_noti = json_decode($file_data_noti, true);
			$data_to_write['root'] = [];
			$unseen_products = [];
			$seen_products = [];
			$notification_count_new = 0;
			foreach ($notifications as $key => $value) {
				$temp_flag = 0;
				foreach ($file_read_noti['root'] as $key1 => $value1) {
					if ($value1[3] == $value[3]){
						if ($value1[4] != $value[4]){
							$status = ['unseen'];
							$value2 = array_merge($value, $status);
							array_push($unseen_products, $value2);
							$notification_count_new++;
						}
						else {
							$status = $value1[6];
							$value2 = array_merge($value, [$status]);
							if ($status == 'unseen'){
								array_push($unseen_products, $value2);
							}
							else {
								array_push($seen_products, $value2);
							}
						}
						$temp_flag++;
						break;
					}
				}
				if ($temp_flag == 0){
					$value2 = array_merge($value, ['unseen']);
					array_push($unseen_products, $value2);
					$notification_count_new++;
				}
			}
			$data_to_write['root'] = array_merge($unseen_products, $seen_products); 
			file_put_contents('../notifications.json', json_encode($data_to_write));
			fclose($file_noti);
			echo $notification_count_new;
		}
	}
	else {
		if (file_exists('../notifications.json')){
			$data['root'] = [];
			file_put_contents('../notifications.json', json_encode($data));
		}
		echo "0";
	}
?>