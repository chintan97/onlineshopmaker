<?php
	$name = 'test_dir';
	if(!file_exists('user_folders/'.$name))
	mkdir('user_folders/'.$name);
	$temp = fopen('user_folders/'.$name.'/product_data.json', 'w');
	fclose($temp);
?>