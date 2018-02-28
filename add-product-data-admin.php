<?php
	session_start();
	if (isset($_POST['product_name'])){
		$username = $_SESSION['username'];
		$shop_name = $_SESSION['shop_name'];
		$file_name = 'user_folders/'.$username.'/product_data.json';
		$file = fopen($file_name, 'a+');
		$read_data = fread($file, filesize($file_name));
		$json_array = json_decode($read_data, true);

		$product_name = $_POST["product_name"];
		$product_price = $_POST["product_price"];
		$product_stock = $_POST["product_stock"];
		$product_threshold = $_POST["product_threshold"];
		$product_id = $_POST["product_id"];
		$product_brand = $_POST["product_brand"];
		$product_size = $_POST["product_size"];
		$product_description = $_POST["product_description"];
		$product_gender = $_POST["product_gender"];
		$product_offer_price = $_POST["product_offer_price"];
		$product_offer_percentage = $_POST["product_offer_percentage"];
		$product_color = $_POST["product_color"];
		$product_cat = $_POST["product_cat"];
		$product_subcat = $_POST["product_subcat"];
		$product_image = $_FILES["product_image"];
		$file_names = array();
		$temp_flag = $_POST["temp_flag"];
		$file_count = count($product_image["name"]);
		function getExtension($str)
		{
			$j = strrpos($str,".");
	 		if (!$j) { return ""; }
	 		$l = strlen($str) - $j;
	 		$ext = substr($str,$j+1,$l);
	 		return $ext;
		}
		for ($i = 0; $i < $file_count; $i++){

			$filename = stripslashes($_FILES['product_image']['name'][$i]);
			$extension = getExtension($filename);
			$image_name = $product_id.'_'.($i+1).'.'.$extension;

			array_push($file_names, $image_name);
			$path = "user_folders/".$username."/images/".$image_name;
			copy($_FILES['product_image']['tmp_name'][$i], $path);
		}

		$string = array('product_price' => (string)$product_price, 'product_stock' => (string)$product_stock, 'product_threshold' => (string)$product_threshold, 'product_image' => $file_names, 'product_id' => (string)$product_id, 'product_brand' => (string)$product_brand, 'product_size' => $product_size, 'product_description' => (string)$product_description, 'product_gender' => (string)$product_gender, 'product_offer_price' => (string)$product_offer_price, 'product_offer_percentage' => (string)$product_offer_percentage, 'product_color' => (string)$product_color);
		$json_str[(string)$product_name] = $string;

		$previous_data = $json_array[$shop_name];

		if (isset($previous_data[$product_cat])){
			if (isset($previous_data[$product_cat][$product_subcat])){
				$temp_arr = $previous_data[$product_cat][$product_subcat];
				$temp_arr_aa = $previous_data[$product_cat];
				$temp_arr2[$product_subcat] = array_merge($temp_arr, $json_str);
				$temp_arr3[$product_cat] = array_merge($temp_arr_aa, $temp_arr2);
				$previous_data = array_merge($previous_data, $temp_arr3);
			}
			else{
				$temp_arr2[$product_subcat] = $json_str;
				$temp_arr3 = $previous_data[$product_cat];
				$temp_arr4[$product_cat] = array_merge($temp_arr3, $temp_arr2);
				$previous_data = array_merge($previous_data, $temp_arr4);
			}
		}
		else{
			$temp_arr2[$product_subcat] = $json_str;
			$temp_arr3[$product_cat] = $temp_arr2;
			$previous_data = array_merge($previous_data, $temp_arr3);
		}
		$json_str4[(string)$shop_name] = $previous_data;
		file_put_contents($file_name, json_encode($json_str4));
		fclose($file);
	}
	echo '<script language="javascript">
			alert("Product has been added, you can add new product now.")
			window.location.href="add-product-admin.php"
			</script>';
?>