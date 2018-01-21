<?php  
  
namespace app\models;  
  
use Yii;  
  
use yii\captcha\Captcha;  
  
class User8 extends \yii\db\ActiveRecord  
  
{  
  
    public $verifyCode;  
  
    public static function tableName()  
  
    {  
  
        return 'user8';  
  
    }  
  
    public function rules()  
  
    {  
  
        return [  
  
            [['username', 'password'], 'string', 'max' => 255],  
  
            ['verifyCode', 'captcha','message'=>'验证码错误']  
  
        ];  
  
    }  
  
}  
  
  