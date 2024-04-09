<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $fio
 * @property int $role_id
 *
 * @property Order[] $orders
 * @property Order[] $orders0
 * @property Orderuser[] $orderusers
 * @property Role $role
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public static function findByUsername($login)
    {
        return User::findOne(['login' => $login]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return false;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    /* Проверка на вход администратора */
    public function isAdmin(){
        return $this->role->code === "admin";
    }



    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'fio'], 'required'],
            [['role_id'], 'integer'],
            [['login', 'password', 'fio'], 'string', 'max' => 255],
            [['login'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логие',
            'password' => 'Пароль',
            'fio' => 'ФИО',
            'role_id' => 'Role ID',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Orders0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders0()
    {
        return $this->hasMany(Order::class, ['responsible_id' => 'id']);
    }

    /**
     * Gets query for [[Orderusers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderusers()
    {
        return $this->hasMany(Orderuser::class, ['executor_id' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'role_id']);
    }
}
