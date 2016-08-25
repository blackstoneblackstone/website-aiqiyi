<?php
$star = file_get_contents("json/starjson.txt");

$arr = explode(";", $star);


?>


<title> 爱奇艺收藏</title>
<script type="text/javascript" src="js/jQuery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<style type="text/css">
    body {
        padding: 50px;
    }
</style>
<script>
    function del(obj) {
        $.ajax({
            url: "del.php",
            type: "post",
            data: {
                obj: obj
            },
            success: function (data) {
                alert("删除成功");
                location.reload();
            }
        });
    }
</script>
</head>
<body>

<h1>
    收藏的视频
</h1>
<hr>
<table class="table table-bordered">
    <thead>
    <th>栏目</th>
    <th>ID</th>
    <th>图片</th>
    <th>标题</th>
    <th>ACTION</th>
    </thead>
    <?php

    for ($i = 0; $i < (count($arr) - 1); $i++) {
        $ob = json_decode($arr[$i]);

        echo '<tr><td>' . $ob->channel . '</td>' .
            '<td>' . $ob->id . '</td>' .
            '<td><img style="width:100px" src="' . $ob->img . '"></td>' .
            '<td>' . urldecode($ob->title) . '</td>' .
            '<td><a href="'. $ob->h5Src. '" class="btn btn-success">预览</a>' .
            '<button class="btn btn-danger" onclick="del(\'' . urlencode(json_encode($ob)) . '\')">删除</button>' .
            '</td><tr>';
    }

    ?>
</table>


</body>
</html>