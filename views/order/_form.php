<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Order $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'datatime_start')->textInput() ?>

    <?= $form->field($model, 'equipment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Type::find()
        ->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'orderstatus_id')->textInput() ?>

    <?= $form->field($model, 'responsible_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\User::find()
        ->all(), 'id', 'fio')) ?>

    <?= $form->field($model, 'datatime_end')->textInput() ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'prioritet_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
