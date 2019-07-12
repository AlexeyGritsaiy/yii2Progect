<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Advert */

$this->title = 'Редактировать Объявление: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Adverts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="advert-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
