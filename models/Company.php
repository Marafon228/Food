<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Company".
 *
 * @property int $Id
 * @property string $Name
 * @property string $Address
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Name', 'Address'], 'required'],
            [['Id'], 'integer'],
            [['Name', 'Address'], 'string', 'max' => 50],
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
            'Address' => Yii::t('table', 'Address'),
        ];
    }
}
