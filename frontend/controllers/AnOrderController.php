<?php

namespace frontend\controllers;

use frontend\models\AnOrder;
use frontend\models\Cart;
use Yii;

class AnOrderController extends \yii\web\Controller
{
	public function actionCustomerInfo()
	{
		$model = new AnOrder();

		if ($model->load(\Yii::$app->request->post()) && $model->save()) {
			$this->redirect(['//an-order/data-check', 'order_id' => $model->id]);
		}
		return $this->render('customer_info', [
			'model' => $model,
			'items' => AnOrder::stringifyOrder($_SESSION),
		]);
	}

	public function actionDataCheck($order_id)
	{
		$model = AnOrder::findOne($order_id);

		return $this->render('data-check', [
			'id'               => $order_id,
			'model'            => $model,
			'items'            => AnOrder::orderedItems($model->items),
			'total_prepayment' => AnOrder::totalPrepaymanet($model->items),
			'order_id'         => $order_id,
		]);
	}

	public function actionOrderConfirmation($order_id)
	{
		$model = AnOrder::findOne($order_id);

		if ($model->load(\Yii::$app->request->post()) && $model->save()) {

			if ($model->sendOrderConfirmationEmail($model->email)) {
				Cart::destroyItemsSession($_SESSION);
				Yii::$app->session->setFlash('success', 'Na váš email sme vám odoslali potvrdenie objednávky.');
				return $this->render('//an-order/order_confirmation');
			}

			Cart::destroyItemsSession($_SESSION);
			Yii::$app->session->setFlash('success', 'Nepodarilo sa odoslať potvrdenie objednávky na váš email.');
			return $this->render('//an-order/order_confirmation');
		}

		return 'Nepodarilo sa odoslať objednávku';
	}


}
