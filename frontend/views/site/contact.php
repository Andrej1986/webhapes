<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Tvorba web stránok - Kontakt';
?>
<div class="site-contact">
    <h1>Kontakt</h1>

    <p>
        Ak máte akékoľvek otázky, prosím, kontaktujte nás.
    </p>

    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="img">{image}</div><div>{input}</div></div>
&nbsp;<div class="verification-code-info"><i><small>Pre zmenu overovacieho kódu, kliknite na obrázok s kódom.</small></i></div>',
                    'options' => ['placeholder' => 'Tu vpíšte overovací kód']
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Odoslať', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
