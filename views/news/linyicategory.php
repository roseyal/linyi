<?php
use yii\widgets\LinkPager;
?>
<style>
    .f-link{display: none}
</style>

<div class="sub-wrap mb20" style="margin-top: -20px">
    <div class="w1024">
        <div class="list-dw"><a href="/">今日临沂</a><span> &gt; </span><?= $mian?></div>
    </div>
</div>
<!--sub-wrap-->
<div class="w1024 content">
    <div class="w675 fl">
        <ul class="w675 aikan-list mb40">

            <?php
                foreach ($news as $v){
                    if($v['thumb']) {
                        echo "
                        <li><a href=".$v['url']." >
                            <img src=".$v['thumb'].">
                            <div class='fr tent'>
                                <h2>".$v['title']."</h2>
                                <p>".$v['description']."</p>
                            </div>
                        </a></li>
                        ";
                    }else{
                        echo "
                        <li class='imgnone'><a href=".$v['url'].">
                            <div class='fr tent'>
                                <h2>".$v['title']."</h2>
                                <p>".$v['description']."</p>
                            </div>
                        </a></li>
                        ";
                    }
                }
            ?>
            

            

            
        </ul>


        <div class="linle-pag0 mb20">
            <div class="linle-page123">
            <?=
        LinkPager::widget([
            'pagination' => $pages,
            'nextPageLabel' => '下一页',
            'prevPageLabel' => '上一页',
            'options'=>['class'=>'linle-page123'],

        ]);
        ?>
            </div>
        </div>

        <!--分页-->
    </div>
    <!--list_left-->
    <div class="w300 fr">
        <div class="mb20"><script>list_ad1();</script></div>


        <!--广告位-->
        <div class="w300 mb20">
            <div class="right_title clearfix pb20">
                <div class="right_title_border fl"></div>
                <div class="right_title_border fr"></div>
                <div class="right_title_main"><span>编辑推荐</span></div>
            </div>
            <div class="w300 bjtj">

                <?php
                    $i = count($news);
                    $c = 0;
                    $flag = true;
                    while($i--){
                        if($c == 8) break;
                        if($news[$i]['thumb'] && $flag) {
                        echo "
                        <dl class='mb10'>
                        <dt><a href=".$news[$i]['url']." ><img src=".$news[$i]['thumb']."></a></dt>
                        <dd><a href=".$news[$i]['url']." >".$news[$i]['title']."</a></dd>
                    </dl>
                    <ul>";
                        $c++;
                        $flag = false;
                        }else{
                            echo "<li><a href=".$news[$i]['url'].">".$news[$i]['title']."</a></li>";
                            $c++;
                        }
                        if($c == 8){
                            echo "</ul>";
                        }
                    }
                ?>

            </div>
        </div>
        <!--编辑推荐-->

        <div class="mb20"><script>list_ad2();</script></div>

        <!--广告位-->

        <div class="w300 mb20">
            <div class="right_title clearfix pb20">
                <div class="right_title_border fl"></div>
                <div class="right_title_border fr"></div>
                <div class="right_title_main"><span>精彩图赏</span></div>
            </div>
            <div class="w300 star-list">

                <?php
                $i = count($news);
                $c = 0;
                while($i--){
                    if($c == 4) break;
                    if($news[$i]['thumb']) {
                        echo "
                        <dl><a href=".$news[$i]['url'].">
                        <dt><img src=".$news[$i]['thumb']."></dt>
                        <dd>".$news[$i]['title']."</dd>
                    </a></dl>
                        ";
                        $c++;
                    }
                }

                ?>
                
                
            </div>
        </div>
        <!--明星风尚-->
        <div class="mb20"><script>list_ad3();</script></div>
        <div class="w300 mb20">
            <div class="right_title clearfix pb20">
                <div class="right_title_border fl"></div>
                <div class="right_title_border fr"></div>
                <div class="right_title_main"><span>临沂独家</span></div>
            </div>
            <ul class="block_img w300">
                <?php
                    foreach($car as $v) {
                        echo "
                         <li><a href=".$v['url']."><h2>".$v['title']."</h2><img src=".$v['thumb']."></a></li>
                        ";
                    }
                ?>

            </ul>
        </div>
        <!--右侧原创-->
        <div class="mb20"><script>list_ad4();</script></div>

    </div>
    <!--list_right-->
</div>
<style>
    .linle-page123{float: none;}
    .linle-page123 .active a{background-color:#dcdcdc}
</style>
