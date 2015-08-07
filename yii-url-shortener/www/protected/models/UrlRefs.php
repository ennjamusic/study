<?php

/**
 * This is the model class for table "url_refs".
 *
 * The followings are the available columns in table 'url_refs':
 * @property integer $id
 * @property string $long_url
 * @property string $short_url
 */
class UrlRefs extends CActiveRecord
{

	const STATUS_OK = 200;
	const RETURN_OK = true;
	const RETURN_FALSE = false;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'url_refs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('long_url, short_url', 'required'),
			array('long_url', 'length', 'max'=>255),
			array('short_url', 'length', 'max'=>35),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, long_url, short_url', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'long_url' => 'Long Url',
			'short_url' => 'Short Url',
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
		$criteria->compare('long_url',$this->long_url,true);
		$criteria->compare('short_url',$this->short_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UrlRefs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
