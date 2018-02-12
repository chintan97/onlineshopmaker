<?php
session_start();
$file = fopen("user_folders/".$_SESSION['username']."/product_data.json", 'r');

if (filesize("user_folders/".$_SESSION['username']."/product_data.json") == 0){
	echo "<script>alert('You have not entered any products till now!!!');</script>";
}
else{
	$file_read = fread($file, filesize("user_folders/".$_SESSION['username']."/product_data.json"));
	$json_array = json_decode($file_read, true);
	foreach ($json_array as $key => $value) {
		$_SESSION['shop_name'] = $key;
	}
	if (count($json_array[$_SESSION['shop_name']]) == 0){
		echo "<script>alert('You have not entered any products till now!!!');</script>";
	}
	else{
		$list = array();
		$list_tags = array('product_name', 'product_price', 'product_stock', 'product_threshold', 'product_id', 'product_brand', 'product_size', 'product_description', 'product_gender', 'product_offer_price', 'product_offer_percentage', 'product_color');
		array_push($list, $list_tags);

		foreach ($json_array[$_SESSION['shop_name']] as $key=>$value) {
			$list_names = [];
			array_push($list_names, $key);
			foreach ($value as $key1 => $value1) {
				if ($key1 != "product_image"){
					if ($value1 != "")
						array_push($list_names, $value1);
					else
						array_push($list_names, "N.A.");
				}
			}
			array_push($list, $list_names);
		}

		$file_csv = fopen('user_folders/'.$_SESSION['username'].'/product_data.csv', 'w');
		foreach ($list as $fields) {
			fputcsv($file_csv, $fields);
		}
		fclose($file_csv);

		$fname = 'user_folders/'.$_SESSION['username'].'/product_data.csv';
		header("Content-Description: File Transfer"); 
		header("Content-Type: application/octet-stream"); 
		header("Content-Disposition: attachment; filename='" . basename($fname) . "'"); 

		readfile($fname);
		unlink($fname);
		exit;
	}
}
fclose($file);
?>

<script type='text/javascript'>
     self.close();
</script>