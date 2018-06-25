<?php

namespace frontend\controllers;

use frontend\models\Cart;
use frontend\models\Product;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * Site controller
 */
class CartController extends Controller
{
	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only'  => ['logout', 'signup'],
				'rules' => [
					[
						'actions' => ['signup'],
						'allow'   => true,
						'roles'   => ['?'],
					],
					[
						'actions' => ['logout'],
						'allow'   => true,
						'roles'   => ['@'],
					],
				],
			],
			'verbs'  => [
				'class'   => VerbFilter::className(),
				'actions' => [
					'logout' => ['post'],
				],
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function actions()
	{
		return [
			'error'   => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class'           => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}


	public function actionIndex($id = null)
	{
		if (Yii::$app->session->get('item_' . $id) == 0) {
			Yii::$app->session->set('item_' . $id, '1');
		}

		$cart = new Cart();

		return $this->render('//cart/index', [
			'products' => Product::find()->asArray()->where(['id' => array_keys($cart->getAllItems($_SESSION))])->all(),
			'sum'      => $cart->fixedPayment($_SESSION),
		]);
	}

	public function actionIncreaseItem($id)
	{
		$item_session = Yii::$app->session->get('item_' . $id);
		if ($item_session !== null) {
			$new_value = $item_session + 1;
			Yii::$app->session->set('item_' . $id, $new_value);
		}

		return $this->redirect(['//cart/index']);
	}

	public function actionDecreaseItem($id)
	{
		$item_session = Yii::$app->session->get('item_' . $id);
		if ($item_session !== null && $item_session > 0) {
			$new_value = $item_session - 1;
			Yii::$app->session->set('item_' . $id, $new_value);
		}

		return $this->redirect(['//cart/index']);
	}

	public function actionRemoveItem($id)
	{
		$item_session = Yii::$app->session->get('item_' . $id);
		if ($item_session !== null && $item_session !== 0) {
			Yii::$app->session->remove('item_' . $id);
		}

		return $this->redirect(['//cart/index']);
	}

	public function actionAjaxIncreaseItem()
	{
		if (Yii::$app->request->isAjax) {
			$id     = Yii::$app->request->post('id');
			$amount = (int)Yii::$app->request->post('itemAmount') + 1;
			Yii::$app->session->set('item_' . $id, $amount);
			return $amount;
		}
		return false;
	}

	public function actionAjaxDecreaseItem()
	{
		$id = Yii::$app->request->post('id');

		if (Yii::$app->request->isAjax && Yii::$app->session->get('item_' . $id) > 0) {
			$amount = (int)Yii::$app->request->post('itemAmount') - 1;
			Yii::$app->session->set('item_' . $id, $amount);
			return $amount;
		}
		return 0;
	}

	public function actionAjaxRemoveItem()
	{
		if (Yii::$app->request->isAjax) {
			$id = Yii::$app->request->post('id');
			Yii::$app->session->set('item_' . $id, 0);
			return 0;
		}
		return false;
	}

}
