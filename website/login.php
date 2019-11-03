<html><head>
    <title>上海交通大学统一身份认证</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <base href="">
    <link rel="icon" type="image/x-icon" href="https://jaccount.sjtu.edu.cn/jaccount/image/favicon.png?v=20161228">
    <link href="https://jaccount.sjtu.edu.cn/jaccount/css/login.css?v=20170907" rel="stylesheet">
    <script>
        function setLocale(value) {
            var href = window.location.href;
            var regex = new RegExp("[&\\?]locale=");
            if(regex.test(href)) {
                regex = new RegExp("([&\\?])locale=\\w+");
                window.location.href = href.replace(regex, "$1locale=" + value);
            } else {
                if(href.indexOf("?") > -1)
                    window.location.href = href + "&locale=" + value;
                else
                    window.location.href = href + "?locale=" + value;
            }
        }
    </script>
    </head>
<body>
<div id="page">
    <div id="header" class="clearfix">
        <div class="container">
            <div class="logo">
                <img src="https://jaccount.sjtu.edu.cn/jaccount/image/sjtu.png?v=20161228" border="0">
            </div>
            <div class="i18n action-control">
                <a href="javascript:setLocale('zh')">中文</a> | <a href="javascript:setLocale('en')">EN</a>
            </div>
        </div>
    </div>
    <div id="content">
        <div class="container">
            <div class="login-bg"></div>
            <div class="login-layout">
                


<script>

    var addEvent = function (html_element, event_name, event_function) {
        if (html_element.addEventListener) { // Modern
            html_element.addEventListener(event_name, event_function, false);
        } else if (html_element.attachEvent) { // Internet Explorer
            html_element.attachEvent("on" + event_name, event_function);
        } else { // others
            html_element["on" + event_name] = event_function;
        }
    };

    var loadScript = function (url, done, fail) {
        var head = document.getElementsByTagName("head")[0];
        var script = document.createElement("script");
        script.src = url;

        // Attach handlers for all browsers
        script.onload = script.onreadystatechange = function () {
            if (!this.readyState || this.readyState == "loaded" || this.readyState == "complete") {
                if (done != null && (typeof done == "function")) {
                    done();
                }
                // Handle memory leak in IE
                script.onload = script.onreadystatechange = null;
            }
        };

        script.onerror = function () {
            if (fail != null && (typeof fail == "function")) {
                fail();
            }
            // Handle memory leak in IE
            script.onload = script.onreadystatechange = null;
        };
        head.appendChild(script);
    };

    var hasSub = false,
        subFailed = false;

    var showQr = function () {
        var qrDiv = document.getElementById('login-qr');
        if (qrDiv != null) {
            qrDiv.setAttribute('class', 'show');
        }
    };

    var showQrImg = function () {
        var qrDiv = document.getElementById('qr-img');
        if (qrDiv != null) {
            qrDiv.setAttribute('class', 'code show');
        }
    };

    var showQrMsg = function (msg) {
        var msgSpan = document.getElementById('qr-msg');
        if (msgSpan != null) {
            msgSpan.innerHTML = msg;
        }
    };

    var hideQr = function () {
        var qrDiv = document.getElementById('login-qr');
        if (qrDiv != null) {
            qrDiv.removeAttribute('class');
        }
        var form = document.getElementById('form-input');
        if (form != null) {
            form.removeAttribute('class');
        }
        var actionDiv = document.getElementById('login-action');
        if (actionDiv != null) {
            actionDiv.setAttribute('class', 'action-control');
        }
    };

    var showTryAppLogin = function (timeout) {
        var waitDiv = document.getElementById('login-app-wait'),
            spinnerDiv = document.getElementById('login-app-spinner'),
            downloadDiv = document.getElementById('login-app-download'),
            failDiv = document.getElementById('login-app-fail');
        if (waitDiv != null) {
            waitDiv.setAttribute('class', 'show');
            waitDiv.removeAttribute('style');
            spinnerDiv.removeAttribute('class');
            downloadDiv.removeAttribute('class');
            failDiv.removeAttribute('class');
        }

        return setTimeout(function () {
            waitDiv.setAttribute('class', 'show download');
            spinnerDiv.setAttribute('class', 'hide');
            downloadDiv.setAttribute('class', 'show');
            failDiv.removeAttribute('class');
        }, timeout);
    };

    var showTryAppFailed = function () {
        var waitDiv = document.getElementById('login-app-wait'),
            spinnerDiv = document.getElementById('login-app-spinner'),
            downloadDiv = document.getElementById('login-app-download'),
            failDiv = document.getElementById('login-app-fail');
        waitDiv.setAttribute('class', 'show');
        spinnerDiv.setAttribute('class', 'hide');
        downloadDiv.removeAttribute('class');
        failDiv.setAttribute('class', 'show');
        setTimeout(function () {
            waitDiv.removeAttribute('class');
        }, 2000)
    };

    var downloadApp = function () {
        window.location.href = "https://form.sjtu.edu.cn/mobile/download.jsp";
    };

    var cancelAppLogin = function () {
        var waitDiv = document.getElementById('login-app-wait');
        if (waitDiv != null) {
            waitDiv.removeAttribute('class');
        }
    };

    var sub = function (isApp) {
        if (!isApp) {
            showQr();
        }
        if (!hasSub || subFailed) {
            hasSub = true;
            if (!isApp) {
                showQrMsg('正在获取二维码');
            } else {
                var flag = showTryAppLogin(5000);
            }

            loadScript("https://mc.sjtu.edu.cn/httpsClient.js", function () {
                if (window['msgCenter'] != null) {
                    subFailed = false;
                    var subObj = msgCenter.create('6bf72742-308e-4e78-b75e-b901cae1913f');
                    subObj.sub("100", "", function () {
                        window.location.href = "expresslogin?uuid=6bf72742-308e-4e78-b75e-b901cae1913f";
                        return false;
                    }, function () {
                        if (!isApp) {
                            showQrImg();
                            showQrMsg('微信扫描二维码登录');
                        } else {
                            window.location.href = 'jaccount://login?uuid=6bf72742-308e-4e78-b75e-b901cae1913f';
                        }
                    });
                }
            }, function () {
                subFailed = true;
                if (!isApp) {
                    showQrMsg('二维码获取失败');
                } else {
                    clearTimeout(flag);
                    showTryAppFailed();
                }
            });
        } else {
            if (isApp) {
                showTryAppLogin(3000);
                window.location.href = 'jaccount://login?uuid=6bf72742-308e-4e78-b75e-b901cae1913f';
            }
        }
    };

    var switchLogin = function (switchDiv) {
        var div = document.getElementById('login-qr');
        if (div != null) {
            if (switchDiv.getAttribute('class') === 'login-switch') {
                switchDiv.setAttribute('class', 'login-switch pc');
                if (window.localStorage) {
                    window.localStorage.setItem("jaccount.login.type", "qrcode");
                }
                sub(false);
            } else {
                switchDiv.setAttribute('class', 'login-switch');
                div.removeAttribute('class');
                hideQr();
                if (window.localStorage) {
                    window.localStorage.setItem("jaccount.login.type", "password");
                }
            }
        }
    };

    var submitted = false;

    var checkForm = function (button) {

        if (submitted === true) {
            return false;
        }

        var warnUl = document.getElementById("ul_warn"),
            warnDiv = document.getElementById("div_warn"),
            user = document.getElementById("user"),
            password = document.getElementById("pass"),
            captcha = document.getElementById("captcha");

        if (warnDiv != null) {
            warnDiv.setAttribute("style", "display:none");
        }

        if (user.value === '') {
            document.getElementById("li_tip_no_user").setAttribute("style", "display:block");
            document.getElementById("li_tip_no_password").setAttribute("style", "display:none");
            document.getElementById("li_tip_no_captcha").setAttribute("style", "display:none");
            warnUl.setAttribute("style", "display:block");
            user.focus();
            return false;
        }

        if (password.value === '') {
            document.getElementById("li_tip_no_user").setAttribute("style", "display:none");
            document.getElementById("li_tip_no_password").setAttribute("style", "display:block");
            document.getElementById("li_tip_no_captcha").setAttribute("style", "display:none");
            warnUl.setAttribute("style", "display:block");
            password.focus();
            return false;
        }

        if (captcha.value === '') {
            document.getElementById("li_tip_no_user").setAttribute("style", "display:none");
            document.getElementById("li_tip_no_password").setAttribute("style", "display:none");
            document.getElementById("li_tip_no_captcha").setAttribute("style", "display:block");
            warnUl.setAttribute("style", "display:block");
            captcha.focus();
            return false;
        }

        submitted = true;
        warnUl.setAttribute("style", "display:none");
        button.setAttribute("class", button.getAttribute("class") + " submitted btn-secondary");
        return true;
    };

    var appLogin = function () {
        sub(true);
        return false;
    };


</script>
<div id="login-app">
    <a class="app-link" onclick="return appLogin();" href="#" target="_self">
        <div>
            <div class="app-icon"></div>
            <div class="app-login-text">使用一门式服务快速登录</div>
        </div>
    </a>
</div>
<div id="login-form">
    <div class="login-header">
        <div class="login-title">登录jAccount</div>
        <div id="login-switch" class="login-switch" onclick="switchLogin(this);"></div>
    </div>
    <ul id="ul_warn" class="warn-info" style="display: none">
        <li id="li_tip_no_user"><span class="icon i-warn"></span>请输入您的jAccount帐号</li>
        <li id="li_tip_no_password"><span class="icon i-warn"></span>请输入您的密码</li>
        <li id="li_tip_no_captcha"><span class="icon i-warn"></span>请输入验证码</li>
    </ul>
    
    
    <form id="form-input" method="get" action="home.php">
        <input type="hidden" name="sid" value="jaxuanke091229">
        <input type="hidden" name="returl" value="COy8qQKTlAM0uVg1UFC2j2FGPZxizzqokhdD4irMvd4N8KkFUZD7vRSoIFFc5vc4attwZuaX84dU">
        <input type="hidden" name="se" value="CPGctVdJY39Um2H18WfHhj0Bu/JrokZunPHyxLwz7ZxclsPoyKNvjt0=">
        <input type="hidden" name="v" value="">
        

        <div class="input-control">
            <span class="icon i-account"></span>
            <input class="form-input" type="text" id="user" name="user" placeholder="jAccount用户名" autocomplete="off">
        </div>
        <div class="input-control">
            <span class="icon i-pass"></span>
            <input class="form-input" type="password" id="pass" name="pass" placeholder="jAccount密码" autocomplete="off">
        </div>
        <div class="input-control captcha-input">
            <span class="icon i-captcha"></span>
            <input class="form-input" type="text" id="captcha" name="captcha" placeholder="验证码" autocomplete="off">
            <img src="https://jaccount.sjtu.edu.cn/jaccount/captcha?1528723399566" alt="" onclick="this.src='captcha?'+Date.now()+Math.random()">
        </div>
        <div>
            <input type="submit" class="btn btn-primary form-submit" value="登 录" onclick="return checkForm(this)">
            
        </div>
    </form>
    
        <div id="login-action" class="action-control">
            <a onclick="alert('你已经被退学了')">忘记密码</a>
            <a onclick="alert('对不起，您的Jaccount帐号没有对应交大正式学生学号或教师工号，不能创建！')" class="pull-right">创建jAccount帐号</a>
        </div>
    
    <div id="login-qr">
        <div id="qr-img" class="code">
            <img src="https://jaccount.sjtu.edu.cn/jaccount/qrcode?uuid=274019a2-c214-4a6d-9f61-c71b87786cf8" border="0">
        </div>
        <div class="qr-tips">
            --&nbsp;<span id="qr-msg"></span>&nbsp;--
        </div>
    </div>
    <div id="login-app-wait">
        <div id="login-app-spinner">尝试切换至一门式服务</div>
        <div id="login-app-fail">切换至一门式服务失败</div>
        <div id="login-app-download">
            <div>此功能需要一门式服务<br>客户端才能使用</div>
            <div>
                <input type="button" class="btn btn-primary" value="下载客户端" onclick="downloadApp()">
                <input type="button" class="btn btn-secondary" value="取消" onclick="cancelAppLogin()">
            </div>
        </div>
    </div>
</div>

<script>

    if (window.localStorage) {
        var type = window.localStorage.getItem("jaccount.login.type");
        if (type == 'qrcode') {
            var switchDiv = document.getElementById('login-switch');
            if (switchDiv != null) {
                switchDiv.setAttribute('class', 'login-switch pc');
            }
            var form = document.getElementById('form-input');
            if (form != null) {
                form.setAttribute('class', 'hide');
            }
            var actionDiv = document.getElementById('login-action');
            if (actionDiv != null) {
                actionDiv.setAttribute('class', 'action-control hide');
            }
            if (window.getComputedStyle !== undefined) {
                if (window.getComputedStyle(form).visibility == 'hidden') {
                    sub(false);
                }
            } else {
                //ie8
                if (form.currentStyle !== undefined) {
                    if (form.currentStyle.visibility == 'hidden') {
                        sub(false);
                    }
                }
            }

        }
    }

    addEvent(window, "orientationchange", function () {
        setTimeout(function () {
            var form = document.getElementById('form-input');
            if (window.getComputedStyle !== undefined) {
                if (window.getComputedStyle(form).visibility == 'hidden') {
                    sub(false);
                }
            }
        }, 100);
    });

    

</script></div>
        </div>
    </div>
    <div id="footer">
        <div class="container">
            <div class="contact">
                联系方式： 徐汇-浩然高科技大楼4楼 62932901 闵行-图书信息楼(新图书馆西侧) 34206060<br>
                <span class="en">©2016</span> <a href="http://net.sjtu.edu.cn">上海交通大学网络信息中心</a> <a href="mailto:service@sjtu.edu.cn">service@sjtu.edu.cn</a>
                    </div>
            <a class="net" href="http://net.sjtu.edu.cn"><img src="image/ja-net.png" border="0"></a>
        </div>
    </div>
</div>

</body></html>