<?php
	session_start();
	$product_id = $_POST["product_id"];
	$product_name = $_POST["product_name"];
	$product_cat = $_POST["product_cat"];
	$product_subcat = $_POST["product_subcat"];
	$flag = 0; // Will be used further to check if only one product is there :)
	//echo $product_id."<br>".$product_name."<br>".$product_cat."<br>".$product_subcat;

	$file_name = "user_folders/".$_SESSION['username']."/product_data.json";
	$file = fopen($file_name, "a+");
	$file_read = fread($file, filesize($file_name));
	$json_array = json_decode($file_read, true);
	$images_array = $json_array[$_SESSION['shop_name']][$product_cat][$product_subcat][$product_name]['product_image'];
	if (count($json_array[$_SESSION['shop_name']][$product_cat][$product_subcat]) > 1){
		unset($json_array[$_SESSION['shop_name']][$product_cat][$product_subcat][$product_name]); // Just delete product, no need to worry about subcategories...
		foreach ($images_array as $key => $value) {
			unlink('user_folders/'.$_SESSION['username'].'/images/'.$value);  // Delete images
		}
	}
	else{ // Only one product under category, so need to check if it only only subcategory or category or even one product!
		if (count($json_array[$_SESSION['shop_name']][$product_cat]) > 1){  // More than one subcategory, so just delete category
			unset($json_array[$_SESSION['shop_name']][$product_cat][$product_subcat]);
			foreach ($images_array as $key => $value) {
				unlink('user_folders/'.$_SESSION['username'].'/images/'.$value);  // Delete images
			}
		}
		else{ // Only one subcategory, so need to delete category too
			if (count($json_array[$_SESSION['shop_name']]) > 1){	// there are more than one category, so delete category
				unset($json_array[$_SESSION['shop_name']][$product_cat]);
				foreach ($images_array as $key => $value) {
					unlink('user_folders/'.$_SESSION['username'].'/images/'.$value);  // Delete images
				}	
			}
			else{ // Only one category, subcategory and product. So need to clear whole file!
				$flag = 1;
				foreach ($images_array as $key => $value) {
					unlink('user_folders/'.$_SESSION['username'].'/images/'.$value);  // Delete images
				}	
			} 
		}
	}
	if ($flag == 0){
		file_put_contents($file_name, json_encode($json_array));
	}
	else{
		file_put_contents($file_name, "");
	}
	echo "Product deleted.";
	fclose($file);
?>