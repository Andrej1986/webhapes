<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AnOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="an-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'town') ?>

    <?= $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'street_no') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'company') ?>

    <?php // echo $form->field($model, 'zip') ?>

    <?php // echo $form->field($model, 'business_id') ?>

    <?php // echo $form->field($model, 'tax_id') ?>

    <?php // echo $form->field($model, 'items') ?>

    <?php // echo $form->field($model, 'binding_order') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
