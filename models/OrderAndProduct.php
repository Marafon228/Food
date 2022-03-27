<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "OrderAndProduct".
 *
 * @property int $Id
 * @property int $IdOrder
 * @property int $IdProduct
 *
 * @property Order $idOrder
 * @property Product $idProduct
 */
class OrderAndProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'OrderAndProduct';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'IdOrder', 'IdProduct'], 'required'],
            [['Id', 'IdOrder', 'IdProduct'], 'integer'],
            [['Id'], 'unique'],
            [['IdProduct'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['IdProduct' => 'Id']],
            [['IdOrder'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['IdOrder' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('table', 'ID'),
            'IdOrder' => Yii::t('table', 'Id Order'),
            'IdProduct' => Yii::t('table', 'Id Product'),
        ];
    }

    /**
     * Gets query for [[IdOrder]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdOrder()
    {
        return $this->hasOne(Order::className(), ['Id' => 'IdOrder']);
    }

    /**
     * Gets query for [[IdProduct]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Product::className(), ['Id' => 'IdProduct']);
    }
}
