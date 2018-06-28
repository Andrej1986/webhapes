<?php

namespace frontend\controllers;

use frontend\models\Product;

class ProductController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        return $this->render('index', [
        	'product' => Product::find()->asArray()->where(['id' => $id])->one(),
		]);
    }

}
