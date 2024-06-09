<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $full_name
 * @property string $phone
 * @property string $login
 * @property int $category_id
 * @property string $email
 * @property string $passport
 * @property int $role_id
 * @property string $auth_key
 * @property string $password
 */
class RegisterForm extends Model
{

    public $full_name;
    public $phone;
    public $login;
    public $email;
    public $passport;
    public $password;
    public $category_id;


    public function rules()
    {
        return [
            [['full_name', 'phone', 'login', 'category_id', 'email', 'passport', 'password'], 'required'],
            [['category_id'], 'integer'],
            [['full_name', 'phone', 'login', 'email', 'passport', 'password'], 'string', 'max' => 255],
            ['full_name', 'match', 'pattern' => '/^[а-яё\s]+$/ui'],
            ['login', 'match', 'pattern' => '/^[a-z0-9\-]+$/i'],
            [['login', 'email'], 'unique', 'targetClass' => User::class],
            ['password', 'match', 'pattern' => '/^[a-z0-9]+$/i'],
            [['password'], 'string', 'min' => 6],
            ['passport', 'match', 'pattern' => '/^([0-9]){4}\s([0-9]){6}$/'],
            ['email', 'email'],
            ['phone', 'match', 'pattern' => '/^\+7\(\d{3}\)\-\d{3}(\-\d{2}){2}$/'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'phone' => 'Phone',
            'login' => 'Login',
            'category_id' => 'Category ID',
            'email' => 'Email',
            'passport' => 'Passport',
            'role_id' => 'Role ID',
            'auth_key' => 'Auth Key',
            'password' => 'Password',
        ];
    }

    public function registerUser()
    {
        if ($this->validate()) {
            $user = new User();
            $user->attributes = $this->attributes;
            $user->password = Yii::$app->security->generatePasswordHash($this->password);
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->role_id = 2;

            if (!$user->save()) {
                VarDumper::dump($user->errors, 10, true);
                die;
            }
        }

        return $user ?? false;
    }
}
