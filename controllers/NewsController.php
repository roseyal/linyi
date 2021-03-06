<?php
/**
 * Created by PhpStorm.
 * User: 13058
 * Date: 2017/11/29
 * Time: 11:24
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\News;
use app\models\Category;
use app\models\News_data;
class NewsController extends Controller
{
    public $nav = [];
    public $flink = [];
    public $about = [];
   public function init()
   {
       parent::init(); // TODO: Change the autogenerated stub
            $nav = Category::find('catname,url,parentid,catid,arrchlidid')->where('ismenu = 1')->orderBy('catid asc')->all();
            $this->nav = $nav;
            $catid = 18;
            $flink = Category::find('catname,url,parentid')->where("parentid = $catid")->all();
           $this->flink = $flink;
           $about = Category::find('catname,url,parentid')->where("parentid = 24")->all();
           $this->about = $about;
   }
   public function actionRess(){
    header("Content-type: text/html; charset=utf-8");
    $list=News::find()->all();
    $redis=Yii::$app->redis();
    foreach($list as $key->$v){
        $redis->hmset('linyi:'.$v['catid'],
                      'catid',$v['catid'],
                      'siteid',$v['siteid'],
                      'module',$v['module'],
                      'type',$v['type'],
                      'modelid',$v['modelid'],
                      'parentid',$v['parentid'],
                      'arrparentid',$v['arrparentid']
            );
    }
   }
    public  function actionIndex()
    {
        //导航
        $nav = $this->nav;


        //最新资讯
        $parentid = '';     //查找临沂下的栏目
        for($i=0 ; $i<count($nav) ;$i++) {
            if ($nav[$i]['catid'] == 6) {
                $parentid = $nav[$i]['arrchildid'];
            }
        }
        $news = News::find('title,thumb,description,url,catid')->where("catid in ( $parentid)")->all();

        //banner图
        $posid = 18;
        $banners = News::find('a.data,b.url')->alias('b')->innerJoin('{{%position_data}} as a','a.listorder = b.id')->where("posid = $posid")->all();
        $banner= [];
        foreach($banners as $model){
            $banner[]=$model->attributes;
        }
        //独家新闻
        $catid = 16;
        $selfnews = News::find('title,thumb,description,url')->where("catid = $catid")->offset('0')->limit("4")->all();

        //娱乐
        $parentid = '';     //查找娱乐下的栏目
        for($i=0 ; $i<count($nav) ;$i++) {
            if ($nav[$i]['catid'] == 10) {
                $parentid = $nav[$i]['arrchildid'];
            }
        }

        $plays = News::find('title,thumb,description,url,catid ')->where("catid in ( $parentid )")->all();


        //图集
        $catid = 17;
        $photos = News::find('title,thumb,description,url,catid ')->where("catid = $catid")->all();

        //友情链接
        $flink = $this->flink;

        //关于我们
        $about = $this->about;

        $this->view->params['nav'] = $nav;      //向main.php 中传值
        $this->view->params['flink'] = $flink;      //向main.php 中传值
        $this->view->params['about'] = $about;      //向main.php 中传值

        return $this->render('index',['nav'=>$nav,'news'=>$news,'banner'=>$banner,'selfnews'=>$selfnews,'plays'=>$plays,'photos'=>$photos,'flink'=>$flink,'about'=>$about]);
    }



    public function actionLinyi(){
        $nav = $this->nav;
        $flink = $this->flink;
       $cat = isset($_GET['cat']) ? $_GET['cat'] : false;
       $page = isset($_GET['p']) ? $_GET['p'] : 1;
        if(!$cat){
            $parentid = '';     //查找临沂下所有的栏目
            for($i=0 ; $i<count($nav) ;$i++) {
                if ($nav[$i]['catid'] == 6) {
                    $parentid = $nav[$i]['arrchildid'];
                }
            }
            $news = News::find('title,thumb,description,url,catid ')->where(" catid in ( $parentid )")->all();

            //查找banner图片
            $posid = 19;

            $banners = News::find('a.data,b.url')->alias('b')->innerJoin('{{%position_data}} as a','a.listorder = b.id')->where("posid = $posid")->all();
            $banner= [];
            foreach($banners as $model){
                $banner[]=$model->attributes;
            }


            //关于我们
            $about = $this->about;

            $this->view->params['nav'] = $nav;      //向main.php 中传值
            $this->view->params['flink'] = $flink;      //向main.php 中传值
            $this->view->params['about'] = $about;      //向main.php 中传值
            return $this->render('linyi',['news'=>$news,'banner'=>$banner,'about'=>$about]);

        }else{
            $news = News::find('title,thumb,description,url,catid ')->where("catid  = $cat");   //所有新闻
            $car = News::find('title,thumb,description,url,catid ')->where("catid  = 16")->offset('0')->limit('5')->all();   //车新闻

            $pages = new Pagination(['totalCount' =>$news->count(),
                'pageSize' => '15',
//                'route' => false,
                'pageSizeParam' => false,
            ]);    //创建分页对象
            $model = $news->offset($pages->offset)->limit($pages->limit)->all();
            $mian = '';
            for($i=0 ; $i<count($nav) ; $i++){
                if($nav[$i]['catid'] == $cat){
                    for ($j=0 ; $j<count($nav) ; $j++){
                        if($nav[$j]['catid'] == $nav[$i]['parentid']) {
                            $mian .= "<a href=".$nav[$j]['url'].">".$nav[$j]['catname']."</a> >  <a href=".$nav[$i]['url'].">".$nav[$i]['catname']."</a>";
                        }
                    }
                }
            }

            //关于我们
            $about = $this->about;

            $this->view->params['nav'] = $nav;      //向main.php 中传值
            $this->view->params['flink'] = $flink;      //向main.php 中传值
            $this->view->params['about'] = $about;      //向main.php 中传值
            return $this->render('linyicategory',['news'=>$model,'car'=>$car,'pages'=>$pages,'mian'=>$mian,'about'=>$about]);
        }
    }


    public function actionYule(){
        $nav = $this->nav;
        $flink = $this->flink;
        $cat = isset($_GET['cat']) ? $_GET['cat'] : false;
        if(!$cat){
            $parentid = '';     //查找临沂下所有的栏目
            for($i=0 ; $i<count($nav) ;$i++) {
                if ($nav[$i]['catid'] == 10) {
                    $parentid = $nav[$i]['arrchildid'];
                }
            }


            $news = News::find('title,thumb,description,url,catid ')->where(" catid in ( $parentid )")->all();

            //查找banner图片
            $posid = 20;

            $banners = News::find('a.data,b.url')->alias('b')->innerJoin('{{%position_data}} as a','a.listorder = b.id')->where("posid = $posid")->all();
            $banner= [];
            foreach($banners as $model){
                $banner[]=$model->attributes;
            }
            //关于我们
            $about = $this->about;

            $this->view->params['nav'] = $nav;      //向main.php 中传值
            $this->view->params['flink'] = $flink;      //向main.php 中传值
            $this->view->params['about'] = $about;      //向main.php 中传值
            return $this->render('linyi',['news'=>$news,'banner'=>$banner,'about'=>$about]);

        }else{
            $news = News::find('title,thumb,description,url,catid ')->where("catid  = $cat");   //所有新闻

            $car = News::find('title,thumb,description,url,catid ')->where("catid  = 16")->offset('0')->limit('5')->all();   //车新闻

            $pages = new Pagination(['totalCount' =>$news->count(),
                'pageSize' => '15',
//                'route' => false,
                'pageSizeParam' => false,
            ]);    //创建分页对象
            $model = $news->offset($pages->offset)->limit($pages->limit)->all();
            $mian = '';
            for($i=0 ; $i<count($nav) ; $i++){
                if($nav[$i]['catid'] == $cat){
                    for ($j=0 ; $j<count($nav) ; $j++){
                        if($nav[$j]['catid'] == $nav[$i]['parentid']) {
                            $mian .= "<a href=".$nav[$j]['url'].">".$nav[$j]['catname']."</a> >  <a href=".$nav[$i]['url'].">".$nav[$i]['catname']."</a>";
                        }
                    }
                }
            }

            //关于我们
            $about = $this->about;
            $this->view->params['nav'] = $nav;      //向main.php 中传值
            $this->view->params['flink'] = $flink;      //向main.php 中传值
            $this->view->params['about'] = $about;      //向main.php 中传值
            return $this->render('linyicategory',['news'=>$model,'car'=>$car,'pages'=>$pages,'mian'=>$mian,'about'=>$about]);
        }

    }



    public function actionShow(){
        $id = $_GET['id'];
        $nav = $this->nav;
        $flink = $this->flink;
        $result = Yii::$app->db->createCommand("select a.title,a.catid,a.thumb,a.keywords,a.description,a.url,a.username,a.inputtime,b.content from {{%news}} as a inner join {{%news_data}} as b on a.id = b.id where a.id = $id")->queryOne();

        $cat = $result['catid'];
        $mian = '';
        for($i=0 ; $i<count($nav) ; $i++){
            if($nav[$i]['catid'] == $cat){
                for ($j=0 ; $j<count($nav) ; $j++){
                    if($nav[$j]['catid'] == $nav[$i]['parentid']) {
                        $mian .= "<a href=".$nav[$j]['url'].">".$nav[$j]['catname']."</a> >  <a href=".$nav[$i]['url'].">".$nav[$i]['catname']."</a> > ".$result['title'];
                    }
                }
            }
        }
        //相关推荐
        $data = News::find()->orderBy(['rand()' => ''])->all();

        //关于我们
        $about = $this->about;

        $this->layout='@app/views/layouts/main1.php';
        return $this->render('show',['content'=>$result,'nav'=>$nav,'flink'=>$flink,'data'=>$data,'mian'=>$mian,'about'=>$about]);
    }

    public function actionAbout()
    {
        $cat = $_GET['cat'];
        $nav = $this->nav;
        $about = $this->about;
        $this->view->params['nav'] = $nav;      //向main.php 中传值
        $this->view->params['about'] = $about;      //向main.php 中传值
        $this->layout='@app/views/layouts/main1.php';
        $result = Yii::$app->db->createCommand("select * from {{%page}} where catid = $cat")->queryOne();
        return $this->render('about',['nav'=>$nav,'about'=>$about,'content'=>$result]);
    }

}

