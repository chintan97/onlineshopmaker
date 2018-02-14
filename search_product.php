<?php
session_start();
$q = $_GET['q'];
if (isset($_GET['c'])){
  $ch = $_GET['c'];
}
if (isset($_GET['s'])){
  $sub = $_GET['s'];
}
$product_names = $_SESSION["names"];

if (strlen($q)>0) {
  $hint="";
  $max_count = 0;
  $q = preg_replace('/\s+/', '', $q);
  if (!isset($_GET['c']) && !isset($_GET['s'])){
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
  }
  else if (isset($_GET['c']) && !isset($_GET['s'])){
    for ($i=0; $i<count($product_names); $i++){
      if ($product_names[$i][0] == $ch && stristr($product_names[$i][2], $q)){
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
  }
  else if(isset($_GET['c']) && isset($_GET['s'])){
    for ($i=0; $i<count($product_names); $i++){
      if ($product_names[$i][0] == $ch && $product_names[$i][1] == $sub && stristr($product_names[$i][2], $q)){
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
  }

if ($hint=="") {
  $response="no matches found!";
} else {
  $response=$hint;
}
echo $response;
}
?>