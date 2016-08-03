<?php 
$id=$_GET["id"];
$name=$_GET["name"];
$desc=$_GET["desc"];
$star= file_get_contents("json/starjson.json");
// echo $star;die;

// $dataj=json_decode("'".$data."'");

// echo $starj.">>>".$data;die;
// echo json_encode($data);die;
if(!strpos($star,$id)){
$star=$star.'{"id":"'.$id.'","name":"'.$name.'","desc":"'.$desc.'"};';
$myfile = fopen("json/starjson.json", "w") or die("Unable to open file!");
fwrite($myfile, $star);
fclose($myfile);
}
echo $star;






?>