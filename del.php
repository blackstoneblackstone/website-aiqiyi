<?php

$delObj = urldecode($_POST["obj"]);

$star = file_get_contents("json/starjson.txt");

// $dataj=json_decode("'".$data."'");

// echo $starj.">>>".$data;die;
// echo json_encode($data);die;

$star = str_replace($delObj . ";", "", $star);
$myfile = fopen("json/starjson.txt", "w") or die("Unable to open file!");
fwrite($myfile, $star);
fclose($myfile);
echo $delObj;
echo $star;
die;


?>