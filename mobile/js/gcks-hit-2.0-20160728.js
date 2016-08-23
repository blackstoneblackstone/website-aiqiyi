/*
 *        
 *      *****        *****    *  ***     ******
 *     *            *         * *        *
 *    **  ****     *          **         ******
 *     *  *  *      *         * *             *
 *      ****         *****    *  ***     ******
 *
 *
 *                 8   8  88888  88888
 *                 8   8    8      8 
 *                 88888    8      8
 *                 8   8    8      8
 *                 8   8  88888    8
 *
 *   
 *    SDK-version : 1.0
 *    DATE : 2016-06-06
 *  
 *
 */


(function (global) {
    var pageId = uuid();

    function uuid() {
        var s = [];
        var hexDigits = "0123456789abcdef";
        for (var i = 0; i < 36; i++) {
            s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
        }
        s[14] = "4"; // bits 12-15 of the time_hi_and_version field to 0010
        s[19] = hexDigits.substr((s[19] & 0x3) | 0x8, 1); // bits 6-7 of the clock_seq_hi_and_reserved to 01
        s[8] = s[13] = s[18] = s[23] = "-";

        var uuid = s.join("");
        return uuid;
    }

    function urlParameter() {
        var script = document.getElementsByTagName('script');
        var l = script.length;
        for (var i = 0; i < l; i++) {
            var me = !!document.querySelector ? script[i].src : script[i].getAttribute('src', 4);
            if ((me.substr(me.lastIndexOf('/'))).indexOf('gcks-hit') !== -1) {
                break;
            }
        }
        return me.split('?')[1];
    };
    /*!
     * 获取url参数值函数
     */
    function GetParameters(name) {
        var urlParameters = urlParameter();
        if (urlParameters || urlParameters.indexOf('&') > 0) {
            var parame = urlParameters.split('&'),
                i = 0,
                l = parame.length,
                arr;
            for (var i = 0; i < l; i++) {
                arr = parame[i].split('=');
                if (name === arr[0]) {
                    return arr[1];
                }
            }
        }
        return "";
    };
    // var appId = GetParameters("appId");
    // var appVer = GetParameters("appVer");
    // var extend = GetParameters("extend");

    var appId = "-";
    var appVer = "-";
    var cityId = "-";
    var provinceId = "-";

    function send(postData) {
        var data = JSON.stringify(postData);
        var postDataParam = "provinceId=" + provinceId + "&cityId=" + cityId + "&appId=" + appId + "&appVer=" + appVer + "&data=" + data;
        var e = new Image;
        //测试
        e.src = "http://10.8.122.72:10020/index.php?" + postDataParam;
        // e.src = "http://hit.i-dalian.cn:30012/index.php?" + postDataParam;
        e.onload = e.onerror = e.onabort = function () {
            e = e.onload = e.onerror = e.onabort = null;
        };
        // var xhr = new XMLHttpRequest();
        // xhr.open("POST", "http://10.8.122.72:10050/index.php", true);
        // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // xhr.send(postDataParam);
    }


    global.GcksHit = global.GcksHit || {};

    function getLocalIPAddr() {
        var oSetting = null;
        var ip = "";
        try {
            oSetting = new ActiveXObject("rcbdyctl.Setting");
            ip = oSetting.GetIPAddress;
            if (ip.length == 0) {
                return "";
            }
            oSetting = null;
        } catch (e) {
            return ip;
        }
        return ip;
    }

    function openPage(config) {
        var openConfig = config;
        openConfig.point_id = "P0001";
        send(openConfig);
    }

    var timestamp = new Date().getTime();
    var config = {
        page_id: pageId,
        point_id: "",
        client_user_ip: getLocalIPAddr(),
        cid: "0",
        client_timestamp: timestamp
    };

    // var e = extend.split(";");
    // for (var i = 0; i < e.length; i++) {
    //     var ei = e[i].split(":");
    //     config[ei[0]] = ei[1];
    // }
    //打开页面打点
    // openPage(config);

    //cityid:城市编码
    // province:省份编码
    // appid:应用标示
    // appver:版本
    GcksHit.init = function (cityid, provinceid, appid, appver, extendInit) {
        appId = appid;
        appVer = appver;
        cityId = cityid;
        provinceId = provinceid;
        var el = extendInit.split(";");
        for (var i = 0; i < el.length; i++) {
            var ei = el[i].split(":");
            config[ei[0]] = ei[1];
        }
        openPage(config);
    }

    //关闭页面打点
    window.onbeforeunload = function () {
        var closeConfig = config;
        closeConfig.point_id = "P0002";
        send(closeConfig);
    }

    //点击打点
    GcksHit.click = function (pointId, cid) {
        var clickConfig = config;
        clickConfig.point_id = pointId;
        clickConfig.cid = cid;
        send(clickConfig);
    };
})(this);


//piwik
var _paq = _paq || [];
_paq.push(["setDomains", ["*.wx.widalian.com/w-aiqiyi/mobile/index.html"]]);
_paq.push(['trackPageView']);
_paq.push(['enableLinkTracking']);
(function() {
    var u="//piwik.i-dalian.cn:30013/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 3]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
})();

