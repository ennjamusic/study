<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $usersecondname
 * @property string $password
 * @property integer $role
 * @property integer $status
 * @property string $phone
 * @property string $email
 * @property integer $adminconfirm
 * @property string $register
 *
 * The followings are the available model relations:
 * @property Comment[] $comments
 * @property Order[] $orders
 * @property Page[] $pages
 * @property Review[] $reviews
 */
class User extends CActiveRecord
{
    public $verifyCode;
    const ROLE_ADMIN = 'administrator';
    const ROLE_USER = 'user';
    const ROLE_BANNED = 'banned';

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'required'),
			array('username, password, email', 'required'),
			array('role, status, adminconfirm', 'numerical', 'integerOnly'=>true),
			array('username, usersecondname', 'length', 'max'=>55),
			array('password, phone', 'length', 'max'=>30),
//			array('email', 'length', 'max'=>50),
			array('email', 'email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, usersecondname, password, role, status, phone, email, adminconfirm, register', 'safe', 'on'=>'search'),
            // verifyCode needs to be entered correctly
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),'on'=>'registration'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'comments' => array(self::HAS_MANY, 'Comment', 'user_id'),
			'orders' => array(self::HAS_MANY, 'Order', 'user_id'),
			'pages' => array(self::HAS_MANY, 'Page', 'user_id'),
			'reviews' => array(self::HAS_MANY, 'Review', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Имя пользователя',
			'usersecondname' => 'Фамилия',
			'password' => 'Пароль',
			'role' => 'Роль',
			'status' => 'Статус',
			'phone' => 'Телефон',
			'email' => 'E-mail',
			'adminconfirm' => 'Подтвержден',
			'register' => 'Дата регистрации',
            'verifyCode' => 'Код с картинки',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('usersecondname',$this->usersecondname,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role',$this->role);
		$criteria->compare('status',$this->status);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('adminconfirm',$this->adminconfirm);
		$criteria->compare('register',$this->register,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function beforeSave() {
        if($this->isNewRecord) {
            $this->register = time();
            $this->role = 1;
//            echo 1; die();
        }

//        $this->password = $this->password;
        return parent::beforeSave();
    }
}
