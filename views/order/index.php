<?php

use app\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if(!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin())
        {
           echo Html::a('Создать заявку', ['create'], ['class' => 'btn btn-success']);
        }

        ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'datatime_start',
            'equipment',
            'type_id',
            //'description:ntext',
            //'orderstatus_id',
            //'responsible_id',
            //'datatime_end',
            //'comment:ntext',
            //'prioritet_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Order $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                'visibleButtons' =>[
                        'delete' => function ($model, $key, $index) {
                            return Yii::$app->user->identity->isAdmin();
                        }
                ]
            ],
        ],
    ]); ?>


</div>
