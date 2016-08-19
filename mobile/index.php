<!doctype html>
<html lang="en">
<head>
    <title>爱奇艺专区</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="爱奇艺视频">
    <meta name="format-detection" content="telephone=no" />
    <style>
        html, body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: Lantinghei SC, Open Sans, Arial, Hiragino Sans GB, Microsoft YaHei, \\5FAE\8F6F\96C5\9ED1, STHeiti, WenQuanYi Micro Hei, SimSun, sans-serif;
        }

        li {
            list-style: none;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        .clear {
            clear: both;
            height: 5px;
        }

        .header {
            background-color: #313944;
            height: 50px;
            text-align: center;
        }

        .header img {
            height: 30px;
            margin-top: 10px;
        }

        .nav {
            height: 50px;
            width: 100%;
            width: 480px;
            border-bottom: solid #e6e6e6 1px;
        }

        .scroller {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            -webkit-transform: translateZ(0);
            -moz-transform: translateZ(0);
            -ms-transform: translateZ(0);
            -o-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-text-size-adjust: none;
            -moz-text-size-adjust: none;
            -ms-text-size-adjust: none;
            -o-text-size-adjust: none;
            text-size-adjust: none;
        }

        .scroller ul {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
            height: 100%;
            text-align: center;
        }

        .scroller li {
            display: block;
            float: left;
            width: 80px;
            text-align: center;
            font-size: 18px;
            line-height: 50px;
        }

        .con {
            /*margin: 0px 10px 10px 10px;*/
            min-height: 450px;
        }

        .banner {
            margin:0 10px 0 10px;
        }

        .banner iframe {
            width: 100%;
            height: 200px;
            border: 0px;
        }

        p {
            margin: 1px 0px 0px 0px;
        }

        .ban-title {
            font-size: 16px;
            font-weight: bolder;
            word-wrap: break-word;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .ban-desc {
            font-size: 14px;
            word-wrap: break-word;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .list {
            position: absolute;
            z-index: 1;
            bottom: 0px;
            top: 360px;
            left: 0px;
            right: 0px;
            overflow: auto;
            border-top: solid #e6e6e6 1px;
        }

        .list li {
            float: left;
            width: 49%;
            margin-top: 10px;
        }

        .list li:nth-child(even) {
            margin-left: 2%;
        }

        .list img {
            width: 100%;
            height: 100px;
        }

        .li-title {
            font-size: 13px;
            font-weight: bolder;
        }

        .li-desc {
            font-size: 12px;
            word-wrap: break-word;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .listscroller {
            position: absolute;
            z-index: 1;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            width: 100%;
            -webkit-transform: translateZ(0);
            -moz-transform: translateZ(0);
            -ms-transform: translateZ(0);
            -o-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-text-size-adjust: none;
            -moz-text-size-adjust: none;
            -ms-text-size-adjust: none;
            -o-text-size-adjust: none;
            text-size-adjust: none;
        }

        .bottom {
            height: 60px;
            width: 100%;
            background-color: #313944;
            color: #7c8282;
            text-align: center;
            font-size: 12px;
            padding-top: 15px;
        }
        #listVideo{
            margin: 0 10px 10px 10px;
        }
    </style>
</head>
<body>
<div class="header">

    <img src="images/logo.png">

</div>
<div id="wrapper">
    <div class="nav scroller">
        <ul>
            <li data-id="25">资讯</li>
            <li data-id="7">娱乐</li>
            <li data-id="22">搞笑</li>
            <li data-id="8">游戏</li>
            <li data-id="10">预告片</li>
            <li data-id="3">纪录片</li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<div class="con">
    <div class="banner" id="banner">
        <iframe id="default-video-src"
                src="">
        </iframe>
        <p class="ban-title" id="default-video-title">
        </p>
        <p class="ban-desc" id="default-video-desc">
        </p>
    </div>
    <div class="list" id="list">
        <div class="listscroller">
            <ul id="listVideo">

            </ul>
            <div class="clear"></div>

            <div class="bottom">
                <p>客服电话:4000-388-399 周一至周五工作时间 | 客服QQ:3024180734</p>
                <p>@国创科视 | ICP备案:辽ICP备15000555号</p>
            </div>
        </div>
    </div>

</div>

<!-- Scripts -->
<script src="js/zepto.min.js"></script>
<script src="js/iscroll.js"></script>
<script>
    //    Object
    //    channel
    //        :
    //        12
    //    desc
    //        :
    //        "Bigbang十年面貌大回顾 fsfs"
    //    h5Src
    //        :
    //        "http://dispatcher.video.qiyi.com/common/shareplayer.html?vid=cda5724fafe35809c97aaec0dba5413d&tvId=522968200&coop=coop_209_gcks&cid=qc_105149_300665&bd=1"
    //    id
    //        :
    //        522970700
    //    img
    //        :
    //        ""
    //    title
    //        :
    //        "dff"
    var jsonData = [];
    var navScroll, listScroll;

    $(function () {
        navScroll = new IScroll('#wrapper', {scrollX: true, scrollY: false, mouseWheel: true});

        document.addEventListener('touchmove', function (e) {
            e.preventDefault();
        }, false);
        $.ajax({
            url: "http://wx.widalian.com/w-aiqiyi/json/starjson.txt",
            type: "get",
            success: function (data) {
                var dataArray = data.split(";");

                for (var i = 0; i < dataArray.length; i++) {
//                    console.log( eval("(" + dataArray[i] + ")") );
                    if (dataArray[i] != '') {
                        jsonData.push(eval("(" + dataArray[i] + ")"));
                    }
                }
                console.log(jsonData);
                $(".nav li").tap(function () {
                    $(".nav li").css("color", "#000000");
                    $(".nav li").css("border-bottom", "solid #00bc00 0px");
                    $(this).css("color", "#00bc00");
                    $(this).css("border-bottom", "solid #00bc00 2px");
                    var channelId = $(this).attr("data-id");
                    initData(channelId);
                });
                $(".nav li:nth-child(1)").css("color", "#00bc00");
                $(".nav li:nth-child(1)").css("border-bottom", "solid #00bc00 2px");
                var channel = $(".nav li:nth-child(1)").attr("data-id");
                initData(channel);
            }
        });


    });


    function initData(channelId) {
        var flag = 0;
        var listVideo = "";
        for (var i = 0; i < jsonData.length; i++) {
            if (jsonData[i].channel == channelId) {
                if (flag == 0) {
                    $("#banner").html('<iframe id="default-video-src" src="' + jsonData[i].h5Src + '&autoPlay=0">' +
                        '</iframe>' +
                        '<p class="ban-title" id="default-video-title">' +
                        decodeURI(jsonData[i].title) +
                        '</p>' +
                        '<p class="ban-desc" id="default-video-desc">' +
                        decodeURI(jsonData[i].desc) +
                        '</p>');
                    flag = 1;
                } else {
                    listVideo = listVideo + '<li data-src="' + jsonData[i].h5Src+ '" data-title="' + decodeURI(jsonData[i].title) + '" data-desc="' + decodeURI(jsonData[i].desc) + '">' +
                        '<img src="' + jsonData[i].img + '">' +
                        '<p class="li-title">' +
                        decodeURI(jsonData[i].title) +
                        ' </p>' +
                        ' <p class="li-desc">' +
                        decodeURI(jsonData[i].desc) +
                        '</p></li>';
                }
            }
        }
        $("#listVideo").html(listVideo);
        if (flag == 0) {
            $("#banner").html("无相关视频")
            $("#listVideo").html("");
        }

        listScroll = new IScroll('#list', {mouseWheel: true});
        $("#listVideo li").tap(function () {
            var src = $(this).attr("data-src");
            var title = $(this).attr("data-title");
            var desc = $(this).attr("data-desc");
            $("#default-video-src").attr("src", src+"&autoPlay=0");
            $("#default-video-title").html(title);
            $("#default-video-desc").html(desc);
        });
    }

</script>
</body>
</html>
