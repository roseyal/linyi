<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 2017/11/27
 * Time: 15:39
 */
namespace app\models;

use yii\base\Model;

class RegForm extends Model
{
    public $username;
    public $password;
    public $email;
    public function rules()
    {
        return [
             [['username','password'],'required'],

             ['email','email']
        ];
    }
}