<?php
	   $files = array_diff(scandir(getcwd(),1),array('..','.'));
	   $white_image = 'blank2.jpg';
	   foreach ($files as $f) {
		if($f != 'imagechange.php' && $f != 'blank2.jpg'){
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
			   imagejpeg($im, $f ,100);
			   imagedestroy($im);
			   imagedestroy($dst_image);
		   }
		   else{
				imagecopy($im, $im2, (imagesx($im)/2)-(imagesx($im2)/2), (imagesy($im)/2)-(imagesy($im2)/2), 0, 0, imagesx($im2), imagesy($im2));
				imagejpeg($im,$photo_to_paste,100);
				imagedestroy($im);
				imagedestroy($im2);
			}
		}
	   }
	   //unlink('blank.jpg');
?>