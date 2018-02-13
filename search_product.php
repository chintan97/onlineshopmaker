<?php
session_start();
$q = $_GET['q'];
$product_names = $_SESSION["names"];

if (strlen($q)>0) {
  $hint="";
  $max_count = 0;
  $q = preg_replace('/\s+/', '', $q);
  for ($i=0; $i<count($product_names); $i++){
  	if (stristr($product_names[$i][2], $q)){
  		if ($hint == ""){
  			$hint = "<a href='preview-products.php?pro=".$product_names[$i][2]."&i=".$i."'>".$product_names[$i][2]."</a>";
  		}
  		else{
  			$hint = $hint."<br><a href='preview-products.php?pro=".$product_names[$i][2]."&i=".$i."'>".$product_names[$i][2]."</a>";
  		}
  		$max_count++;
  	}
  	if ($max_count>10){
  		break;
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