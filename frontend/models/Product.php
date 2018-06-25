<?php

namespace frontend\models;

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
            'id' => Yii::t('product', 'ID'),
            'name' => Yii::t('product', 'Name'),
            'category' => Yii::t('product', 'Category'),
            'quantity' => Yii::t('product', 'Quantity'),
            'price' => Yii::t('product', 'Price'),
            'introduction' => Yii::t('product', 'Introduction'),
            'description' => Yii::t('product', 'Description'),
        ];
    }
}
