<?php
	$fl = fopen("sample_json.json", "r+");

	$file_read = fread($fl, filesize("sample_json.json"));
	echo filesize("sample_json.json")."<br>";
	$str = json_decode($file_read, true);
	echo count($str)."<br>";
	echo gettype($str)."<br>";
	if (isset($str['abc'])){
		echo "test";
		$arr1 = array('product_price' => "399", 'product_stock' => "20", 'product_threshold' => "5", 'product_image' => [
            "Lenovo A6000_1.png"], 'product_id' => "00002", 'product_brand' => "", 'product_size' => "", 'product_description' => "", 'product_gender' => "", 'product_offer_price' => "", 'product_offer_percentage' => "", 'product_color' => ""); 
        
        if (isset($str["abc"]["electronics"])){
        	if (isset($str["abc"]["electronics"]["mobile"])){
        		$arr2 = $str["abc"]["electronics"]["mobile"];
        		$str2["lenovoA6000"] = $arr1;
        		$str3["mobile"] = array_merge($arr2, $str2); 
        		$str4["electronics"] = $str3;
        		$str5["abc"] = $str4;
        	}
        	else{
        		$str2["lenovoA6000"] = $arr1;
        		$arr2 = $str["abc"]["electronics"];
        		$str3["mobile"] = $str2;
        		$arr3["electronics"] = array_merge($arr2, $str3);
        		$str5["abc"] = $arr3;
        	}
        } 
        /*$str2["lenovoA6000"] = $arr1;
        $str3["mobile"] = $str2;
        $str4["electronics"] = $str3;*/
        fseek($fl, 0);
        fwrite($fl, json_encode($str5));
	}
	else{
		echo "djcbjhd";
	}
	
	fclose($fl);
?>