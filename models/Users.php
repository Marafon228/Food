<?php

namespace app\models;

class Users extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $Id;
    public $FirsName;
	public $MidleName;
	public $LastName;
	public $Phone;
	public $Adress;
    public $Email;
    public $Login;
    public $IdRole;
    public $Password;
	public $Access_token;
	public $Auth_key;


    /**
     * {@inheritdoc}
     * @param $Id
     * @return User|\yii\web\IdentityInterface|null
     */
    public static function findIdentity($Id)
    {
        $user = User::find()->where(['Id' => $Id])->asArray()->one();
        if ($user) return new static($user);
        return null;
    }

    /**
     * {@inheritdoc}
     * @param $token
     * @param $type
     * @return User|\yii\web\IdentityInterface|null
     */

    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = User::find()->where(['access_token' => $token])->asArray()->one();
        if ($user) return new static($user);
        return null;
    }


    /**
     * Finds user by username
     *
     * @param string $username
     * @return User|null
     */
    public static function findByUsername($username)
    {
        $user = User::find()->where(['Login' => $username])->asArray()->one();
        if ($user) return new static($user);
        return null;
    }

    /**
     * {@inheritdoc}
     * @return int|string
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * {@inheritdoc}
     * @return string|null
     */

    public function getAuthKey()
    {
        return $this->Auth_key;
    }


    /**
     * {@inheritdoc}
     * @param $Auth_key
     * @return bool
     */

    public function validateAuthKey($Auth_key)
    {
        return $this->Auth_key === $Auth_key;
    }

}
