<?php
    $action = $this->context->action->id;
?>
<!--top end-->
<div class="w1024 mb20">
    <div class="w675 fl">
        <div class="w675 banner mb20">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php
                        foreach($banner as $k=>$v){
                            echo "
                            <div class='swiper-slide'>
                            <a href=".$v['url']." ><img src=".$v['thumb']." alt=".$v['title']." /></a>
                            <div class='tyt'>
                                <h2><a href=".$v['url']." >".$v['title']."</a></h2>
                            </div></div>
                            ";
                        }
                    ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <!--焦点图-->
        <div class="w675">
            <div class="mod-con-list w400 fr">
                <?php
                    foreach ($news as $k=>$v){
                        if($k == 15) break;
                        if($k%5 == 0){
                            echo "
                            <div class='mod-con'>
                    <h3 class='text1 f18 mb10'><a href=".$v['url'].">".$v['title']."</a></h3>
                    <ul class='ulist'>
                            ";
                        }else{
                            echo "
                                 <li><a href=".$v['url'].">".$v['title']."</a></li>
                            ";
                        }
                        if($k%5 == 4){
                            echo "</ul></div>";
                        }
                    }
                ?>

            </div>
            <!--mod-con-list-->
            <div class="section fl w240">
                <ul class="clearfix w240">
                    <?php
                    $i = 0;
                    foreach ($news as $k=>$v){
                        if($i == 3) break;
                        if($v['thumb']){
                            echo "
                                <li>
                                    <div class='photo'><a href=".$v['url']."><img src=".$v['thumb']." width='240' height='130'/></a></div>
                                    <div class='text'><a href=".$v['url']."><h3>".$v['title']."</h3></a></div>
                                </li>
                            ";
                            $i++;
                        }
                    }
                    ?>
                    


                </ul>
            </div>
            <!---->
        </div>
        <!--探索栏目左侧列表--->
        <script type="text/javascript">
            $(document).ready(function(){
                $(".section	 ul li").hover(function(){
                    $(this).find(".text").stop().animate({left:'0'}, {duration: 500})
                },function(){
                    $(this).find(".text").stop().animate({left:'240'}, {duration: "fast"})
                    $(this).find(".text").animate({left:'-240'}, {duration: 0})
                });
            });
        </script>
    </div>
    <!--探索栏目第一栏左侧-->
    <div class="w300 fr">
        <div class="w300 bb5 pb20 mb40">
            <div class="right_title clearfix pb20">
                <div class="right_title_border fl"></div>
                <div class="right_title_border fr"></div>
                <?php

                    if($action == 'linyi'){
                        echo "<div class='right_title_main'>临沂<span>独家</span></div>";
                    }else if($action == 'yule'){
                        echo "<div class='right_title_main'>娱乐<span>看点</span></div>";
                    }
                ?>

            </div>

            <?php
            $i = count($news);
            $c = 0;
            while($i--){
                if($c == 1) break;
                if($news[$i]['thumb']) {
                    echo "
                         <div class='section_right_top_tent'>
                            <a href=".$v['url']." target='_blank'><img src=".$v['thumb']." width='300' height='180'></a>
                            <h2><a href=".$v['url']." target='_blank'>".$v['title']."</a></h2>
                            <p>".$v['description']."</p>
                         </div>";
                    $c++;
                }
            }
            ?>
            
        </div>
        <!--右侧独家-->
        <div class="w300 bb5">
            <div class="right_title clearfix pb20">
                <div class="right_title_border fl"></div>
                <div class="right_title_border fr"></div>
                <?php
                if($action == 'linyi'){
                    echo "<div class='right_title_main'>时光<span>临沂</span></div>";
                }else if($action == 'yule'){
                    echo "<div class='right_title_main'>娱乐<span>专刊</span></div>";
                }
                ?>

            </div>
            <ul class="block_img w300">
                <?php
                $i = count($news);
                $c = 0;
                while($i--){
                    if($c == 4) break;
                    if($news[$i]['thumb']) {
                            echo "
                                <li><a href=".$news[$i]['url']."><h2>".$news[$i]['title']."</h2><img src=".$news[$i]['thumb']."></a></li>
                            ";
                            $c++;
                        }
                    }
                ?>
                

            </ul>
        </div>
        <!--右侧原创-->
    </div>
    <!--探索栏目第一栏右侧-->
</div>
<!--探索栏目第一栏-->
<div class="w1024">
    <?php
    if($action == 'linyi'){
        echo "<div class='block-title w1024 mb20'><i></i><a href='/news/linyi?cat=7'  title='城事'>城事</a></div>";
    }else if($action == 'yule'){
        echo "<div class='block-title w1024 mb20'><i></i><a href='/news/yule?cat=11'  title='明星'>明星</a></div>";
    }
    ?>
    
    <div class="w1024">
        <div class="w675 fl">


            <?php
                $cat = $action == 'linyi' ? 7 : 11;
                $p = 0;
                foreach($news as $k=>$v) {
                    if($p == 4 ) break;
                    if($v['catid'] == $cat){
                        if($v['thumb']) {
                            echo "
                            <div class='amuse_list w675'>
                                <dl>
                                    <dt class='w240 fl'><a href=".$v['url']." title=".$v['title']."><img src=".$v['thumb']." alt=".$v['title']."></a></dt>
                                    <dd class='w400 fr'>
                                        <h2><a href=".$v['url']." title=".$v['title'].">".$v['title']."</a></h2>
                                        <p>".$v['description']."</p>
                                    </dd>
                                </dl>
                            </div>
                            ";
                            $p++;
                        }
                    }
                }
            ?>
            

        </div>
        <!--历史栏目左侧-->
        <div class="w300 fr">
            <div class="w300 bb5">
                <div class="right_title clearfix pb20">
                    <div class="right_title_border fl"></div>
                    <div class="right_title_border fr"></div>
                    <?php
                    if($action == 'linyi'){
                        echo "<div class='right_title_main'>城事聚焦</div>";
                    }else if($action == 'yule'){
                        echo "<div class='right_title_main'>八卦天地</div>";
                    }
                    ?>
                </div>

                <?php
                $i = count($news);
                $cat = $action == 'linyi' ? 7 : 11;
                while ($i--){
                    if($p == 9) break;
                    if($news[$i]['catid'] == $cat){
                        if($news[$i]['thumb'] && $p == 4){
                            echo "
                            <dl class='w300 dl-list mb20'>
                    <dt><a href=".$news[$i]['url']."><img src=".$news[$i]['thumb']."></a></dt>
                    <dd><span>城事头条</span><h2><a href=".$news[$i]['url'].">".$news[$i]['title']."</a></h2></dd>
                </dl>
                <ul class='block_img w300'>
                            ";
                            $p++;
                        }else if($news[$i]['thumb']) {
                            echo "
                            <li><a href=".$news[$i]['url']."><h2>".$news[$i]['title']."</h2><img src=".$news[$i]['thumb']."></a></li>
                            ";
                            $p++;
                        }else if($p == 9){
                            echo "</ul>";
                        }
                    }
                }
                ?>

            </div>
            <!--历史探索-->
        </div>
        <!--历史栏目右侧-->
    </div>
    <div class="w1024 re-more">
        <div class="re-more_border fl"></div>
        <div class="re-more_border fr"></div>
        <?php
        if($action == 'linyi'){
            echo "<div class='re-more_main'><a href='/news/linyi?cat=7'>浏览更多城事资讯</a></div>";
        }else if($action == 'yule'){
            echo "<div class='re-more_main'><a href='/news/yule?cat=11'>浏览更多明星资讯</a></div>";
        }
        ?>
        
    </div>
</div>
<!--历史模块- end-->
<div class="w1024">
    <?php
        if($action == 'linyi'){
            echo "<div class='block-title w1024 mb20'><i></i><a href='/news/linyi?cat=8'  title='品味'>品味</a></div>";
        }else if($action == 'yule'){
            echo "<div class='block-title w1024 mb20'><i></i><a href='/news/yule?cat=12'  title='电视剧'>电视剧</a></div>";
        }
    ?>
    <div class="w1024">
        <div class="w675 fl">
            <?php
            $cat = $action == 'linyi' ? 8 : 12 ;
            $p = 0;
            foreach($news as $k=>$v) {
                if($p == 4 ) break;
                if($v['catid'] == $cat){
                    if($v['thumb']) {
                        echo "
                            <div class='amuse_list w675'>
                                <dl>
                                    <dt class='w240 fl'><a href=".$v['url']." title=".$v['title']."><img src=".$v['thumb']." alt=".$v['title']."></a></dt>
                                    <dd class='w400 fr'>
                                        <h2><a href=".$v['url']." title=".$v['title'].">".$v['title']."</a></h2>
                                        <p>".$v['description']."</p>
                                    </dd>
                                </dl>
                            </div>
                            ";
                        $p++;
                    }
                }
            }
            ?>


        </div>
        <!--奇闻栏目左侧-->
        <div class="w300 fr">
            <div class="w300 bb5">
                <div class="right_title clearfix pb20">
                    <div class="right_title_border fl"></div>
                    <div class="right_title_border fr"></div>
                    <?php
                    if($action == 'linyi'){
                        echo "<div class='right_title_main'><span>品味精品</span></div>";
                    }else if($action == 'yule'){
                        echo "<div class='right_title_main'><span>抢先剧透</span></div>";
                    }
                    ?>
                    
                </div>

                <?php
                $i = count($news);
                $cat = $action == 'linyi' ? 8 : 12;
                while ($i--){
                    if($p == 9) break;
                    if($news[$i]['catid'] == $cat){
                        if($news[$i]['thumb'] && $p == 4){
                            echo "
                            <dl class='w300 dl-list mb20'>
                    <dt><a href=".$news[$i]['url']."><img src=".$news[$i]['thumb']."></a></dt>
                    <dd><h2><a href=".$news[$i]['url'].">".$news[$i]['title']."</a></h2></dd>
                </dl>
                <ul class='block_img w300'>
                            ";
                            $p++;
                        }else if($news[$i]['thumb']) {
                            echo "
                            <li><a href=".$news[$i]['url']."><h2>".$news[$i]['title']."</h2><img src=".$news[$i]['thumb']."></a></li>
                            ";
                            $p++;
                        }else if($p == 9){
                            echo "</ul>";
                        }
                    }
                }
                ?>



            </div>
            <!--奇闻轶事-->
        </div>
        <!--奇闻栏目右侧-->
    </div>
    <div class="w1024 re-more">
        <div class="re-more_border fl"></div>
        <div class="re-more_border fr"></div>
        <?php
            if($action == 'linyi'){
                echo "<div class='re-more_main'><a href='/news/linyi?cat=8'>浏览更多品味资讯</a></div>";
            }else if($action == 'yule'){
                echo "<div class='re-more_main'><a href='/news/yule?cat=12'>浏览更多电视资讯</a></div>";
            }
        ?>
    </div>
</div>
<!--奇闻模块- end-->

<div class="w1024">
    <?php
    if($action == 'linyi'){
        echo "<div class='block-title w1024 mb20'><i></i><a href='/news/linyi?cat=9' target='_blank' title='口碑'>口碑</a></div>";
    }else if($action == 'yule'){
        echo "<div class='block-title w1024 mb20'><i></i><a href='/news/yule?cat=12' target='_blank' title='综艺'>综艺</a></div>";
    }
    ?>

    <div class="w1024">
        <div class="w675 fl">
            <?php
            $p = 0;
            $cat = $action == 'linyi' ? 9 : 13;
            foreach($news as $k=>$v) {
                if($p == 4 ) break;
                if($v['catid'] == $cat){
                    if($v['thumb']) {
                        echo "
                            <div class='amuse_list w675'>
                                <dl>
                                    <dt class='w240 fl'><a href=".$v['url']." title=".$v['title']."><img src=".$v['thumb']." alt=".$v['title']."></a></dt>
                                    <dd class='w400 fr'>
                                        <h2><a href=".$v['url']." title=".$v['title'].">".$v['title']."</a></h2>
                                        <p>".$v['description']."</p>
                                    </dd>
                                </dl>
                            </div>
                            ";
                        $p++;
                    }
                }
            }
            ?>
        </div>
        <!--文化栏目左侧-->
        <div class="w300 fr">
            <div class="w300 bb5">
                <div class="right_title clearfix pb20">
                    <div class="right_title_border fl"></div>
                    <div class="right_title_border fr"></div>
                    <?php
                    if($action == 'linyi'){
                        echo "<div class='right_title_main'><span>口碑排行</span></div>";
                    }else if($action == 'yule'){
                        echo "<div class='right_title_main'><span>综艺大观</span></div>";
                    }
                    ?>
                    
                </div>
                <?php
                $i = count($news);
                $cat = $action == 'linyi' ? 9 : 13 ;
                while ($i--){
                    if($p == 9) break;
                    if($news[$i]['catid'] == $cat){
                        if($news[$i]['thumb'] && $p == 4){
                            echo "
                            <dl class='w300 dl-list mb20'>
                    <dt><a href=".$news[$i]['url']."><img src=".$news[$i]['thumb']."></a></dt>
                    <dd><h2><a href=".$news[$i]['url'].">".$news[$i]['title']."</a></h2></dd>
                </dl>
                <ul class='block_img w300'>
                            ";
                            $p++;
                        }else if($news[$i]['thumb']) {
                            echo "
                            <li><a href=".$news[$i]['url']."><h2>".$news[$i]['title']."</h2><img src=".$news[$i]['thumb']."></a></li>
                            ";
                            $p++;
                        }else if($p == 9){
                            echo "</ul>";
                        }
                    }
                }
                ?>
            </div>
            <!--文化揭秘-->
        </div>
        <!--文化栏目右侧-->
    </div>
    <div class="w1024 re-more">
        <div class="re-more_border fl"></div>
        <div class="re-more_border fr"></div>
        <?php
        if($action == 'linyi'){
            echo "<div class='re-more_main'><a href='/news/linyi?cat=9'>浏览更多口碑资讯</a></div>";
        }else if($action == 'yule'){
            echo "<div class='re-more_main'><a href='/news/yule?cat=13'>浏览更多综艺资讯</a></div>";
        }
        ?>

    </div>
</div>



<div class="w1024" style="<?php if($action =='linyi') echo 'display:none'?>" >
        <div class='block-title w1024 mb20'><i></i><a href='/news/yule?cat=12' target='_blank' title='综艺'>电影</a></div>


    <div class="w1024">
        <div class="w675 fl">
            <?php
            $p = 0;
            foreach($news as $k=>$v) {
                if($p == 4 ) break;
                if($v['catid'] == 14){
                    if($v['thumb']) {
                        echo "
                            <div class='amuse_list w675'>
                                <dl>
                                    <dt class='w240 fl'><a href=".$v['url']." title=".$v['title']."><img src=".$v['thumb']." alt=".$v['title']."></a></dt>
                                    <dd class='w400 fr'>
                                        <h2><a href=".$v['url']." title=".$v['title'].">".$v['title']."</a></h2>
                                        <p>".$v['description']."</p>
                                    </dd>
                                </dl>
                            </div>
                            ";
                        $p++;
                    }
                }
            }
            ?>
        </div>
        <!--文化栏目左侧-->
        <div class="w300 fr">
            <div class="w300 bb5">
                <div class="right_title clearfix pb20">
                    <div class="right_title_border fl"></div>
                    <div class="right_title_border fr"></div>
                    <div class='right_title_main'><span>影评天地</span></div>;
                </div>
                <?php
                $i = count($news);
                while ($i--){
                    if($p == 9) break;
                    if($news[$i]['catid'] == 14){
                        if($news[$i]['thumb'] && $p == 4){
                            echo "
                            <dl class='w300 dl-list mb20'>
                    <dt><a href=".$news[$i]['url']."><img src=".$news[$i]['thumb']."></a></dt>
                    <dd><h2><a href=".$news[$i]['url'].">".$news[$i]['title']."</a></h2></dd>
                </dl>
                <ul class='block_img w300'>
                            ";
                            $p++;
                        }else if($news[$i]['thumb']) {
                            echo "
                            <li><a href=".$news[$i]['url']."><h2>".$news[$i]['title']."</h2><img src=".$news[$i]['thumb']."></a></li>
                            ";
                            $p++;
                        }else if($p == 9){
                            echo "</ul>";
                        }
                    }
                }
                ?>
            </div>
            <!--文化揭秘-->
        </div>
        <!--文化栏目右侧-->
    </div>
    <div class="w1024 re-more">
        <div class="re-more_border fl"></div>
        <div class="re-more_border fr"></div>
        <div class='re-more_main'><a href='/news/linyi?cat=14'>浏览更多电影资讯</a></div>

    </div>
</div>

<!--文化模块- end-->
<script src="js/swiper.min.js"></script>
<script>
    var swiper = new Swiper('.banner .swiper-container', {
        pagination: '.banner .swiper-pagination',
        nextButton: '.banner .swiper-button-next',
        prevButton: '.banner .swiper-button-prev',
        slidesPerView: 1,
        paginationClickable: true,
        spaceBetween: 30,
        loop: true
    });
</script>