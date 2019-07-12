<?php

use yii\grid\GridView;
use yii\widgets\Pjax;

?>

<div class="task-index">
    <div class="box-body">
        <div class="panel panel-default">
            <?php Pjax::begin([
                'options' => [
                    'tag' => 'div',
                    'class' => 'box-body table-responsive no-padding'
                ]
            ]) ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    'id',
                    'username',
                    'email',
                    'created_at:datetime',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{delete}',
                    ],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>