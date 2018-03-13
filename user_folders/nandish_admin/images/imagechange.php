<?php
	    
	   $type = $_GET['type'];
	   $files = array_diff(scandir(getcwd(),1),array('..','.'));
	   if($type == 'main_page'){
	   $white_image = 'blank.jpg';
	   foreach ($files as $f) {
		if($f != 'imagechange.php' && $f != 'blank.jpg' && $f != 'main_page' && $f != 'product_show' && $f != 'imagechange_product.php' && $f != 'imagechange_product.php' && $f != 'blank_product.jpg' && $f != 'blank_basket.jpg' && $f != 'product_basket' && $f != 'imagechange_basket.php' && $f != 'blank_product_detail.jpg' && $f != 'imagechange_product_detail.php' && $f != 'product_detail'){
		   $photo_to_paste=$f;
		   $im = imagecreatefromjpeg($white_image);
		   $condicion = GetImageSize($photo_to_paste);
		   if($condicion[2] == 1)
		       $im2 = imagecreatefromgif("$photo_to_paste");
		   if($condicion[2] == 2)
		       $im2 = imagecreatefromjpeg("$photo_to_paste");
		   if($condicion[2] == 3)
		       $im2 = imagecreatefrompng("$photo_to_paste");
		   if(imagesx($im2) > 1200 || imagesy($im2) > 563){
			   $dst_image = imagecreatetruecolor(800, 600);
			   imagecopyresized($dst_image, $im2, 0, 0, 0, 0, 800, 600, imagesx($im2), imagesy($im2));
			   imagecopy($im, $dst_image, (imagesx($im)/2)-(imagesx($dst_image)/2), (imagesy($im)/2)-(imagesy($dst_image)/2), 0, 0, imagesx($dst_image), imagesy($dst_image));
			   imagejpeg($im, 'main_page/'.$f ,100);
			   imagedestroy($im);
			   imagedestroy($dst_image);
		   }
		   else{
				imagecopy($im, $im2, (imagesx($im)/2)-(imagesx($im2)/2), (imagesy($im)/2)-(imagesy($im2)/2), 0, 0, imagesx($im2), imagesy($im2));
				imagejpeg($im,'main_page/'.$photo_to_paste,100);
				imagedestroy($im);
				imagedestroy($im2);
			}
		}
	   }
	   }
	   else if($type == 'product_show'){
		   $white_image = 'blank_product.jpg';
		   foreach ($files as $f) {
			if($f != 'imagechange.php' && $f != 'blank.jpg' && $f != 'main_page' && $f != 'product_show' && $f != 'imagechange_product.php' && $f != 'imagechange_product.php' && $f != 'blank_product.jpg' && $f != 'blank_basket.jpg' && $f != 'product_basket' && $f != 'imagechange_basket.php' && $f != 'blank_product_detail.jpg' && $f != 'imagechange_product_detail.php' && $f != 'product_detail'){
			   $photo_to_paste=$f;
			   $im = imagecreatefromjpeg($white_image);
			   $condicion = GetImageSize($photo_to_paste);
			   if($condicion[2] == 1)
				   $im2 = imagecreatefromgif("$photo_to_paste");
			   if($condicion[2] == 2)
				   $im2 = imagecreatefromjpeg("$photo_to_paste");
			   if($condicion[2] == 3)
				   $im2 = imagecreatefrompng("$photo_to_paste");
			   if(imagesx($im2) > 450 || imagesy($im2) > 600){
				   $dst_image = imagecreatetruecolor(450, 600);
				   imagecopyresized($dst_image, $im2, 0, 0, 0, 0, 450, 600, imagesx($im2), imagesy($im2));
				   imagecopy($im, $dst_image, (imagesx($im)/2)-(imagesx($dst_image)/2), (imagesy($im)/2)-(imagesy($dst_image)/2), 0, 0, imagesx($dst_image), imagesy($dst_image));
				   imagejpeg($im, 'product_show/'.$f ,100);
				   imagedestroy($im);
				   imagedestroy($dst_image);
			   }
			   else{
					imagecopy($im, $im2, (imagesx($im)/2)-(imagesx($im2)/2), (imagesy($im)/2)-(imagesy($im2)/2), 0, 0, imagesx($im2), imagesy($im2));
					imagejpeg($im,'product_show/'.$photo_to_paste,100);
					imagedestroy($im);
					imagedestroy($im2);
				}
			}
		   }
	   }
	   else if($type == 'product_detail'){
		   $white_image = 'blank_product_detail.jpg';
		   foreach ($files as $f) {
			if($f != 'imagechange.php' && $f != 'blank.jpg' && $f != 'main_page' && $f != 'product_show' && $f != 'imagechange_product.php' && $f != 'imagechange_product.php' && $f != 'blank_product.jpg' && $f != 'blank_basket.jpg' && $f != 'product_basket' && $f != 'imagechange_basket.php' && $f != 'blank_product_detail.jpg' && $f != 'imagechange_product_detail.php' && $f != 'product_detail'){
			   $photo_to_paste=$f;
			   $im = imagecreatefromjpeg($white_image);
			   $condicion = GetImageSize($photo_to_paste);
			   if($condicion[2] == 1)
				   $im2 = imagecreatefromgif("$photo_to_paste");
			   if($condicion[2] == 2)
				   $im2 = imagecreatefromjpeg("$photo_to_paste");
			   if($condicion[2] == 3)
				   $im2 = imagecreatefrompng("$photo_to_paste");
			   if(imagesx($im2) > 450 || imagesy($im2) > 678){
				   $dst_image = imagecreatetruecolor(450, 678);
				   imagecopyresized($dst_image, $im2, 0, 0, 0, 0, 450, 678, imagesx($im2), imagesy($im2));
				   imagecopy($im, $dst_image, (imagesx($im)/2)-(imagesx($dst_image)/2), (imagesy($im)/2)-(imagesy($dst_image)/2), 0, 0, imagesx($dst_image), imagesy($dst_image));
				   imagejpeg($im, 'product_detail/'.$f ,100);
				   imagedestroy($im);
				   imagedestroy($dst_image);
			   }
			   else{
					imagecopy($im, $im2, (imagesx($im)/2)-(imagesx($im2)/2), (imagesy($im)/2)-(imagesy($im2)/2), 0, 0, imagesx($im2), imagesy($im2));
					imagejpeg($im,'product_detail/'.$photo_to_paste,100);
					imagedestroy($im);
					imagedestroy($im2);
				}
			}
		   }
	   }
	   else if($type == 'basket'){
		   $white_image = 'blank_basket.jpg';
			foreach ($files as $f) {
			if($f != 'imagechange.php' && $f != 'blank.jpg' && $f != 'main_page' && $f != 'product_show' && $f != 'imagechange_product.php' && $f != 'imagechange_product.php' && $f != 'blank_product.jpg' && $f != 'blank_basket.jpg' && $f != 'product_basket' && $f != 'imagechange_basket.php' && $f != 'blank_product_detail.jpg' && $f != 'imagechange_product_detail.php' && $f != 'product_detail'){
			   $photo_to_paste=$f;
			   $im = imagecreatefromjpeg($white_image);
			   $condicion = GetImageSize($photo_to_paste);
			   if($condicion[2] == 1)
				   $im2 = imagecreatefromgif("$photo_to_paste");
			   if($condicion[2] == 2)
				   $im2 = imagecreatefromjpeg("$photo_to_paste");
			   if($condicion[2] == 3)
				   $im2 = imagecreatefrompng("$photo_to_paste");
			   if(imagesx($im2) > 200 || imagesy($im2) > 200){
				   $dst_image = imagecreatetruecolor(200, 200);
				   imagecopyresized($dst_image, $im2, 0, 0, 0, 0, 200, 200, imagesx($im2), imagesy($im2));
				   imagecopy($im, $dst_image, (imagesx($im)/2)-(imagesx($dst_image)/2), (imagesy($im)/2)-(imagesy($dst_image)/2), 0, 0, imagesx($dst_image), imagesy($dst_image));
				   imagejpeg($im, 'product_basket/'.$f ,100);
				   imagedestroy($im);
				   imagedestroy($dst_image);
			   }
			   else{
					imagecopy($im, $im2, (imagesx($im)/2)-(imagesx($im2)/2), (imagesy($im)/2)-(imagesy($im2)/2), 0, 0, imagesx($im2), imagesy($im2));
					imagejpeg($im,'product_basket/'.$photo_to_paste,100);
					imagedestroy($im);
					imagedestroy($im2);
				}
			}
		   }
	   }
?>