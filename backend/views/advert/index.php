
<div class="task-index">
    <div class="box-body">
        <div class="panel panel-default">
            <div class="box-body table-responsive no-padding">
                <?= \yii\grid\GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'id',
                        [
                            'label' => 'Title',
                            'value' => 'title'

                        ],
                        'user.email',
                        'price',
                        'created_at:datetime',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view}  {delete}',
                            'buttons'=>[
                                'view'=>function ($url, $model, $key) {
                                    return \yii\helpers\Html::a("<span class=\"glyphicon glyphicon-eye-open\"></span>", Yii::$app->params['baseUrl']."/view-advert/".$key,['target' => '_blank']);
                                }
                            ],
                        ],
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>