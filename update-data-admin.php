<?php
	session_start();
	$product_name = $_POST["product_name"];
	$product_price = $_POST["product_price"];
	$product_stock = $_POST["product_stock"];
	$product_threshold = $_POST["product_threshold"];
	$product_brand = $_POST["product_brand"];
	$product_size = $_POST["product_size"];
	$product_description = $_POST["product_description"];
	$product_gender = $_POST["product_gender"];
	$product_id = $_POST["product_id"];
	$product_offer_price = $_POST["product_offer_price"];
	$product_offer_percentage = $_POST["product_offer_percentage"];
	$product_color = $_POST["product_color"];
	$shop_name = $_SESSION["shop_name"];
	$user_name = $_SESSION["username"];

	$file = fopen('user_folders/'.$user_name.'/product_data.json', 'a+');
	$file_read = fread($file, filesize("user_folders/".$user_name."/product_data.json"));
	$json_array = json_decode($file_read, true);
	$new_json = array();
	foreach ($json_array[$shop_name] as $category => $cat_data) {
		foreach ($cat_data as $subcategory => $subcat_data) {
			foreach ($subcat_data as $key => $value) {
				//echo $value['product_id']."<br>";
				if ($value['product_id'] == $product_id){
					$json_array[$shop_name][$category][$subcategory][$key]['product_price'] = $product_price;
					$json_array[$shop_name][$category][$subcategory][$key]['product_stock'] = $product_stock;
					$json_array[$shop_name][$category][$subcategory][$key]['product_threshold'] = $product_threshold;
					$json_array[$shop_name][$category][$subcategory][$key]['product_brand'] = $product_brand;
					$json_array[$shop_name][$category][$subcategory][$key]['product_size'] = $product_size;
					$json_array[$shop_name][$category][$subcategory][$key]['product_description'] = $product_description;
					$json_array[$shop_name][$category][$subcategory][$key]['product_gender'] = $product_gender;
					$json_array[$shop_name][$category][$subcategory][$key]['product_offer_price'] = $product_offer_price;
					$json_array[$shop_name][$category][$subcategory][$key]['product_offer_percentage'] = $product_offer_percentage;
					$json_array[$shop_name][$category][$subcategory][$key]['product_color'] = $product_color;
					if ($key != $product_name){
						$new_product[(String)$product_name] = $json_array[$shop_name][$category][$subcategory][$key];
						$temp_arr = $json_array[$shop_name][$category][$subcategory];
						$temp_arr_2 = $json_array[$shop_name][$category];
						$temp_arr_x = $json_array[$shop_name];
						$temp_arr_3[$subcategory] = array_merge($temp_arr, $new_product);
						$temp_arr_4[$category] = array_merge($temp_arr_2, $temp_arr_3);
						$temp_arr_xx[$shop_name] = array_merge($temp_arr_x, $temp_arr_4);
						$json_array = $temp_arr_xx;
						unset($json_array[$shop_name][$category][$subcategory][$key]);
					}
					break;
				} 
			}
		}
	}
	file_put_contents('user_folders/'.$user_name.'/product_data.json', json_encode($json_array));
	echo "Product data has been updated";
	//fwrite($file, json_encode($json_array));
	fclose($file);
?>