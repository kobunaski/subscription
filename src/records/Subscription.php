<?php

namespace kobu\subscription\records;

use yii\db\ActiveRecord;

class Subscription extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%subscriptions}}';
    }
}
