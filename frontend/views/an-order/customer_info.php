<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="site-order-contact">
    <h1>Kontaktné údaje</h1>

    <div class="col-sm-offset-2 col-sm-5">
		<?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'name')->label('Meno') ?>
		<?= $form->field($model, 'surname')->label('Priezvisko') ?>
		<?= $form->field($model, 'town')->label('Mesto') ?>
		<?= $form->field($model, 'street')->label('Ulica') ?>
		<?= $form->field($model, 'street_no')->label('Číslo ulice') ?>
		<?= $form->field($model, 'zip')->label('PSČ') ?>
        <?= $form->field($model, 'phone')->label('Mobil') ?>
		<?= $form->field($model, 'email')->label('Email') ?>

        <label id="is-company">
            <u> zaškrtnite ak ste spoločnosť</u>
            <input type="checkbox" id="is-company">
        </label>
        <div class="company">
			<?= $form->field($model, 'company')->label('Spoločnosť') ?>
			<?= $form->field($model, 'business_id')->label('IČO') ?>
			<?= $form->field($model, 'tax_id')->label('DIČ') ?>
        </div>

		<?= $form->field($model, 'items')->hiddenInput(['value' => $items])->label(false) ?>

		<?= Html::submitButton('Prejsť k záväznej objednávke', ['class' => 'btn btn-confirm']) ?>
		<?php ActiveForm::end(); ?>
    </div>
</div>