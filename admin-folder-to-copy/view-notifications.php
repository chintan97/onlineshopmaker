<?php
	session_start();
?>
<html>
<head>
</head>
<body>
	<?php
	if (file_exists('../notifications.json') && filesize('../notifications.json') > 0){
		$file = fopen('../notifications.json', 'a+');
		$file_data = fread($file, filesize('../notifications.json'));
		$file_read = json_decode($file_data, true);
		$count = 1;
		if (count($file_read['root']) > 0){
			echo "Stock for below mentioned product is less than threshold defined.<br><hr>";
		}
		else {
			echo "You have no notifications.<br><br>No products stock is less than threshold.<br><br>You can check product stock from preview products.";
		}
		foreach ($file_read['root'] as $key => $value) {
			if ($value[6] == 'unseen'){
				echo "<span style='color:red'>Category: ".$value[0].", Subcategory: ".$value[1]."<br>Product name: ".$value[2].", Product id: ".$value[3]."<br>Stock: ".$value[4].", Threshold: ".$value[5]."</span><br><hr>";
			}
			else {
				echo "Category: ".$value[0].", Subcategory: ".$value[1]."<br>Product name: ".$value[2].", Product id: ".$value[3]."<br>Stock: ".$value[4].", Threshold: ".$value[5]."<br><hr>";
			}
			$file_read['root'][$key][6] = 'seen';
		}
		file_put_contents('../notifications.json', json_encode($file_read));
		fclose($file);
	}
	else {
		echo "You have no notifications.<br><br>No products stock is less than threshold.<br><br>You can check product stock from preview products.";
	}
	?>
</body>
</html>