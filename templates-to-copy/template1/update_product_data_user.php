<?php
session_start();
$data = $_SESSION['cart'];
$file_name = 'product_data.json';
$str = file_get_contents($file_name);
$json = json_decode($str, true);
$root = array_keys($json)[0];
$flag = true;
$unavailable_products='';
foreach($data as $key => $value){
	$product = $data[$key];
	$old = (int)$json[$root][$product[0]][$product[1]][$product[2]]['product_stock'];
	if($old < $product[4]){
		$flag = false;
		unset($data[$key]);
		$unavailable_products .= $product[2];
		$unavailable_products .= ', ';
	}
}
if($flag){
	foreach($data as $key => $value){
		$product = $data[$key];
		$old = (int)$json[$root][$product[0]][$product[1]][$product[2]]['product_stock'];
		$new = $old - $product[4];
		$json[$root][$product[0]][$product[1]][$product[2]]['product_stock'] = (string)$new;
		file_put_contents($file_name, json_encode($json));
		echo '<script>window.location.href="checkout2.php";</script>';

	}
}
else{
	$new_data = array_merge(array(),$data);
	$_SESSION['cart'] = $new_data;
	$msg = 'Sorry! It looks like we are running low on following product[s] --> '.rtrim($unavailable_products,", ");
	echo '<script>alert("'.$msg.'");window.location.href="basket.php";</script>';
}

?>