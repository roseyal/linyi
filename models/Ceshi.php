<?php
namespace app\models;

use yii\db\ActiveRecord;

class Ceshi extends ActiveRecord{
	public static function tableName(){
		return "{{%ceshi}}";
	}
}
?>