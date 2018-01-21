<?php
/**
 * Created by PhpStorm.
 * User: 13058
 * Date: 2017/11/30
 * Time: 16:25
 */

namespace app\models;


use yii\db\ActiveRecord;

class News_data extends ActiveRecord
{
    public static function primaryKey(){
        return ['id'];
    }

}