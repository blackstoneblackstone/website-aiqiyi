<?php
$channel=$_POST["channel"];
$id=$_POST["id"];
$name=$_POST["title"];
$desc=$_POST["desc"];
$h5=$_POST["h5Src"];
$img=$_POST["img"];

$star= file_get_contents("json/starjson.txt");
// echo $star;die;

// $dataj=json_decode("'".$data."'");

// echo $starj.">>>".$data;die;
// echo json_encode($data);die;
if(!strpos($star,$id)){
$star=$star.'{"channel":'.$channel.',"id":'.$id.',"title":"'.$name.'","desc":"'.$desc.'","h5Src":"'.$h5.'","img":"'.$img.'"};';
$myfile = fopen("json/starjson.txt", "w") or die("Unable to open file!");
fwrite($myfile, $star);
fclose($myfile);
}
echo $star;






?>