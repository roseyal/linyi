<?php
/**
 * Created by PhpStorm.
 * User: 13058
 * Date: 2017/12/7
 * Time: 8:13
 */

namespace app\controllers;
use Codeception\Module\Redis;
use Yii;
use app\models\Member_group;
use app\models\News;
use yii\web\Controller;
use app\models\Member;
use app\models\Member_detail;
use app\models\Category_priv;
use yii\helpers\Json;

class AdminController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        $userinfo = Member::find()->select('a.nickname,a.photo,b.name')->alias('a')->innerJoin('{{%member_group}} as b','a.groupid = b.groupid')->asArray()->one();

        $this->layout='@app/views/layouts/adminmain.php';
        return $this->render('index' , [
            'data'=>$userinfo,
        ]);
    }
    public function actionContent ()
    {
        $id = Yii::$app->request->get('id');
        if($id == 1) {  //用户基本资料
            $info = Member::find()->alias('a')->select('nickname,email,regdate,lastdate,regip,lastip,mobile,b.birthday')->innerJoin('{{%member_detail}} as b','a.userid = b.userid')->asArray()->one();
        }
        if ($id == 2) {
            $info = Member::find()->select('photo,userid')->asArray()->one();
        }
        if ($id == 3) {
            $info = [];
        }
        if ($id == 4) {
            $username = Member::find()->select('`username`')->asArray()->one()['username'];
            $info = News::find()->alias('a')->select('a.`id` , a.`title` , b.`catname` , a.`inputtime` , a.`status`')->innerJoin('{{%category}} as b','a.catid = b.catid')->where("username = '$username'")->asArray()->all();
        }
        if ($id == 5) {
            $group = Member::find()->select('`groupid`,`username`')->asArray()->one();
            $allowpost = Member_group::find()->where("groupid = ".$group['groupid']."")->one();
            if($allowpost['allowpost'] == 0) {
                return '不允许投稿';
            }
            $info['data'] = Category_priv::find()->alias('a')->select('b.`catid`,b.`catname`,b.`parentid`')->innerJoin('{{%category}} as b','a.catid = b.catid')->where("roleid = ".$group['groupid']." and action = 'add'")->orderBy('catid asc')->asArray()->all();
            $info['username'] =  $group['username'];
        }

        $this->layout='@app/views/layouts/adminmain.php';
        return $this->render('content_'.$id , [
            'data'=>$info,
        ]);
    }

    public function actionDoUserinfo ()
    {
        $data = Yii::$app->request->get();
        $birthday = [
            'birthday' => $data['birthday'],
        ];
        unset($data['birthday']);
        $res = Member::updateAll($data);
        $ress = Member_detail::updateAll($birthday);
        if($res !== false && $ress !== false){
            return Json::encode('succ');
        }else{
            return Json::encode('fail');
        }
    }

    public function actionUplodphoto()
    {
        $file = $_FILES['photo'];
        $userid = $_POST['userid'];
        $dir = 'upload/'.date('Ymd',time());
        is_dir($dir) or mkdir($dir,0777,true);
        $filearr = explode('.',$file['name']);
        $fliehou = $filearr[count($filearr) - 1];
        $newfilename = time().'.'.$fliehou;
        if($file['error'] == 0){
            $upload = move_uploaded_file($file['tmp_name'],$dir.'/'.$newfilename);
            if($upload == true){
                $data = [
                    'photo' => '/'.$dir.'/'.$newfilename,
                ];
                $info = Member::updateAll($data,'userid='.$userid);
                if($info !== false) {
                    return Json::encode('succ');
                }
            }else{
                return Json::encode('fail');
            }
        }
    }

    public function actionUppass ()
    {
        $data = Yii::$app->request->post();
        $con = Member::find()->where("password = '".md5($data['oldpass'])."'")->count();
        if($con) {
            $datas = [
              'password' => md5($data['newpass']),
            ];
            $info = Member::updateAll($datas);
            if($info !== false) {
                return Json::encode('succ');
            }else {
                return Json::encode('fail');
            }
        }else {
            return Json::encode('oldpass error');
        }
    }

    public function actionAddNews()
    {
        $data = Yii::$app->request->post();
        $news = [
            'title' => $data['title'],
            'catid' => $data['catid'],
            'typeid' => 0,
            'keywords' => $data['keywords'],
            'description' => $data['description'],
            'posids' => 0,
            'listorder' => 0,
            'status' => 99,
            'sysadd' => 0,
            'islink' => 0,
            'username' => $data['username'],
            'inputtime' => time(),
            'updatetime' => time(),
        ];
        $ins = Yii::$app->db->createCommand()->insert('{{%news}}',$news)->execute();
        if($ins) {
            $insid = Yii::$app->db->getLastInsertID();
            $upurl = News::updateAll(['url'=>'/news/show?id='.$insid],'id=' . $insid);
            $newsdata = [         //要插入news_data表的数据
                'id' => $insid,
                'content' => $data['content'],
                'copyfrom' => $data['copyfrom'],
                'maxcharperpage' => 10000,
            ];
            $ins2 = Yii::$app->db->createCommand()->insert('{{%news_data}}',$newsdata)->execute();
            if($ins2 && $upurl !== false) {
                return Json::encode('succ');
            }else{
                return Json::encode('Insert Error');
            }
        }else{
            return Json::encode('Insert Error');
        }
    }

    public function actionTest ()
    {
        $redis = Yii::$app->redis;
        $redis->set('k','v');
        echo $redis->get('k');
    }
}