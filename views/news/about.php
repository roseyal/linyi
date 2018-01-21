
<!doctype html>
<html>
<head>
    <meta charset="gb2312">
    <meta name="applicable-device" content="pc">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <title>加入我们 - 今日临沂-关注临沂人身边的新鲜事 临沂生活资讯新闻门户</title>

    <meta name="keywords" content="加入我们">
    <meta name="description" content="今日临沂秉承传播临沂的办站理念,励志打造成临沂具有一定影响力的综合地方门户网">
    <link rel="icon" href="/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/css/index.css">
</head>
<body>
<div class="top mb20">
    <div class="w1024">
        <a href="/" class="top-logo fl"></a>
        <ul class="nav fr">
            <li class="cur"><a href="/" >首页</a></li>
            <?php
            foreach($nav as $k=>$v) {
                if($k == 9) break;
                echo "<li><a href=".$v['url']." >".$v['catname']."</a></li>";
            }
            ?>
        </ul>
    </div>
</div>
<style>
    #menu{width:1170px; overflow:hidden; margin:0 auto; font-size:16px;}
    #menu #about-nav { font-weight:bold;display:block;width:285px;padding:0;margin:0;list-style:none; float:left;}
    #menu #about-nav li a{width:285px; color:#333; height:100px; line-height:100px; background:#ebebeb; margin-bottom:2px;display:block;text-align:center;}
    #menu #about-nav li a:hover{  background:#D12B2E;color:#fff; font-size:18px; text-decoration:none;}
    #menu_con{ width:870px; border:1px solid #dbdbdb; float:right; text-align:left; padding-bottom:40px}
    .tag{ display:none;overflow:hidden;}
    .selected{background:#254282; color:#fff;}
    #menu_con .tag h2{ border-bottom:1px solid #dbdbdb; height:60px; line-height:60px;font-size:24px;}
    #menu_con .tag h2 span{ border-bottom:1px solid #D12B2E; height:60px; line-height:60px; display:block; width:100px; text-align:center; color:#D12B2E;  font-weight:normal; padding:0 20px}
    .menu_con_ul{ padding:20px 40px; overflow:hidden;}
    .menu_con_ul p{ text-indent:2em; margin-bottom:15px; line-height:200%}
</style>
<div class="content mb25">
    <div class="content_home">

        <!--代码部分begin-->
        <div id="menu">
            <!--tag标题-->
            <ul id="about-nav">
                <?php
                foreach($about as $k=>$v) {
                    echo "<li><a href=".$v['url']." >".$v['catname']."</a></li>";
                }
                ?>

            </ul>
            <!--二级菜单-->
            <div id="menu_con">
                <div class="tag" style="display:block">

                    <h2><span><?= $content['title']?></span></h2>
                    <div class="menu_con_ul">
                        <?= $content['content']?>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function(){
                $(".tag:first").show();
                $("#about-nav li").click(function(){
                    num=$(this).index();
                    $(this).addClass("selected").siblings("li").removeClass("selected");
                    $(".tag").eq(num).show().siblings(".tag").hide();
                })
            })
        </script>


        <!--联系代码结束-->

    </div>
    <!--content-home-->
</div>
<!--content-->

<div class="footerwrap">
    <div class="footer">
        <p>
            <?php
            foreach ($about as $v) {
                echo "
                <a href=".$v['url'].">".$v['catname']."</a>
                ";
            }
            ?>
        </p>
        <p>今日临沂-关注临沂人身边的新鲜事 临沂生活资讯新闻门户</p>
    </div>
</div>
<!--底部-->
</div>
<!--wrap-->
</body>
</html>
