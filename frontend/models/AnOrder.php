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
 * @property string $emall
 * @property string $company
 * @property int $zip
 * @property string $items
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
            [['name', 'surname', 'town', 'street', 'street_no', 'phone', 'emall', 'company', 'zip', 'items'], 'required'],
            [['street_no', 'zip'], 'integer'],
            [['items'], 'string'],
            [['name', 'surname', 'phone'], 'string', 'max' => 25],
            [['town', 'company'], 'string', 'max' => 30],
            [['street'], 'string', 'max' => 35],
            [['emall'], 'string', 'max' => 40],
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
            'surname' => Yii::t('product', 'Surname'),
            'town' => Yii::t('product', 'Town'),
            'street' => Yii::t('product', 'Street'),
            'street_no' => Yii::t('product', 'Street No'),
            'phone' => Yii::t('product', 'Phone'),
            'emall' => Yii::t('product', 'Emall'),
            'company' => Yii::t('product', 'Company'),
            'zip' => Yii::t('product', 'Zip'),
            'items' => Yii::t('product', 'Items'),
        ];
    }
}
