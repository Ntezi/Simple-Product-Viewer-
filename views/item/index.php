<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Item'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'price',
            'manufacturing_date',
//            'status',
            //'created_at',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a(Yii::t('app', 'View'), $url, [
                            'class' => 'btn btn-info',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a(Yii::t('app', 'Edit'), $url, [
                            'class' => 'btn btn-primary',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(Yii::t('app', 'Delete'), $url, [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => Yii::t('app', '\'Are you sure you want to delete this item?'),
                            ],
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
