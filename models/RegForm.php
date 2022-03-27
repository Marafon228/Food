<?php
/**
 *Yii App
 *
 * @link https://ktk40.ru/index.php/ru/
 * @licence https://www.yiiframework.com/license
 */

namespace app\models;

use Yii;
use yii\base\Model;

/**
 *Форма регистрации
 * @since 1.0
 */
class RegForm extends Model
{
    /**
     * @var string ФИО
     */
    public $firsName;
	/**
     * @var string ФИО
     */
    public $midleName;
	/**
     * @var string ФИО
     */
    public $lastName;
	/**
     * @var string ФИО
     */
    public $adress;
	/**
     * @var string ФИО
     */
    public $phone;

    /**
     * @var string Логин
     */
    public $login;

    /**
     * @var string E-Mail
     */
    public $email;

    /**
     * @var string Пароль
     */
    public $password;

    /**
     * @var string Повторите пароль
     */
    public $password2;

    /**
     * @var bool Согласие на обработку персональных данных
     */
    public $approval;

    /**
     * Возвращает правила проверки атрибутов.
     *
     * @return array правила проверки
     */
    public function rules()
    {
        return [
            [['firsName','midleName' ,'lastName','adress','phone','login', 'email', 'password', 'password2', 'approval'], 'required'],
            [['firsName','midleName' ,'lastName','adress','phone', 'login', 'email', 'password', 'password2', 'approval'], 'trim'],

            ['login', 'match', 'pattern' => '/^[a-z]{1}[a-z0-9_-]{4,20}$/i', 'message' => 'Только латинские буквы, цифры, дефис и от 5 до 20 символов'],
            ['email', 'email'],
            ['password2', 'compare', 'compareAttribute' => 'password'],
            ['approval', 'boolean'],
            ['approval', 'compare', 'compareValue' => true, 'message' => 'Необходимо согласиться'],
            ['firsName', 'string', 'length' => [5, 100]],
			['midleName', 'string', 'length' => [5, 100]],
			['lastName', 'string', 'length' => [5, 100]],
			['adress', 'string', 'length' => [5, 100]],
			['phone', 'string', 'length' => [5, 100]],
            ['login', 'string', 'length' => [5, 20]],
            ['password', 'string', 'length' => [6, 32]],
			['login', 'string', 'length' => [6, 32]],
			['email', 'string', 'length' => [6, 32]]

        ];
    }

    /**
     * Возвращает метки атрибутов
     *
     * @return array метки отрибутов (name => label)
     */

    public function attributeLabels()
    {
        return [
            'FirsName' => Yii::t('table', 'FirsName'),
			'midleName' => Yii::t('table', 'MidleName'),
			'lastName' => Yii::t('table', 'LastName'),
			'adress' => Yii::t('table', 'Adress'),
			'phone' => Yii::t('table', 'Phone'),
            'login' => Yii::t('table', 'Login'),
            'email' => Yii::t('table', 'Email'),
            'password' => Yii::t('table', 'Password'),
            'password2' => Yii::t('app', 'Repeat the password'),
            'approval' => Yii::t('app', 'Consent to the processing of personal data'),
        ];
    }

    /**
     * Сохранение пользователья в БД
     *
     * @return bool результат сохранения
     * @throws \yii\base\Exception
     */
    public function reg()
    {
        $user = new User();
        $user->FirsName = $this->firsName;
		$user->LastName = $this->lastName;
		$user->MidleName = $this->midleName;
		$user->Phone = $this->phone;
        $user->Login = $this->login;
        $user->Email = $this->email;
        $user->Password = Yii::$app->security->generatePasswordHash($this->password);

		$user->Auth_key = md5(microtime() . uniqid());
        $user->Access_token = md5(microtime() . uniqid());

        $user->IdRole = 4;
        return $user->save();
    }

}