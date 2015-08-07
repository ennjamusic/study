<?php

/**
 * This is the model class for table "settings".
 *
 * The followings are the available columns in table 'settings':
 * @property integer $id
 * @property integer $defaultCommentStatus
 * @property integer $defaultReviewStatus
 * @property integer $defaultPageStatus
 * @property integer $defaultUserStatus
 * @property string $defaultTitle
 * @property string $defaultDescription
 * @property string $defaultKeywords
 * @property string $defaultNameSite
 * @property string $defaultUrlSite
 */
class Settings extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'settings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('defaultCommentStatus, defaultReviewStatus, defaultPageStatus, defaultUserStatus, defaultTitle, defaultDescription, defaultKeywords, defaultUrlSite', 'required'),
			array('defaultCommentStatus, defaultReviewStatus, defaultPageStatus, defaultUserStatus', 'numerical', 'integerOnly'=>true),
			array('defaultTitle, defaultUrlSite', 'length', 'max'=>100),
			array('defaultDescription, defaultKeywords', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, defaultCommentStatus, defaultReviewStatus, defaultPageStatus, defaultUserStatus, defaultTitle, defaultDescription, defaultKeywords, defaultUrlSite', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'defaultCommentStatus' => 'По умолчанию опубликовывыть комментарии',
			'defaultReviewStatus' => 'По умолчанию опубликовывыть отзывы',
			'defaultPageStatus' => 'По умолчанию опубликовывыть страницы',
			'defaultUserStatus' => 'По умолчанию активировать пользователя',
			'defaultTitle' => 'Заголовок приложения(сайта) по умолчанию',
			'defaultDescription' => 'Meta-описание по умолчанию',
			'defaultKeywords' => 'Meta-ключи по умолчанию',
			'defaultUrlSite' => 'Адрес сайта по умолчанию',
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
		$criteria->compare('defaultCommentStatus',$this->defaultCommentStatus);
		$criteria->compare('defaultReviewStatus',$this->defaultReviewStatus);
		$criteria->compare('defaultPageStatus',$this->defaultPageStatus);
		$criteria->compare('defaultUserStatus',$this->defaultUserStatus);
		$criteria->compare('defaultTitle',$this->defaultTitle,true);
		$criteria->compare('defaultDescription',$this->defaultDescription,true);
		$criteria->compare('defaultKeywords',$this->defaultKeywords,true);
		$criteria->compare('defaultNameSite',$this->defaultNameSite,true);
		$criteria->compare('defaultUrlSite',$this->defaultUrlSite,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Settings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
