<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "an_order".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $town
 * @property string $street
 * @property int $street_no
 * @property string $phone
 * @property string $email
 * @property string $company
 * @property int $zip
 * @property string $items
 * @property int $binding_order
 */
class AnOrder extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'an_order';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
//			[['name', 'surname', 'town', 'street', 'street_no', 'phone', 'email', 'zip', 'items'], 'required'],
			[['name', 'email'], 'required'],
			[['zip'], 'integer'],
			[['items'], 'string'],
			[['name', 'surname', 'phone', 'business_id', 'tax_id'], 'string', 'max' => 25],
			[['town', 'company'], 'string', 'max' => 30],
			[['street'], 'string', 'max' => 35],
			[['street_no'], 'string', 'max' => 10],
			[['binding_order'], 'integer', 'max' => 1],
			[['email'], 'email'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
//			'id'        => Yii::t('product', 'ID'),
//			'name'      => Yii::t('product', 'Name'),
//			'surname'   => Yii::t('product', 'Surname'),
//			'town'      => Yii::t('product', 'Town'),
//			'street'    => Yii::t('product', 'Street'),
//			'street_no' => Yii::t('product', 'Street No'),
//			'phone'     => Yii::t('product', 'Phone'),
//			'email'     => Yii::t('product', 'Email'),
//			'company'   => Yii::t('product', 'Company'),
//			'zip'       => Yii::t('product', 'Zip'),
//			'items'     => Yii::t('product', 'Items'),

			'id'           => 'ID',
			'name'         => 'Meno',
			'surname'      => 'Priezvisko',
			'town'         => 'Mesto',
			'street'       => 'Ulica',
			'street_no'    => 'Číslo ulice',
			'phone'        => 'Mobil',
			'email'        => 'Email',
			'company'      => 'Spoločnosť',
			'zip'          => 'PSČ',
			'items'        => 'Položky',
			'biding_order' => 'Závazne objednané',
		];
	}

	public static function stringifyOrder($sessions)
	{
		$cart_items = json_encode(Cart::getAllItems($sessions));
		return $cart_items;
	}

	public static function orderedItems($items)
	{
		$parsed_items = json_decode($items);
		$result       = [];

		foreach ($parsed_items as $key => $value) {
			$product             = Product::find()->asArray()->where(['id' => $key])->all();
			$result[$key]        = $product;
			$result[$key]['qty'] = $value;
		}

		return $result;
	}

	public static function totalPrepaymanet($items)
	{
		$items = static::orderedItems($items);
		$sum   = 0;

		foreach ($items as $item) {
			if ($item[0]['category'] !== 'na mieru') {
				$value = $item[0]['price'] * $item['qty'];
				$sum   = $sum + $value;
			}
		}

		return $sum;
	}

	private function confirmationEmailHtml($items)
	{
		$string = '<h3>Vážený/á ' . $this->name  . '.</h3>';
		$string .= '<p>Obdržali sme Vašu objednávku a budeme na nej usilovne pracovať.</p>';
		$string .= '<p>V prípade otázok nás, prosím, kontaktujte.</p><hr>';

		foreach ($items as $item) {

			$string .= '<p>položka: <strong>' . $item[0]['name'] .
				'&nbsp;&nbsp;&nbsp; </strong> množstvo: <strong>' . $item['qty'] . '</strong>&nbsp;&nbsp;&nbsp; ' .
				' jednotková cena: <strong>' . $item[0]['price'] . ($item[0]['category'] === 'na mieru' ? '€/h' : '€') . '</strong>;<p>';
		}

		$string .= '<h4> Celkom na zaplatenie: <strong>' . self::totalPrepaymanet($this->items) . '€</strong></h4>.';

		return $string;
	}

	private function confirmationEmailBody()
	{
		$items = self::orderedItems($this->items);

		return $this->confirmationEmailHtml($items);
	}

	public function sendOrderConfirmationEmail($email)
	{
		return Yii::$app->mailer->compose()
			->setTo($email)
			->setFrom('srohapes@gmail.com')
			->setSubject('Potvrdenie objednávky')
//			->setTextBody('test'
//
//			)
			->setHtmlBody($this->confirmationEmailBody()
			)
			->send();
	}
}
