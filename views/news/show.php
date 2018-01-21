<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <meta name="mobile-agent" content="format=html5;url=http://m.lynow.cn/linyi/2017/1118/5818537.html"/>
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <script src="/js/wap.js" type="text/javascript"></script>
    <title><?= $content['title']?></title>
    <link rel="icon" href="/images/favicon.ico">
    <meta name="keywords" content="临沂">
    <meta name="description" content="<?= $content['description']?>">
    <meta property="og:type" content="news"/>
    <meta property="og:description" content="<?= $content['description']?>"/>
    <meta property="og:image" content=""/>

    <meta property="og:release_date" content="<?= date('Y-m-d H:i:s',$content['inputtime'])?>"/>
    <link href="/css/cate2.css" rel="stylesheet" media="screen" type="text/css">
    <script type="text/javascript" src="/js/lypcyn.js"></script>

    <!-- 请置于所有广告位代码之前 -->
    <script src="/js/ds.js"></script>
</head>
<BODY class="content" oncontextmenu="return false" onselectstart="return false"
      ondragstart="return false" onbeforecopy="return false" oncopy=document.selection.empty() onselect=document.selection.empty()>
<script type="text/javascript">
    try {
        $(document).bind("contextmenu", function () { return false; });
        $(document).bind("selectstart", function () { return false; });
        $(document).keydown(function () { return key(arguments[0]) });
    } catch (e) { }
</script>
<div class="head">
    <div class="header w1180 clear">
        <div class="tit fl">
            <?php
            foreach($nav as $k=>$v) {
                if($k == 9) break;
                $c = $v['catname'] == '临沂' || $v['catname'] == '城事' ?'t-h' : '';
                echo "<a href=".$v['url']." class='$c' >".$v['catname']."</a>";
            }
            ?>

        </div>
        <div class="tit-r fr">
            <a href="/news/about?cat=29"  class="tit-jr">加入我们</a>
            <a onclick="AddFavorite(window.location,document.title)" href="javascript:void(0)" class="tit-sq">书签收藏</a>
        </div>
    </div>
</div>
<!--header-->
<div class="logo_top">
    <a href="/" title="今日临沂网"><img src="/images/c_logo_1.png" ></a>
</div>
<!--top_logo-->
<div class="nav-wrap">
    <div class="nav1 w1180">
        <ul class="nav">
            <li><a href="/">首页</a><i></i></li>
            <?php
            foreach($nav as $k=>$v) {
                if($k == 9) break;
                $c = $v['catname'] == '临沂' || $v['catname'] == '娱乐' ?'navhot' : '';
                echo "<li><a href=".$v['url']."  class='$c'>".$v['catname']."</a><i></i></li>";
            }
            ?>
            

        </ul>
        <div class="ks ks-btn ks123">

        </div>
    </div>
</div>
<!--navwrap-->
<div id="content">
    <div class="clear mb40">
        <div class="w1180">
            <div class="crumbs">
                <ul class="clear"><i></i>
                    <a href="http://www.lynow.cn">首页 </a><span> &gt; </span><?= $mian?>
                </ul>
            </div><!--面包屑导航-->
            <div class="biao">
                <h1 class="t4Btit"><?= $content['title']?></h1>
            </div>
            <div class="w1180 art-guide  c-title">
                <p class="fl">来源：<a rel="nofollow" title="<?= $content['username']?>" href="http://www.lynow.cn/" ><?= $content['username']?></a>&nbsp;&nbsp;编辑：<?= $content['username']?> &nbsp;&nbsp;时间：<?= date('Y-m-d H:i:s',$content['inputtime'])?> </p>
                <div class="fr share-i">
                    <div data-bd-bind="1431498273755" class="share_to bdsharebuttonbox bdshare-button-style0-16 fl">
                        <span><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a></span>
                        <span><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a></span>
                        <span><a href="#" class="bds_more" data-cmd="more"></a></span>
                        <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--内容头部标题-->
    <div class="w1180">
        <div class="w760 fl">
            <div id="icontent">
                <?= $content['content']?>
            </div>
            <div class="bdgg"><script>ad1()</script></div>
            <div class="d_page mb20">
            </div>

            <div class="w760 mb20 cag-right bordernone">
                <div class="title w760 tent-title"><i></i><h3>相关<span>推荐</span></h3></div>
                <div class="w760 border listone">
                    <?php
                        $p = 0;
                        foreach ($data as $k=>$v){
                            if($p == 3) break;
                            $c = $k < 2 ? 'fl' : 'fr';
                            echo "
                                <dl class='$c'>
                        <dt><a href=".$v['url']." title=".$v['title']."><img src=".$v['thumb']." alt='' width='225' height='150'></a></dt>
                        <dd><h3 class='htitle'><a href=".$v['url']." title=".$v['title'].">".$v['title']."</a></h3></dd>
                    </dl>
                            ";
                            $p++;
                        }
                    ?>

                    
                </div>
            </div>
            <div class="bdgg"><script>ad2()</script></div>
            <!--end相关推荐-->
            <div class="w760 cag-right mb20">
                <div class="title w760 tent-title"><i></i><h3>大家<span>都爱看</span></h3></div>
                <div class="w760 listtwo mb20">
                    <?php
                        for($i = $p ;$i<count($data) ; $i++) {
                            if($p == 13) break;
                            echo "
                            
                            <dl>
                                <dt class='fl w225'><a href=".$data[$i]['url']." title=".$data[$i]['title']."><img src=".$data[$i]['thumb']." alt='' width='225' height='150'></a></dt>
                                <dd class='fr w515'>
                                    <h5 class='f22'><a href=".$data[$i]['url']." title=".$data[$i]['title'].">".$data[$i]['title']."</a></h5>
                                    <a href=".$data[$i]['url']." title=".$data[$i]['title']."><p>".$data[$i]['description']."<a class='more'>更多</a></p></a>
                                    <span><i>".date('Y-m-d H:i:s',$data[$i]['inputtime'])."</i></span>
                                </dd>
                            </dl>
                            ";
                            $p++;
                        }
                    ?>
                    


                    <div class="bdgg"><script>ad7()</script></div>
                </div>

                <div class="backHome_mod w760"><a href="/" >今日临沂网</a><a href="/news/linyi"  class="backHome-noFirst" >返回临沂</a></div>

            </div>
            <!--end大家都爱看-->
        </div>
        <!--content-left-->
        <div class="w360 fr">
            <div class="bdgg"><script>ad4()</script></div>
            <div class="w360 paihang tentpai mb20">
                <div class="r_title clearfix">
                    <div class="right_title_border fl"></div>
                    <div class="right_title_border fr"></div>
                    <div class="right_title_main"><span>编辑推荐</span></div>
                </div>
                <ul>

                    <?php
                    for($i = $p ;$i<count($data) ; $i++) {
                        if($p == 23) break;
                        echo "
                            <li><a href=".$data[$i]['url']." title=".$data[$i]['title'].">那些".$data[$i]['title']."</a></li>
                            ";
                        $p++;
                    }
                    ?>
                </ul>
            </div><!--end编辑推荐-->
            <div class="bdgg"><script>ad5()</script></div>
            <div class="w360 tentre mb20">
                <div class="r_title clearfix">
                    <div class="right_title_border fl"></div>
                    <div class="right_title_border fr"></div>
                    <div class="right_title_main"><span>精彩图赏</span></div>
                </div>
                <div class="w360 star-list clearfix">

                    <?php
                    $c = 0;
                        foreach ($data as $k=>$v) {
                            if($c == 4) break;
                            if($v['catid'] == 17){
                                echo "
                                <dl class='fl'><a href=".$v['url'].">
                                    <dt><img src=".$v['thumb']."></dt>
                                    <dd>".$v['title']."</dd>
                                </a></dl>
                                ";
                                $c++;
                            }
                        }
                    ?>
                    

                </div>
            </div><!--end精彩图赏-->
            <div class="w360 tentre mb20">
                <div class="r_title clearfix">
                    <div class="right_title_border fl"></div>
                    <div class="right_title_border fr"></div>
                    <div class="right_title_main"><span>临沂独家</span></div>
                </div>
                <div class="w360 clearfix">


                    <?php
                    $c = 0;
                    foreach ($data as $k=>$v) {
                        if($c == 5) break;
                        if($v['catid'] == 16){
                            echo "
                                 <dl>
                                    <dt class='fr'><a href=".$v['url']." title=".$v['title']."><img src=".$v['thumb']." alt=".$v['title']." width='110' height='74'></a></dt>
                                    <dd class='fl'><a  href=".$v['url']." title=".$v['title'].">".$v['title']."</a></dd>
                                </dl>
                                ";
                            $c++;
                        }
                    }
                    ?>

                   

                </div>
            </div><!--end临沂独家-->
            <script>ad6()</script>
        </div>
        <!--content-right-->
    </div>
    <!--w1180-1-end-->
</div> <!--id=content-->
<!--// Footer Begin-->
<div class="footerwrap">
    <div class="w1180">
        <div class="fwx fl"></div>
        <div class="footer w955 fr">
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
</div>
<!--// End Footer -->
<div class="piao" style="bottom: 50px; display: block;">
    <ul>
        <li class="icon icon_home"><a href="http://www.lynow.cn" ></a></li>

        <li class="cur"><a href="/news/linyi?cat=17" >美女</a></li>
        <li><a href="/news/linyi" >临沂</a></li>
        <li><a href="/news/yule" >娱乐</a></li>
        <li data-bd-bind="1431498273755" class="icon icon_share share_to bdsharebuttonbox bdshare-button-style0-16">
            <a href="#" class="bds_more" data-cmd="more"><em></em><b class="code"><small></small></b></a>
            <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
            </script>
        </li>

        <li class="icon icon_returntop"><a href="#"><em></em></a></li>
    </ul>
</div>
<script src="/js/jquery.js" type="text/javascript"></script>
<script src="/js/show.js" type="text/javascript"></script>
<script src="/js/nav.js" type="text/javascript"></script>
<script src="/js/common.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript">
    //加入收藏
    function AddFavorite(sURL, sTitle) {
        sURL = encodeURI(sURL);
        try{
            window.external.addFavorite(sURL, sTitle);
        }catch(e) {
            try{
                window.sidebar.addPanel(sTitle, sURL, "");
            }catch (e) {
                alert("加入收藏失败，请使用Ctrl+D进行添加,或手动在浏览器里进行设置.");
            }
        }
    }
</script>
<script>
    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
</script>
<!--<script>-->
<!--    (function(){-->
<!--        var src = document.location.protocol +'//js.passport.qihucdn.com/11.0.1.js?fb2f197b1d9ab32d3d98970cc2e16c0c';-->
<!--        document.write('<script src="' + src + '" id="sozz"><\/script>');-->
<!--    })();-->
<!--</script>-->
</body></html>