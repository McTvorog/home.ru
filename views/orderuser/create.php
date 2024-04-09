<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Orderuser $model */

$this->title = 'Create Orderuser';
$this->params['breadcrumbs'][] = ['label' => 'Orderusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderuser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
