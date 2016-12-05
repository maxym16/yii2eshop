<?php

namespace app\models;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
use Yii;

class User extends ActiveRecord implements IdentityInterface{
    /**
     * явно вказуємо таблицю БД з якою працюємо
     * @return string
     */
    public static function tableName(){
       return 'user';
    }

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        //return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
        //return $this->getAuthKey() === $authKey;        
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //return $this->password === $password;
        return Yii::$app->security->validatePassword($password, $this->password);
        //return Yii::$app->getSecurity()->generatePasswordHash($password,  $this->password);
    }
    
    public function generateAuthKey(){
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
}
