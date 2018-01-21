<!DOCTYPE html>

<html lang="zh-CN">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="revised" content="Ningxia Seasons, 2015/8/13/" />

    <!-- 定义页面的最新版本 -->

    <meta name="description" content="网站简介" />

    <!-- 网站简介 -->

    <meta name="keywords" content="搜索关键字，以半角英文逗号隔开" />

    <!-- 搜索关键字 -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>个人中心</title>
    <link href="/user/css/crowdfunding.css" rel="stylesheet">



</head>

<body>

<!-- top + banner 开始 -->

<div class="container-fluid cfh_top">

    <div class="container"> 首页&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;官方咨询电话：110


    </div>

</div>


<!-- top + banner 结束 -->

<!-- 核心 开始 -->

<div class="container border1 nopadding margin10">

    <div id="vertical_navigation" class="col-lg-3 background831312 nopadding" style="padding-bottom: 80px; height: 1050px;">

        <div class="dead_pic"><img src="<?= $data['photo']?>"><br>

            <span class="username"><?= $data['nickname']?></span></div>

        <div class="usertype">用户类型： <?= $data['name']?></div>

        <div class="menu">

            <div class="menu_title"> 我的信息 </div>

            <div class="menu_list">

                <ul class="list-unstyled">

                    <li id="listClick1" class="menu_list_on" onClick="listClick(1)"><img src="/user/images/left_icon_1.png"> 基本信息</li>

                    <li id="listClick2" class="" onClick="listClick(2)"> <img src="/user/images/left_icon_2.png"> 修改头像</li>

                    <li id="listClick4" class="" onClick="listClick(4)"> <img src="/user/images/left_icon_3.png"> 修改密码</li>


                </ul>

            </div>

        </div>

        <div class="menu">

            <div class="menu_title"> 我的发布 </div>

            <div class="menu_list">

                <ul class="list-unstyled">

                    <li id="listClick6" class="" onClick="listClick(6)"><img src="/user/images/left_icon_6.png"> 新闻管理</li>
                    <li id="listClick19" class="" onClick="listClick(19)"><img src="/user/images/left_icon_6.png"> 新闻发布</li>

                </ul>

            </div>

        </div>


    </div>

    <div class="col-lg-9">

        <iframe name="left" id="crowdfunding_iframe" src="content?id=1" frameborder="false" scrolling="no" style="border:none;" width="100%" height="1045" allowtransparency="true"></iframe>

    </div>

</div>

<!-- 核心 结束 -->



<!-- 版权 开始 -->

<div class="container-fluid cfh_bottom">

    <div class="container">

        <div class="cfh_bottom_qsss">

            <dl>

                <dt>第一阶段</dt>

                <dd><a href="" >C语言程序设计</a></dd>

                <dd><a href="" >Java通识</a></dd>

                <dd><a href="" >C++进阶宝典</a></dd>

                <dd><a href="" >Swift入门与实践</a></dd>

            </dl>

        </div>

        <div class="cfh_bottom_aboutours">

            <dl>

                    <dt>第二阶段</dt>

                <dd><a href="" >教你怎么不生气</a></dd>

                <dd><a href="" >佛经</a></dd>

                <dd><a href="" >老子</a></dd>

                <dd><a href="" >沉默的愤怒</a></dd>


            </dl>

        </div>

        <div class="cfh_bottom_callme">

            <dl>
                <dt>第三阶段</dt>

                <dd><a href="" >颈椎病康复指南</a></dd>

                <dd><a href="" >腰椎间盘突出日常护理</a></dd>

                <dd><a href="" >心脏病的预防与防治</a></dd>

                <dd><a href="" >高血压降压宝典</a></dd>

            </dl>

        </div>



    </div>

    <div class="box50"></div>

</div>

<div class="container-fluid background_color545454">

    <div class="container text-center"> © 2015 gky All rights reserved | 不知道什么公司的有限公司 | 鲁ICP备10000001号 </div>

</div>

<!-- 版权 结束 -->



<!-- 结束 -->

</body>

</html>