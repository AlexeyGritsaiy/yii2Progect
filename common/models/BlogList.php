<?php
namespace common\models;


class BlogList extends \yii\db\ActiveRecord{

    public static function tableName()
    {
        return 'advert';
    }


    public static function getAll()
    {
        $data = self::find()->all();
        return $data;
    }

}