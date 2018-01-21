<?php
/**
 * Created by PhpStorm.
 * User: 13058
 * Date: 2017/12/7
 * Time: 10:21
 */

namespace app\models;
use app\models\Member;

use yii\db\ActiveRecord;

class Member_group extends ActiveRecord
{
    public function getMember()
    {
        return $this->hasOne(  Member::className(),['groupid'=>'groupid']);
    }
}