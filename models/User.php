<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property int $Id
 * @property string $Login
 * @property string $Password
 * @property string $FirsName
 * @property string $MidleName
 * @property string $LastName
 * @property string $Adress
 * @property string $Phone
 * @property string $Email
 * @property int $IdRole
 * @property string $Auth_key
 * @property string $Access_token
 * @property Role $idRole
 * @property Order[] $orders
 * @property UsersAndEnterprise[] $usersAndEnterprises
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Login', 'Password', 'FirsName', 'MidleName', 'LastName', 'Adress', 'Phone', 'Email','IdRole', 'Auth_key', 'Access_token'], 'required'],
            [['IdRole'], 'integer'],
            [['Auth_key', 'Access_token','Login', 'Password', 'FirsName', 'MidleName', 'LastName', 'Adress', 'Phone', 'Email'], 'string', 'max' => 50],
            [['IdRole'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['IdRole' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('table', 'ID'),
            'Login' => Yii::t('table', 'Login'),
            'Password' => Yii::t('table', 'Password'),
            'FirsName' => Yii::t('table', 'Firs Name'),
            'MidleName' => Yii::t('table', 'Midle Name'),
            'LastName' => Yii::t('table', 'Last Name'),
            'Adress' => Yii::t('table', 'Adress'),
            'Phone' => Yii::t('table', 'Phone'),
            'Email' => Yii::t('table', 'Email'),
            'IdRole' => Yii::t('table', 'Id Role'),
			'Auth_key' => Yii::t('app', 'Auth Key'),
            'Access_token' => Yii::t('app', 'Access Token'),
        ];
    }

    /**
     * Gets query for [[IdRole]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdRole()
    {
        return $this->hasOne(Role::className(), ['Id' => 'IdRole']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['IdUser' => 'Id']);
    }

    /**
     * Gets query for [[UsersAndEnterprises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsersAndEnterprises()
    {
        return $this->hasMany(UsersAndEnterprise::className(), ['IdUser' => 'Id']);
    }
}
