<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Order".
 *
 * @property int $Id
 * @property string $Name
 * @property string|null $Description
 * @property string $Date
 * @property int $IdUser
 * @property int|null $IdStatus
 *
 * @property Status $idStatus
 * @property User $idUser
 * @property OrderAndProduct[] $orderAndProducts
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Date', 'IdUser'], 'required'],
            [['Description'], 'string'],
            [['Date'], 'safe'],
            [['IdUser', 'IdStatus'], 'integer'],
            [['Name'], 'string', 'max' => 50],
            [['IdStatus'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['IdStatus' => 'Id']],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IdUser' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('table', 'ID'),
            'Name' => Yii::t('table', 'Name'),
            'Description' => Yii::t('table', 'Description'),
            'Date' => Yii::t('table', 'Date'),
            'IdUser' => Yii::t('table', 'Id User'),
            'IdStatus' => Yii::t('table', 'Id Status'),
        ];
    }

    /**
     * Gets query for [[IdStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdStatus()
    {
        return $this->hasOne(Status::className(), ['Id' => 'IdStatus']);
    }

    /**
     * Gets query for [[IdUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['Id' => 'IdUser']);
    }

    /**
     * Gets query for [[OrderAndProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderAndProducts()
    {
        return $this->hasMany(OrderAndProduct::className(), ['IdOrder' => 'Id']);
    }
}
