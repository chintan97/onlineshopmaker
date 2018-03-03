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
	$product_image = $_FILES["product_upload_image"];
	$images_to_delete = json_decode($_POST["images_to_delete"], true);
	$file_count = count($product_image["name"]);
	$fimage_name = $product_image['name'][0];
	function getExtension($str)
	{
		$j = strrpos($str,".");
	 	if (!$j) { return ""; }
	 	$l = strlen($str) - $j;
	 	$ext = substr($str,$j+1,$l);
	 	return $ext;
	}

	function upload_images($previous_images, $find_max){
		$new_images = [];
		$new_images = array_merge($new_images, $previous_images);
		//array_push($GLOBALS('new_images'), $GLOBALS('previous_images'));
		for ($ij = 0; $ij < $GLOBALS['file_count']; $ij++){

			$filename = stripslashes($_FILES['product_upload_image']['name'][$ij]);
			$extension = getExtension($filename);
			$image_name = $GLOBALS['product_id'].'_'.($ij+$find_max).'.'.$extension;

			array_push($new_images, $image_name);
			$path = "user_folders/".$GLOBALS['user_name']."/images/".$image_name;
			copy($_FILES['product_upload_image']['tmp_name'][$ij], $path);
		}
		return $new_images;
	}

	foreach ($images_to_delete as $key => $value) {
		unlink('user_folders/'.$user_name.'/images/'.$value);
	}

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
					$previous_images = $json_array[$shop_name][$category][$subcategory][$key]['product_image'];
					foreach ($images_to_delete as $key123 => $value123) {
						//echo array_search($value123, $previous_images);
						//unset($previous_images[array_search($value123, $previous_images)]);
						array_splice($previous_images, array_search($value123, $previous_images), 1);
					}
					$find_max = 0;
					foreach ($previous_images as $key1234 => $value1234) {
						$pos = substr($value1234, 6, strpos($value1234, '.') - 6);
						if ($pos > $find_max){
							$find_max = $pos;
						}
					}
					$find_max++;
					if ($GLOBALS['fimage_name'] != ''){
						$new_images = upload_images($previous_images, $find_max);
						$json_array[$shop_name][$category][$subcategory][$key]['product_image'] = [];
						$json_array[$shop_name][$category][$subcategory][$key]['product_image'] = $new_images;
					}
					else{
						$json_array[$shop_name][$category][$subcategory][$key]['product_image'] = [];
						$json_array[$shop_name][$category][$subcategory][$key]['product_image'] = $previous_images;
					}
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