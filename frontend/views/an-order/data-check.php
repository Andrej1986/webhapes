<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="site-order-check">
    <h1>Prosím skontrolujte objednávku.</h1>

    <div class="col-sm-6">
        <h3>Objednané položky</h3>
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>Názov</th>
                <th>Množstvo</th>
                <th>Cena/1ks</th>
                <th>Spolu</th>
            </tr>
            </thead>
            <tbody>
			<?php foreach ($items as $item): ?>
                <tr>
                    <td><?= $item[0]['name'] ?></td>&nbsp;
                    <td> <?= $item['qty'] ?>ks</td>
                    <td><?= $item[0]['price'] ?><?= $item[0]['category'] === 'na mieru' ? '€/h' : '€' ?></td>
                    <td><?= $item[0]['category'] === 'na mieru' ? 'dodatočne*' : $item[0]['price'] * $item['qty'] . '€' ?></td>
                </tr>
			<?php endforeach; ?>
            </tbody>
        </table>

        <h4>Spolu na zaplatenie: <strong> <?= $total_prepayment ?>€</strong></h4>

        <p class="remarks">* - podľa počtu odpracovaných hodín</p>
    </div>

    <div class="col-sm-offset-1 col-sm-5">
        <h3>Kontaktné údaje</h3>
		<?php $form = ActiveForm::begin(['action' => Url::to(['//an-order/order-confirmation', 'order_id' => $order_id])]); ?>
		<?= $form->field($model, 'name')->label('Meno')->label(false) ?>
		<?= $form->field($model, 'surname')->label('Priezvisko')->label(false) ?>
		<?= $form->field($model, 'town')->label('Mesto')->label(false) ?>
		<?= $form->field($model, 'street')->label('Ulica')->label(false) ?>
		<?= $form->field($model, 'street_no')->label('Číslo ulice')->label(false) ?>
		<?= $form->field($model, 'phone')->label('Mobil')->label(false) ?>
		<?= $form->field($model, 'email')->label('Email')->label(false) ?>
		<?= $form->field($model, 'zip')->label('PSČ')->label(false) ?>

		<?php if ($model['company']): ?>
			<?= $form->field($model, 'company')->textInput(['placeholder' => 'spoločnosť'])->label('Spoločnosť')->label(false) ?>
			<?= $form->field($model, 'business_id')->textInput(['placeholder' => 'IČO'])->label('IČO')->label(false) ?>
			<?= $form->field($model, 'tax_id')->textInput(['placeholder' => 'DIČ'])->label('DIČ')->label(false) ?>
		<?php endif; ?>

		<?= $form->field($model, 'items')->hiddenInput()->label(false) ?>
		<?= $form->field($model, 'binding_order')->hiddenInput(['value' => 1])->label(false) ?>

        <div class="form-group">
			<?= Html::submitButton('Objednávka s povinnosťou platby', ['class' => 'btn btn-confirm']) ?>
        </div>
		<?php ActiveForm::end(); ?>
    </div>
</div>