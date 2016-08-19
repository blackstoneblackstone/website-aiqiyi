<?php

$q = $_GET["q"];
$qlist = curlGet("http://expand.video.iqiyi.com/api/category/list.json?apiKey=eff9fc20731447578ebafa045bfd487d");
// echo $qlist;


$list = curlGet("http://expand.video.iqiyi.com/api/album/list.json?apiKey=eff9fc20731447578ebafa045bfd487d&categoryId=" . $q);
// echo json_encode($list);
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
<html>
<head>

    <title> 爱奇艺</title>
    <style type="text/css">

        body {
            padding: 50px;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <script>
        function star(id, title, desc, src, channel, ele) {
            var img = $("#" + id).val();
            if (img == '') {
                alert("请填写图片地址");
                return;
            }
            console.log($(ele));
            $(ele).button('loading');
            $.ajax(
                {
                    url: src,
                    type: "get",
                    success: function (data1) {
                        if (data1 == 0) {
                            alert("该资源不能在手机端播放");
                            return;
                        }
                        var h5 = data1.replace("http://dispatcher.video.qiyi.com/disp/shareplayer.swf", "http://m.iqiyi.com/shareplay.html");

                        $.ajax(
                            {
                                url: "json.php",
                                type: "post",
                                data: {
                                    title: title,
                                    id: id,
                                    desc: desc,
                                    img: img,
                                    h5Src: h5,
                                    channel: channel
                                },
                                success: function (data1) {
                                    $(ele).button('reset');
                                    alert("收藏成功");
                                }
                            });

                    }
                });

        }
        function model(src) {
            $.ajax(
                {
                    url: src,
                    type: "get",
                    success: function (data1) {
                        $("#videosrc").attr("src", data1.replace("http://dispatcher.video.qiyi.com/disp/shareplayer.swf", "http://m.iqiyi.com/shareplay.html"));
                        $("#myModal").modal();
                    }
                });
        }

    </script>
</head>
<body>
<div class="well">
    <div class="page-header">
        <h1>爱奇艺
            <small>视频</small>
        </h1>
        <a href="star.php">收藏的视频</a>
    </div>
    <ul class="nav nav-tabs">
        <?php

        for ($i = 0; $i < count($qlist->data); $i++) {
            if ($q == $qlist->data[$i]->categoryId) {
                echo '<li role="presentation" class="active"><a href="index.php?q=' . $qlist->data[$i]->categoryId . '">' . $qlist->data[$i]->categoryName . '</a></li>';

            } else {
                echo '<li role="presentation" ><a href="index.php?q=' . $qlist->data[$i]->categoryId . '">' . $qlist->data[$i]->categoryName . '</a></li>';
            }
        }

        ?>
    </ul>

    <table class="table table-bordered">
        <thead>
        <th>ID</th>
        <th>PICURL</th>
        <th>NAME</th>
        <th>DESC</th>
        <th>图片地址</th>
        <th>详情</th>
        <th>预览</th>
        <th>弹框</th>
        <th>收藏</th>
        </thead>
        <?php

        for ($i = 0; $i < count($list->data); $i++) {
            echo '<tr><td>' . $list->data[$i]->albumId . '</td>' .
                '<td><a href="' . $list->data[$i]->picUrl . '">查看图片<img src="' . $list->data[$i]->picUrl . '"></a></td>' .
                '<td>' . $list->data[$i]->albumName . '</td>' .
                '<td>' . $list->data[$i]->desc . '</td>' .
                '<td><input id="' . $list->data[$i]->albumId . '"></td>' .
                '<td><a href="swf.php?vid=' . $list->data[$i]->tvIds[0] . '" target="_blank" class="btn btn-success btn-lg" >预览</a></td>' .
                '<td><a href="http://expand.video.iqiyi.com/api/video/info.json?apiKey=eff9fc20731447578ebafa045bfd487d&tvId=' . $list->data[$i]->tvIds[0] . '" target="_blank" class="btn btn-success btn-lg" >详细</a></td>' .
                '<td><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" onclick="model(\'swf.php?vid=' . $list->data[$i]->tvIds[0] . '\')" >弹框</button></td>' .
                '<td><button data-loading-text="收藏中..."  onclick="star(\'' . $list->data[$i]->albumId . '\',\'' . $list->data[$i]->albumName . '\',\'' . $list->data[$i]->desc . '\',\'swf.php?vid=' . $list->data[$i]->tvIds[0] . '\',\'' . $list->data[$i]->categoryId . '\',this)" class="btn btn-warning">收藏</button></td>' .
                '<tr>';
        }

        ?>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" style="display: none" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">预览</h4>
            </div>
            <div class="modal-body" style="height: 667px;width: 375px">
                <!--                <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="500" height="300">-->
                <!--                    <param id="src1" name="movie" value=""/>-->
                <!--                    <param name="quality" value="high"/>-->
                <!--                    <param name="wmode" value="transparent"/>-->
                <!--                    <param value="true" name="allowFullScreen"/>-->
                <!--                    <embed id="src2" src="" wmode="transparent" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="500" height="300" allowfullscreen="true"/>-->
                <!--                </object>-->
                <iframe id="videosrc" src="" width="375" height="667">


                </iframe>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


</body>
</html>