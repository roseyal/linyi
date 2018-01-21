

<div class="w1024 block mb20">

    <div class="w360 fl">

        <div class="new fl w360">

            <div class="m-title"><h2 class="sty-red"><strong>最新</strong><i>·&nbsp;资讯</i></h2></div>

            <ul class="globalHot">
                <?php
                for($i=0 ; $i<3 ; $i++) {
                    echo "
                        <li class='dotLineBot'>
                            <h2><a href=".$news[$i]['url']." title=".$news[$i]['title']." >".$news[$i]['title']."</a></h2>
                            <p>".$news[$i]['description']."</p>
                        </li>
                    ";
                }
                ?>

            </ul>

        </div>

        <!--最新资讯/首页头条-->

        <div class="w360 fl">
                <?php
                for($i=0 ; $i<15 ;$i++) {
                        if($i%5 == 0) {
                            echo "
                               <div class='mod-con'>
                                <h3 class='text1 f18 mb10'><a href=".$news[$i+3]['url']." >".$news[$i+3]['title']."</a></h3>
                                <ul class='ulist'>
                            ";
                        }else{
                            echo "
                                <li>
                                    <a href=".$news[$i+3]['url']." title=".$news[$i+3]['title']." >".$news[$i]['title']."</a>
                                </li>
                            ";
                        }
                        if($i%5 == 4 && $i != 14 ) {
                            echo " </ul></div>";
                        }
                }
                ?>
            </div>

            <div class="more"><a href="/news/linyi"><img src="images/img-12.gif" width="383" height="18" border="0" alt="今日临沂更多精彩"></a></div>

        </div>

        <!--首页小头条-->



    </div>

    <!--模块1左侧end-->

    <div class="w630 fr">

        <!-- 模块1焦点图代码开始 -->

        <div id="fsD1" class="focus mb20">

            <div id="D1pic1" class="fPic">
                <?php
                    foreach ($banner as $v){
                        echo "
                      <div class='fcon' style='display: none;'>
                           <a  href=".$v['url']."><img src=".$v['thumb']." style='opacity: 1;'></a>
                          <span class='shadow'>
                            <a  href=".$v['url'].">".$v['title']."</a>
                          </span>
                      </div>
                    ";
                    }
                ?>

            </div>

            <div class="fbg">

                <div class="D1fBt" id="D1fBt">
                    <?php
                        foreach($banner as $k=>$v){
                            echo "<a href='javascript:void(0)' hidefocus='true' target='_self' class=''><i>".$k."</i></a>";
                        }
                    ?>


                </div>

            </div>

            <span class="prev"></span>

            <span class="next"></span>

        </div>

        <script type="text/javascript">

            Qfast.add('widgets', { path: "http://www.lynow.cn/statics/newly/terminator2.2.min.js", type: "js", requires: ['fx'] });

            Qfast(false, 'widgets', function () {

                K.tabs({

                    id: 'fsD1',   //焦点图包裹id

                    conId: "D1pic1",  //** 大图域包裹id

                    tabId:"D1fBt",

                    tabTn:"a",

                    conCn: '.fcon', //** 大图域配置class

                    auto: 1,   //自动播放 1或0

                    effect: 'fade',   //效果配置

                    eType: 'click', //** 鼠标事件

                    pageBt:true,//是否有按钮切换页码

                    bns: ['.prev', '.next'],//** 前后按钮配置class

                    interval: 3000  //** 停顿时间

                })

            })

        </script>

        <!-- banner代码结束 -->



        <div class="630">

            <div class="focus-list fl w240">

                <?php
                    $k = 0;
                    foreach($news as $v) {      //如果没有图片结束掉本次循环
                        if($v['thumb'] == null){
                            continue;
                        }
                        echo "
                           <dl>
                               <dt><a href=".$v['url']." ><img src=".$v['thumb']." title=".$v['title']."></a></dt>
                               <dd><a href=".$v['url']." >".$v['title']."</a></dd>
                           </dl>
                        ";
                        $k++;
                        if($k == 3){        //读取三条数据
                            break;
                        }
                    }
                ?>



            </div>

            <!--模块1小幻灯-->

            <div class="w360 fr">

                <div class="m-title dujia-title"><h2 class="sty-red"><strong>临沂</strong><i></i></h2></div>

                <div class="w360">



                    <?php
                        foreach ($selfnews as $v) {
                            echo "
                            <div class='news-title title'>

                        <span><i class='dj'>独家</i><a href=".$v['url']." >".$v['title']."</a></span>

                        <div class='clearfloat'></div>

                        <div class='zy zy_fk_dj'>".$v['description']."...</div>

                    </div>
                            ";
                        }
                    ?>






                </div>

            </div>

            <!--临沂独家-->

        </div>

        <!--模块1右侧下方-->

    </div>

    <!--模块1右侧end-->

</div>

<!--模块1end-->

<div class="w1024 yule mb20">

    <div class="column-title-home mb20">

        <div class="column-title-border">

            <h2><a href="/news/linyi/">临沂</a><span class="cname">LINYI</span></h2>

            <div class="sub-class">
                <?php
                    foreach ($nav as $v) {
                        if($v['parentid'] == 6) {
                            echo "<a href=".$v['url']." >".$v['catname']."</a>";
                        }
                    }
                ?>
            </div>

            <span class="more"><a href="/news/linyi/"  >更多</a></span>

        </div>

    </div>

    <!--标题-->

    <div class="w1024">

        <div class="w360 fl amuse-focus">

            <div class="m-title tansuo-title"><h2 class="sty-red"><strong>城</strong><i></i></h2></div>

            <?php
                $flag = true;
                $i = 0;
                foreach ($news as $k=>$v) {
                    if($i==3) break;        // $i控制 读三条数据
                    if($v['catid'] == 7){   //城事模块
                        if(!$v['thumb'] && $flag){  //第一条数据如果没有图片 结束掉本次循环
                            continue;
                        }
                        if($v['thumb'] && $flag){   //发现图片 输入  $flag设置为false  $i++;
                            echo "
                                <dl class='mb20'>
                                <dt><a href=".$v['url']." ><img src=".$v['thumb']." title=".$v['title']."></a></dt>
                                <dd><a href=".$v['url']." >".$v['title']."</a></dd>
                                </dl>
                            ";
                            $flag = false;
                            $i++;
                        }else{      //上面条件不成立 执行下面
                            echo "
                            <div class='news-title title'>
                                <span><a href=".$v['url']." >".$v['title']."</a></span>
                                <div class='clearfloat'></div>
                                <div class='zy zy_fk_dj'>".$v['description']."</div>
                            </div>
                            ";
                            $i++;
                        }
                    }
                }
            ?>





        </div>

        <!--城事儿-->

        <div class="w630 fr">

            <div class="qiwen w630 mb20">

                <div class="yishi-title m-title"><h2 class="sty-red"><strong>品</strong><i></i></h2></div>

                <ul>

                    <?php
                        $i = 0;
                        foreach ($news as $k=>$v) {
                            if($i == 2){
                                break;
                            }
                            if($v['catid'] == 8) {
                                echo "
                                    <li>
                                        <h2><a href=".$v['url']." >".$v['title']."</a></h2>
                                        <p>".$v['description']."</p>
                                    </li>
                                ";
                                $i++;
                            }
                        }
                    ?>

                </ul>

            </div>

            <!--品味儿-->

            <div class="qiwen wenhua w630">

                <div class="jiemi-title m-title"><h2 class="sty-red"><strong>口</strong><i></i></h2></div>

                <ul>

                    <?php
                    $i = 0;
                    foreach ($news as $k=>$v) {
                        if($i == 2){
                            break;
                        }
                        if($v['catid'] == 9) {
                            echo "
                                    <li>
                                        <h2><a href=".$v['url']." >".$v['title']."</a></h2>
                                        <p>".$v['description']."</p>
                                    </li>
                                ";
                            $i++;
                        }
                    }
                    ?>

                </ul>

            </div>

            <!--口碑儿-->

        </div>

        <!--临沂内容右侧-->

    </div>

    <!--临沂内容-->

</div>

<!--临沂模块结束-->

<div class="w1024 yule mb20">

    <div class="column-title-home mb20">

        <div class="column-title-border">

            <h2><a href="/news/yule"  >娱乐</a><span class="cname">AMUSE</span></h2>

            <div class="sub-class">
                <?php
                foreach ($nav as $v) {
                    if($v['parentid'] == 10) {
                        echo "<a href=".$v['url']." >".$v['catname']."</a>";
                    }
                }
                ?>

            </div>

            <span class="more"><a href="/news/yule/"  >更多</a></span>

        </div>

    </div>

    <!--标题-->

    <div class="w1024">

        <div class="w360 fl amuse-focus">
            <?php
                $i = 0;
                $flag = true;
                foreach ($plays as $k=>$v){
                    if(!$v['thumb'] && $flag || $i == 4) break;
                    if($v['thumb'] && $flag){
                        echo "
                            <dl class='mb20'>
                                <dt><a href=".$v['url']." ><img src=".$v['thumb']." title=".$v['title']."></a></dt>
                
                                <dd><a href=".$v['url']." >".$v['title']."</a></dd>
                            </dl>
                        ";
                        $flag = false;
                        $i++;
                    }else{
                        echo "
                        <div class='news-title title'>
                            <span><a href=".$v['url']." >".$v['title']."</a></span>
                            <div class='clearfloat'></div>
                            <div class='zy zy_fk_dj'>".$v['description']."</div>
                        </div>
                        ";
                        $i++;
                    }
                }
            ?>



        </div>

        <!--娱乐内容左侧-->

        <div class="w630 fr">

            <?php
            $key = $i;
            $f = 0;
            for ($i = $key ; $i<count($plays) ; $i++){
                if($f == 4) break;
                if($plays[$i]['thumb']){
                    echo "
                    <div class='amuse_list w630'>
                        <dl>
                            <dt class='w240 fl'><a href=".$plays[$i]['url']."  title=".$plays[$i]['title']."><img src=".$plays[$i]['thumb']." alt=".$plays[$i]['title']."></a></dt>
                            <dd class='w360 fr'>
                                <h2><a href=".$plays[$i]['url']."  title=".$plays[$i]['title'].">".$plays[$i]['title']."</a></h2>
                            </dd>
                        </dl>
                    </div>
                    ";
                    $f++;
                }
            }
            ?>





        </div>

        <!--娱乐内容右侧-->

    </div>

    <!--娱乐内容-->

</div>

<!--娱乐模块结束-->

<div class="w1024">

    <div class="w1024 tushang-title m-title mb20"><h2 class="sty-red"><strong>精彩</strong><i></i></h2></div>

    <div class="w1024 tuji mb20">

        <div class="section w1024">

            <ul class="clearfix w290 fl">

                <?php
                    $p = 0; //控制显示条数
                    for($i=$p ; $i<count($photos) ; $i++){
                        if($p == 2) break;
                        echo "
                        <li>
                            <div class='photo'><a href=".$photos[$i]['url']." ><img src=".$photos[$i]['thumb']." width='290'  height='155'/></a></div>
                            <div class='text'><a href=".$photos[$i]['url']." ><h3>".$photos[$i]['title']."</h3></a></div>
                        </li>
                        ";
                        $p++;
                    }
                ?>

            </ul>

            <ul class="clearfix w730 fr">

                <?php
                for($i=$p ; $i<count($photos) ; $i++){
                    if($p == 5) break;
                    $mr5 = $p == 4 ? '' : 'mr5';    //最后一个需要减去的class
                    echo "
                        <li  class='fl $mr5'>
                            <div class='photo'><a href=".$photos[$i]['url']." ><img src=".$photos[$i]['thumb']." width='240'  height='315'/></a></div>
                            <div class='text'><a href=".$photos[$i]['url']." ><h3>".$photos[$i]['title']."</h3></a></div>
                        </li>
                        ";
                    $p++;
                }
                ?>

            </ul>

        </div>

        <div class="section w1024 mb20">

            <ul class="clearfix w730 fl">
                <?php
                for($i=$p ; $i<count($photos) ; $i++){
                    if($p == 8) break;
                    $mr5 = $p == 7 ? '' : 'mr5';    //最后一个需要减去的class
                    echo "
                        <li  class='fl $mr5'>
                            <div class='photo'><a href=".$photos[$i]['url']." ><img src=".$photos[$i]['thumb']." width='240'  height='315'/></a></div>
                            <div class='text'><a href=".$photos[$i]['url']." ><h3>".$photos[$i]['title']."</h3></a></div>
                        </li>
                        ";
                    $p++;
                }
                ?>

            </ul>

            <ul class="clearfix w290 fr">


                <?php
                for($i=$p ; $i<count($photos) ; $i++){
                    if($p == 10) break;
                    echo "
                        <li>
                            <div class='photo'><a href=".$photos[$i]['url']." ><img src=".$photos[$i]['thumb']." width='290'  height='155'/></a></div>
                            <div class='text'><a href=".$photos[$i]['url']." ><h3>".$photos[$i]['title']."</h3></a></div>
                        </li>
                        ";
                    $p++;
                }
                ?>


            </ul>

        </div>

    </div>

</div>

<!--图集模块-->

<script type="text/javascript">

    $(document).ready(function(){

        $(".section	 ul li").hover(function(){

            $(this).find(".text").stop().animate({left:'0'}, {duration: 500})

        },function(){

            $(this).find(".text").stop().animate({left:'290'}, {duration: "fast"})

            $(this).find(".text").animate({left:'-290'}, {duration: 0})

        });



    });

</script>




