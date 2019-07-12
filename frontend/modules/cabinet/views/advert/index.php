<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Search\AdvertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Менеджер объявлений';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advert-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'price',
            'address',
            'bedroom',
            'hot',
            'sold',
            'type',
            'recommend',
            'created_at:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a('Создать Объявление', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
