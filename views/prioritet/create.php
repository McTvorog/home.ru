<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Prioritet $model */

$this->title = 'Create Prioritet';
$this->params['breadcrumbs'][] = ['label' => 'Prioritets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prioritet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
