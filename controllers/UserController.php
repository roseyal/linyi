<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\ProForm;
use app\models\RegForm;
use app\models\Ceshi;
use app\models\Category;

class UserController extends Controller{
	public $layout = false;
	public function init(){
    $this->enableCsrfValidation = false;
	}
	public function actionIndex(){
		return $this->render('index');
	}
	public function actionMy_info(){
		//$model=new ProForm;
		// $admin=new Ceshi;       
		// $admin->username =111;
		// if($admin->save() > 0){echo"添加成功"; }else{echo"添加失败"; }
		return $this->render('my_info');
	}
	public function actionDo_add(){
		//$model=new RegForm;
		$info=Yii::$app->request->post();
		 // echo"<pre>";
		 // var_dump($info);exit;
		$info=Yii::$app->db->createCommand()->insert('ly_ceshi',$info['Pro'])->execute();
		if($info!==false){
			echo "aaa";
		}
	}
	public function actionAddnews(){
		$cate=Category::find()->all();
		return $this->render('addnews',['cate'=>$cate]);
	}
	public function actionNews_add(){
		$info=Yii::$app->request->post();
		// unset($info['_csrf']);
		//    echo"<pre>";
		//     print_r($info);exit;
		$info=Yii::$app->db->createCommand()->insert('ly_ceshi',$info['Pro'])->execute();
		if($info!==false)
		{
			echo "提交成功";
		}
	}
	public function actionGrade_integration(){
		return $this->render('grade_integration');
	}
	public function actionIdentity_prove(){
		return $this->render('identity_prove');
	}
	public function actionInbox(){
		return $this->render('inbox');
	}
	public function actionIntegration_record(){
		return $this->render('integration_record');
	}
	public function actionIntegration_rule(){
		return $this->render('integration_rule');
	}
	public function actionMake_head(){
		return $this->render('make_head');
	}
	public function actions(){
	        	return [
	            	'error' => [
	                	'class' => 'yii\web\ErrorAction',
	            	],
	            	'captcha' => [
	                	'class' => 'yii\captcha\CaptchaAction',
	                			'maxLength'=>4,
	                			'minLength'=>4,
	            	],
	        	];
	}
	public function actionMake_password(){ 
		$model=new ProForm;
		if ($model->load(Yii::$app->request->post()) && $model->validate()){
            	return $this->refresh();
        	}
        	return $this->render('make_password',[
            	'model'=>$model,
        	]);
	}
	public function actionMessages(){
		return $this->render('messages');
	}
	public function actionMy_account(){
		return $this->render('my_account');
	}
	public function actionOutbox(){
		return $this->render('outbox');
	}
	public function actionProject_manage(){
		return $this->render('project_manage');
	}
}
?>