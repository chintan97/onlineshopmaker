<?php 
	if (isset($_GET['id'])){
		$root = $_GET['root'];
		$key = $_GET['id'];
		$id = $_GET['ind'];
		
		$file_name = 'orders.json';
		$str = file_get_contents($file_name);
		$file_read = json_decode($str, true);
		$file_read[$root][$key]['order_detail'][$id]['status'] = 'cancelled (user)';
		$newjson = json_encode($file_read);
		$newjson = json_decode($newjson,true);
		if(count($newjson[$root][$key]['order_detail'])>1){
			$t = $newjson[$root][$key]['order_detail'];
			unset($t[$id]);
			$t = array_values($t);
			$newjson[$root][$key]['order_detail'] = $t;
			
		}
		else{
			unset($newjson[$root][$key]);
		}
		
		$newjson = json_encode($newjson);
		file_put_contents('orders.json', $newjson);

		$category = $file_read[$root][$key]['order_detail'][$id]['product_category'];
		$subcategory = $file_read[$root][$key]['order_detail'][$id]['product_subcategory'];
		$product_name = $file_read[$root][$key]['order_detail'][$id]['product_name'];
		$product_id = $file_read[$root][$key]['order_detail'][$id]['product_id'];
		$quantity = $file_read[$root][$key]['order_detail'][$id]['product_quantity'];
		$file_name_2 = 'product_data.json';
		$str_2 = file_get_contents($file_name_2);
		$json_2 = json_decode($str_2, true);
		$old_quantity = $json_2[$root][$category][$subcategory][$product_name]['product_stock'];
		$json_2[$root][$category][$subcategory][$product_name]['product_stock'] = (string)($old_quantity + $quantity);
		$newjson_2 = json_encode($json_2);
		file_put_contents('product_data.json', $newjson_2);
		if(file_exists('cancelled_orders.json')){
			$temp_str = file_get_contents('cancelled_orders.json');
			$temp_json = json_decode($temp_str,true);
			if(array_key_exists($key, $temp_json[$root]) == false){
				if(count($file_read[$root][$key]['order_detail']) == 1){
					$temp_json[$root][$key] = $file_read[$root][$key];
				}
				else{
					$temp_json[$root][$key] = $file_read[$root][$key];
					$temp_json[$root][$key]['order_detail'] = array($file_read[$root][$key]['order_detail'][$id]);
				}
			}
			else{
				$temparr = $temp_json[$root][$key]['order_detail'];
				$temp_json[$root][$key]['order_detail'] = array_merge($temparr,array($file_read[$root][$key]['order_detail'][$id]));
			}
			file_put_contents('cancelled_orders.json', json_encode($temp_json));

		}
		else{
			$temp =array();
			$temp_array = array();
			$file1 = fopen("cancelled_orders.json", "w");
			if(count($file_read[$root][$key]['order_detail']) == 1){
					$temp_json[$root][$key] = $file_read[$root][$key];
			}
			else{
				$file_read[$root][$key]['order_detail'] = array($file_read[$root][$key]['order_detail'][$id]);
			}
			$temp_array[$key] = $file_read[$root][$key];
			$temp[$root]=$temp_array;
			file_put_contents('cancelled_orders.json', json_encode($temp));
		}

		echo "<script>window.location.href='customer-orders.php';</script>";
	}
	else {
		echo "<script>window.location.href='customer-orders.php';</script>";	
	}
?>