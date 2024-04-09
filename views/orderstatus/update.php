<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Orderstatus $model */

$this->title = 'Update Orderstatus: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orderstatuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orderstatus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
