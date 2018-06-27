<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $category
 * @property int $quantity
 * @property double $price
 * @property string $introduction
 * @property string $description
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category', 'quantity', 'price', 'introduction', 'description'], 'required'],
            [['quantity'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['name', 'category'], 'string', 'max' => 50],
            [['introduction'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'category' => Yii::t('app', 'Category'),
            'quantity' => Yii::t('app', 'Quantity'),
            'price' => Yii::t('app', 'Price'),
            'introduction' => Yii::t('app', 'Introduction'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
