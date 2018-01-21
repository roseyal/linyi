<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset=utf8>
    <title>今日临沂-关注临沂人身边的新鲜事 临沂生活资讯新闻门户</title>
    <meta name="keywords" content="今日临沂,临沂最新消息,临沂大小事,临沂新闻头条,关注临沂">
    <meta name="description" content="今日临沂秉承传播临沂的办站理念,励志打造成临沂具有一定影响力的综合地方门户网">
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <meta name='viewport' content='width=device-width,minimum-scale=1,maximum-scale=1,user-scalable=no' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="mobile-agent" content="format=html5;url=http://m.lynow.cn"/>
    <link rel="stylesheet" type="text/css" href="/css/swiper.min.css" >
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <link rel="icon" href="/images/favicon.ico">
    <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/js/koala.min.1.5.js"></script>
    <script type="text/javascript" src="/js/lypc.js"></script>
    <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/js/lypc.js"></script>
    <script type="text/javascript" src="/js/wap.js" ></script>
    <script type="text/javascript">uaredirect("http://m.lynow.cn");</script>
    <script>

        var _hmt = _hmt || [];

        (function() {

            var hm = document.createElement("script");

            hm.src = "//hm.baidu.com/hm.js?dfb9d1279a0a89dc627f61ae7ae9f2f7";

            var s = document.getElementsByTagName("script")[0];

            s.parentNode.insertBefore(hm, s);

        })();

    </script>

</head>

<body>

<div class="top mb20">
    <div class="w1024">
        <a href="/"  class="top-logo fl"></a>
        <ul class="nav fr">

            <?php
            $cat = isset($_GET['cat']) ? $_GET['cat'] : $this->context->action->id;
            if($cat == 'index'){
                echo "<li class='cur'><a href='/?r=news/index'>首页</a></li>";
            }else{
                echo "<li class=''><a href='/?r=news/index'>首页</a></li>";
            }
            foreach($this->params['nav'] as $v) {
                $cur = $cat == $v['catid'] ? 'cur' : $cat == $v['catdir'] ? 'cur' : '';
                echo "<li class='$cur' ><a href=".$v['url']." >".$v['catname']."</a></li>";
            }
            ?>

        </ul>
                    <li><a href="/user/index" style="color: #000">发布</a></li>
    </div>
</div>
<!--top end-->

        <?= $content ?>


<div class="f-link">

    <div class="w1024">

        <h3>友情链接</h3>

        <p>
            <?php
            foreach ($this->params['flink'] as $v){
                echo "<a href=".$v['url']." target='_blank'>".$v['catname']."</a>|";
            }
            ?>
        </p>
    </div>

</div>

<!--友情链接-->

<div class="footerwrap">
    <div class="footer w1024">
        <p>
            <?php
            foreach ($this->params['about'] as $v) {
                echo "
                <a href=".$v['url'].">".$v['catname']."</a>
                ";
            }
            ?>
            
            </p>
        <p>今日临沂-关注<a href="">临沂</a>人身边的新鲜事 临沂生活资讯新闻门户</p>
        <div class="bei" style=" width:230px; margin:0 auto; padding:5px 10px; height: auto; height: 20px;color: #fff">
            <img src="/images/beiico.png" width="20" height="20" class="fl" style="margin-right:5px;">
            <span class="fl">京公网安备37130202371693号</span></div>
    </div>
</div>


</body>

</html>