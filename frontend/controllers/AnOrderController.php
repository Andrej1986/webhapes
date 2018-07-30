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
//		var_dump($model->checkOverQuantityItems($model->items));exit();

		if ($model->checkItemsOverQuantity($model->items) != '') {
			$model->items = $model->checkItemsOverQuantity($model->items);
			$model->save();
			Yii::$app->session->setFlash('error', 'Je nám ľúto, ale niektoré produkty sa medzičasom vypredali, alebo nie sú vo vami požadovanej kvantite. Prosím skontrolujte si objednávku, či spĺňa vaše požiadavky po korekcii. Ak nie, skúste ísť do obchodu a nájsť produkty, ktoré nie sú vypredané.');

			return $this->redirect(['//an-order/data-check', 'order_id' => $order_id]);
		}

		if($model->orderItemsQty($model->items) == 0){return $this->redirect(['//site']);}

		if ($model->load(\Yii::$app->request->post()) && $model->save()) {

			if ($model->sendOrderConfirmationEmail($model->email)) {

				$model->afterOrderConfirmation();

				return $this->render('//an-order/order_confirmation');
			}

			$model->afterOrderConfirmation();

			return $this->render('//an-order/order_confirmation');
		}

		return 'Nepodarilo sa odoslať objednávku';
	}


}
