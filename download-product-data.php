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
		$list_tags = array('category','subcategory','product name', 'product price', 'product stock', 'product threshold', 'product id', 'product brand', 'product size', 'product description', 'product gender', 'product offer price', 'product offer percentage', 'product color');
		array_push($list, $list_tags);

		foreach ($json_array[$_SESSION['shop_name']] as $key=>$value) {
			foreach ($value as $key1 => $value1) {
				foreach ($value1 as $key2 => $value2) {
					$list_names = [];
					array_push($list_names, $key);  // product category
					array_push($list_names, $key1);  // product subcategory
					array_push($list_names, $key2);  // product name
					foreach ($value2 as $key3 => $value3) {  // data	
						if ($key3 != "product_image"){
							if ($value3 != "")
								array_push($list_names, $value3);  
							else
								array_push($list_names, "N.A.");
						}
					}
					array_push($list, $list_names);
				}
			}
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