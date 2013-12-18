<?php


$cap_width=80;


$cap_height=30;


$cap_quality=100;


$cap_length_min=6;


$cap_length_max=6;


$cap_digital=1;


$cap_latin_char=1;





// _____________________________________________________________________________


function code_generic($_length,$_digital=1,$_latin_char=1)


{


$dig=array(0,1,2,3,4,5,6,7,8,9);


 


$lat=array('a','b','c','d','e','f','g','h','j','k','l','m','n','o',


'p','q','r','s','t','u','v','w','x','y','z');


$main=array();





if ($_digital) $main=array_merge($main,$dig);





if ($_latin_char) $main=array_merge($main,$lat);











shuffle($main);








$pass=substr(implode('',$main),0,$_length);


return $pass;


}








if(isset($_GET['checkcap'])=='1'){
if($_GET['checkcap']=='1')

{


@session_start();


if(isset($_GET['cap_code'])){ 

if($_GET['cap_code']==$_SESSION['captcha_code'])
echo 1;

}
else echo 0;


}}


else


{


$l=rand($cap_length_min,$cap_length_max);


$code=code_generic($l,$cap_digital,$cap_latin_char);


@session_start();


$_SESSION['captcha_code']= $code;





$canvas=imagecreatetruecolor($cap_width,$cap_height);


$c=imagecolorallocate($canvas,rand(150,255),rand(150,255),rand(150,255));


imagefilledrectangle($canvas,0,0,$cap_width,$cap_height,$c);


$count=strlen($code);


$color_text=imagecolorallocate($canvas,0,0,0);


for($it=0;$it<$count;$it++)


{ $letter=$code[$it];


  imagestring($canvas,6,(10*$it+10),$cap_height/4,$letter,$color_text);


 


  // imagettftext($canvas,20,rand(-45,45),10,10,'#FFFFFF','arial.ttf','1');


}





for ($c = 0; $c < 150; $c++){


	$x = rand(0,79);


	$y = rand(0,29);


	$col='0x'.rand(0,9).'0'.rand(0,9).'0'.rand(0,9).'0';


	imagesetpixel($canvas, $x, $y, $col);


	}






header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 


header('Cache-Control: no-store, no-cache, must-revalidate'); 


header('Cache-Control: post-check=0, pre-check=0',false);


header('Pragma: no-cache');


header('Content-Type: image/jpeg');


imagejpeg($canvas,null,$cap_quality);


}


?>