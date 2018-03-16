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
	$file_name = 'orders.json';
	$str = file_get_contents($file_name);
	$json = json_decode($str, true);
	$root = array_keys($json)[0];
	$json[$root][$key]['order_detail'][$id]['status'] = 'order shipped';
	$newjson = json_encode($json);
	file_put_contents('orders.json', $newjson);
	echo '<script>window.location.href = "view-orders-admin.php";</script>';
	
}
else{
	$file_name = 'orders.json';
	$str = file_get_contents($file_name);
	$json = json_decode($str, true);
	$root = array_keys($json)[0];
	$json[$root][$key]['order_detail'][$id]['status'] = 'order cancelled';
	$category = $json[$root][$key]['order_detail'][$id]['product_category'];
	$subcategory = $json[$root][$key]['order_detail'][$id]['product_subcategory'];
	$product_name = $json[$root][$key]['order_detail'][$id]['product_name'];
	$product_id = $json[$root][$key]['order_detail'][$id]['product_id'];
	$quantity = $json[$root][$key]['order_detail'][$id]['product_quantity'];
	$newjson = json_encode($json);
	file_put_contents('orders.json', $newjson);
	$file_name_2 = 'product_data.json';
	$str_2 = file_get_contents($file_name_2);
	$json_2 = json_decode($str_2, true);
	$old_quantity = $json_2[$root][$category][$subcategory][$product_name]['product_stock'];
	$json_2[$root][$category][$subcategory][$product_name]['product_stock'] = (string)($old_quantity + $quantity);
	$newjson_2 = json_encode($json_2);
	file_put_contents('product_data.json', $newjson_2);
	echo '<script>window.location.href = "view-orders-admin.php";</script>';
}
?>