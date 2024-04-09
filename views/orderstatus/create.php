<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Orderstatus $model */

$this->title = 'Create Orderstatus';
$this->params['breadcrumbs'][] = ['label' => 'Orderstatuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderstatus-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
