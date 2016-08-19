<?php
$vid = $_GET["vid"];

$info = curlGet("http://expand.video.iqiyi.com/api/video/info.json?apiKey=eff9fc20731447578ebafa045bfd487d&tvId=" . $vid);

//header("Location:".$info->data->swf);
foreach ($info->data->playControls as $control) {
    if ($control->platformId == 15 && $control->cooperationAllowed == 1 && $control->availableStatus == 1) {
        echo $info->data->swf;die;
    }
}
echo 0;

function curlGet($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $info = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Errno' . curl_error($ch);
    } else {
        // echo 'success!!!';
    }

    curl_close($ch);

    return json_decode($info);
}


?>