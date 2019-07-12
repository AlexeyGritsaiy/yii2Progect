<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Advert */
$this->title = "id Вашего объявления : ";
$this->title .= $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Adverts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="advert-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'price',
            'address',
            'fk_agent',
            'bedroom',
            'livingroom',
            'parking',
            'kitchen',
            'general_image',
            'description:ntext',
            'location',
            'hot',
            'sold',
            'type',
            'recommend',
            'created_at:date',
            'updated_at:date',
        ],
    ]) ?>
    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить объявление?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
