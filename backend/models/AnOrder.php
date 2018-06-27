<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "an_order".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $town
 * @property string $street
 * @property string $street_no
 * @property string $phone
 * @property string $email
 * @property string $company
 * @property int $zip
 * @property string $business_id
 * @property string $tax_id
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
            [['name', 'surname', 'town', 'street', 'street_no', 'phone', 'email', 'company', 'business_id', 'tax_id', 'items'], 'required'],
            [['zip', 'binding_order'], 'integer'],
            [['items'], 'string'],
            [['name', 'surname', 'phone', 'business_id', 'tax_id'], 'string', 'max' => 25],
            [['town', 'company'], 'string', 'max' => 30],
            [['street'], 'string', 'max' => 35],
            [['street_no'], 'string', 'max' => 10],
            [['email'], 'string', 'max' => 40],
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
            'surname' => Yii::t('app', 'Surname'),
            'town' => Yii::t('app', 'Town'),
            'street' => Yii::t('app', 'Street'),
            'street_no' => Yii::t('app', 'Street No'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'company' => Yii::t('app', 'Company'),
            'zip' => Yii::t('app', 'Zip'),
            'business_id' => Yii::t('app', 'Business ID'),
            'tax_id' => Yii::t('app', 'Tax ID'),
            'items' => Yii::t('app', 'Items'),
            'binding_order' => Yii::t('app', 'Binding Order'),
        ];
    }
}
