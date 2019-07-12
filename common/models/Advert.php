<?php

namespace common\models;

use frontend\components\Common;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "advert".
 *
 * @property integer $id
 * @property integer $price
 * @property string $address
 * @property integer $fk_agent_detail
 * @property integer $bedroom
 * @property integer $livingroom
 * @property integer $parking
 * @property integer $kitchen
 * @property string $general_image
 * @property string $description
 * @property string $location
 * @property integer $hot
 * @property integer $sold
 * @property string $type
 * @property integer $recommend
 * @property integer $created_at
 * @property integer $updated_at
 * @property int $fk_agent [mediumint(11)]
 */
class Advert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advert';
    }

    /**
     * @inheritdoc
     * @return AdvertQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdvertQuery(get_called_class());
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['step2'] = ['general_image'];

        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price'], 'required'],
            [
                [
                    'price',
                    'fk_agent',
                    'bedroom',
                    'livingroom',
                    'parking',
                    'kitchen',
                    'hot',
                    'sold',
                    'type',
                    'recommend'
                ],
                'integer'
            ],
            [['description'], 'string'],
            [['address'], 'string', 'max' => 255],
            [['location'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id объявления',
            'price' => 'Цена',
            'address' => 'Адресс',
            'fk_agent' => 'Agent Detail',
            'bedroom' => 'Спальных комнат',
            'livingroom' => 'Гостинная',
            'parking' => 'Парковочных мест',
            'kitchen' => 'Кухонь',
            'general_image' => 'Главное изображение',
            'description' => 'Описание',
            'location' => 'Место расположения',
            'hot' => 'Горячее предложение',
            'sold' => 'Продано',
            'type' => 'Тип',
            'recommend' => 'Рекомендовано',
            'created_at' => 'Созданно',
            'updated_at' => 'Обновленно',
        ];
    }

    public function getTitle()
    {
        return Common::getTitleAdvert($this);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'fk_agent']);
    }

    public function afterValidate()
    {
        parent::afterValidate();
        $this->fk_agent = $this->fk_agent ?? Yii::$app->user->identity->id;

    }
}
