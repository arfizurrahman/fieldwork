<?php session_start();
     $a = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
     $str = str_shuffle($a);
     $str = substr($str,0,6);
     
     $img = imagecreate(130,52);
     
     imagecolorallocate($img, 220,220,220);
   
     $color = imagecolorallocate($img, 0,0,0);
     
     $_SESSION['cap'] = $str;
	 for($x = 1; $x<=20; $x++){
		 $x1 = rand(1,100);
		 $y1 = rand(1,100);
		 $x2 = rand(1,100);
		 $y2 = rand(1,100);
		 imageline($img,$x1,$y1,$x2,$y2,200);
	 }
     
     imagettftext($img, 20,0,10,34,$color,"fonts/ARTBRUSH.TTF",$str);
     header("content-type:image/jpeg");
	 

     imagejpeg($img);
     imagedestroy($img);
     
?>