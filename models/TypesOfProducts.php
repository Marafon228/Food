<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TypesOfProducts".
 *
 * @property int $Id
 * @property int $IdProduct
 * @property int $IdEnterprise
 *
 * @property Enterprise $idEnterprise
 * @property Product $idProduct
 */
class TypesOfProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TypesOfProducts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdProduct', 'IdEnterprise'], 'required'],
            [['IdProduct', 'IdEnterprise'], 'integer'],
            [['IdProduct'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['IdProduct' => 'Id']],
            [['IdEnterprise'], 'exist', 'skipOnError' => true, 'targetClass' => Enterprise::className(), 'targetAttribute' => ['IdEnterprise' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('table', 'ID'),
            'IdProduct' => Yii::t('table', 'Id Product'),
            'IdEnterprise' => Yii::t('table', 'Id Enterprise'),
        ];
    }

    /**
     * Gets query for [[IdEnterprise]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEnterprise()
    {
        return $this->hasOne(Enterprise::className(), ['Id' => 'IdEnterprise']);
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
