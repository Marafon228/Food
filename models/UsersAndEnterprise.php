<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "UsersAndEnterprise".
 *
 * @property int $Id
 * @property int $IdUser
 * @property int $IdEnterprise
 *
 * @property Enterprise $idEnterprise
 * @property User $idUser
 */
class UsersAndEnterprise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'UsersAndEnterprise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdUser', 'IdEnterprise'], 'required'],
            [['IdUser', 'IdEnterprise'], 'integer'],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IdUser' => 'Id']],
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
            'IdUser' => Yii::t('table', 'Id User'),
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
     * Gets query for [[IdUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['Id' => 'IdUser']);
    }
}
