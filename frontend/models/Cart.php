<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 */
class Cart extends Model
{
	public function createItemSessionNameById($id)
	{
		return 'item_'.$id;
	}

	public function getAllItems($sessions = [])
	{
		$items = [];
		foreach ($sessions as $key => $value) {
			if ($value && strpos($key, 'item_') === 0) {
				$items[substr($key, 5)] = $value;
			}
		}
		return $items;
	}

	public function fixedPayment($sessions = [])
	{
		$items = $this->getAllItems($sessions);
		if ($items) {
			$sum = 0;
			foreach ($items as $index => $item) {
				$sum = $sum + (Product::find()->asArray()->select('price')
						->where(['id' => $index, 'category' => 'predpripravené'])->one())['price'] * $item;
			}
			return $sum;
		}

		return false;
	}

}
