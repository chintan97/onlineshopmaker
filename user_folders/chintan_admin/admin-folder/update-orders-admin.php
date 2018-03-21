<?php 
$string = $_SERVER['QUERY_STRING'];
$arr = explode("&",$string);
$arr1 = explode('=',$arr[0]);
$type = $arr1[0];
$key  = $arr1[1];
$key = sprintf('%06d', $key);
$arr2 = explode('=',$arr[1]);
$id = $arr2[1];
if($type == 'proceed'){
	$file_name = '../orders.json';
	$str = file_get_contents($file_name);
	$json = json_decode($str, true);
	$root = array_keys($json)[0];
	$json[$root][$key]['order_detail'][$id]['status'] = 'order shipped';
	$newjson = json_encode($json);
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
	file_put_contents('../orders.json', $newjson);
	if(file_exists('../shipped_orders.json')){
		$temp_str = file_get_contents('../shipped_orders.json');
		$temp_json = json_decode($temp_str,true);
		if(array_key_exists($key, $temp_json[$root]) == false){
			if(count($json[$root][$key]['order_detail']) == 1){
				$temp_json[$root][$key] = $json[$root][$key];
			}
			else{
				$temp_json[$root][$key] = $json[$root][$key];
				$temp_json[$root][$key]['order_detail'] = array($json[$root][$key]['order_detail'][$id]);
			}
		}
		else{
			$temparr = $temp_json[$root][$key]['order_detail'];		
			$temp_json[$root][$key]['order_detail'] = array_merge($temparr,array($json[$root][$key]['order_detail'][$id]));
		}
		file_put_contents('../shipped_orders.json', json_encode($temp_json));

	}
	else{
		$temp =array();
		$temp_array = array();
		$file1 = fopen("../shipped_orders.json", "w");
		if(count($json[$root][$key]['order_detail']) == 1){
				$temp_json[$root][$key] = $json[$root][$key];
		}
		else{
			$json[$root][$key]['order_detail'] = array($json[$root][$key]['order_detail'][$id]);
		}
		$temp_array[$key] = $json[$root][$key];
		$temp[$root]=$temp_array;
		file_put_contents('../shipped_orders.json', json_encode($temp));
	}
	echo '<script>window.location.href = "view-orders-admin.php";</script>';
	
}
else{
	$file_name = '../orders.json';
	$str = file_get_contents($file_name);
	$json = json_decode($str, true);
	$root = array_keys($json)[0];
	$json[$root][$key]['order_detail'][$id]['status'] = 'order cancelled';
	$newjson = json_encode($json);
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
	file_put_contents('../orders.json', $newjson);
	$category = $json[$root][$key]['order_detail'][$id]['product_category'];
	$subcategory = $json[$root][$key]['order_detail'][$id]['product_subcategory'];
	$product_name = $json[$root][$key]['order_detail'][$id]['product_name'];
	$product_id = $json[$root][$key]['order_detail'][$id]['product_id'];
	$quantity = $json[$root][$key]['order_detail'][$id]['product_quantity'];
	$file_name_2 = '../product_data.json';
	$str_2 = file_get_contents($file_name_2);
	$json_2 = json_decode($str_2, true);
	$old_quantity = $json_2[$root][$category][$subcategory][$product_name]['product_stock'];
	$json_2[$root][$category][$subcategory][$product_name]['product_stock'] = (string)($old_quantity + $quantity);
	$newjson_2 = json_encode($json_2);
	file_put_contents('../product_data.json', $newjson_2);
	if(file_exists('../cancelled_orders.json')){
		$temp_str = file_get_contents('../cancelled_orders.json');
		$temp_json = json_decode($temp_str,true);
		if(array_key_exists($key, $temp_json[$root]) == false){
			if(count($json[$root][$key]['order_detail']) == 1){
				$temp_json[$root][$key] = $json[$root][$key];
			}
			else{
				$temp_json[$root][$key] = $json[$root][$key];
				$temp_json[$root][$key]['order_detail'] = array($json[$root][$key]['order_detail'][$id]);
			}
		}
		else{
			$temparr = $temp_json[$root][$key]['order_detail'];
			$temp_json[$root][$key]['order_detail'] = array_merge($temparr,array($json[$root][$key]['order_detail'][$id]));
		}
		file_put_contents('../cancelled_orders.json', json_encode($temp_json));

	}
	else{
		$temp =array();
		$temp_array = array();
		$file1 = fopen("../cancelled_orders.json", "w");
		if(count($json[$root][$key]['order_detail']) == 1){
				$temp_json[$root][$key] = $json[$root][$key];
		}
		else{
			$json[$root][$key]['order_detail'] = array($json[$root][$key]['order_detail'][$id]);
		}
		$temp_array[$key] = $json[$root][$key];
		$temp[$root]=$temp_array;
		file_put_contents('../cancelled_orders.json', json_encode($temp));
	}
	echo '<script>window.location.href = "view-orders-admin.php";</script>';
}
?>
