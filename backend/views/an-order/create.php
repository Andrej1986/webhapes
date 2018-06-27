<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AnOrder */

$this->title = Yii::t('app', 'Create An Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'An Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="an-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
