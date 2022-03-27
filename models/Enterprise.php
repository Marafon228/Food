<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Enterprise".
 *
 * @property int $Id
 * @property string $Name
 * @property int $IdType
 * @property string $Address
 * @property float $Latitude
 * @property float $Longitude
 *
 * @property TypeOfEnterprise $idType
 * @property TypesOfProducts[] $typesOfProducts
 * @property UsersAndEnterprise[] $usersAndEnterprises
 */
class Enterprise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Enterprise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'IdType', 'Address', 'Latitude', 'Longitude'], 'required'],
            [['IdType'], 'integer'],
            [['Latitude', 'Longitude'], 'number'],
            [['Name', 'Address'], 'string', 'max' => 50],
            [['IdType'], 'exist', 'skipOnError' => true, 'targetClass' => TypeOfEnterprise::className(), 'targetAttribute' => ['IdType' => 'Id']],
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
            'IdType' => Yii::t('table', 'Id Type'),
            'Address' => Yii::t('table', 'Address'),
            'Latitude' => Yii::t('table', 'Latitude'),
            'Longitude' => Yii::t('table', 'Longitude'),
        ];
    }

    /**
     * Gets query for [[IdType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdType()
    {
        return $this->hasOne(TypeOfEnterprise::className(), ['Id' => 'IdType']);
    }

    /**
     * Gets query for [[TypesOfProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypesOfProducts()
    {
        return $this->hasMany(TypesOfProducts::className(), ['IdEnterprise' => 'Id']);
    }

    /**
     * Gets query for [[UsersAndEnterprises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsersAndEnterprises()
    {
        return $this->hasMany(UsersAndEnterprise::className(), ['IdEnterprise' => 'Id']);
    }
}
