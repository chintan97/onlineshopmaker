<?php
if (isset($_GET["q"])){
	$q = $_GET["q"];
	$read_file = file_get_contents("product_data.json");
	$read_data = json_decode($read_file, true);
	$products = [];
	foreach ($read_data as $shop_name123 => $value) {
		foreach ($value as $category => $value1) {
			foreach ($value1 as $subcategory => $value2) {
				foreach ($value2 as $product_name => $value3) {
					$temp_array = array(0 => $product_name, 1 => $value3['product_id']);
					array_push($products, $temp_array);
				}
			}
		}
	}

	if (strlen($q) > 0){
		$hint = "";
		$max_count = 0;
		$q = preg_replace('/\s+/', '', $q);
    	for ($i=0; $i<count($products); $i++){
    		if (stristr($products[$i][0], $q)){
    			if ($hint == ""){
    				$hint = "<a href='detail.php?pro=".$products[$i][0]."&id=".$products[$i][1]."'>".$products[$i][0]."</a>";
    			}
    			else{
    				$hint = $hint."<br><a href='detail.php?pro=".$products[$i][0]."&id=".$products[$i][1]."'>".$products[$i][0]."</a>";
    			}
    			$max_count++;
    		}
    		if ($max_count>10){
    			break;
    		}
    	}
	}
	if ($hint=="") {
  		$response="no matches found!";
	} else {
  		$response=$hint;
	}
	echo $response;
}

?>