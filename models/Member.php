<?php
/**
 * Created by PhpStorm.
 * User: 13058
 * Date: 2017/12/7
 * Time: 10:19
 */

namespace app\models;
use yii\db\ActiveRecord;
use app\models\Member_group;
class Member extends ActiveRecord
{
    public function getMember_group()
    {
        return $this->hasOne(  Member_group::className(),['groupid'=>'groupid']);
    }
}