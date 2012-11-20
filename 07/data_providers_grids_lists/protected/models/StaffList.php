<?php

/**
 * This is the model class for table "staff_list".
 *
 * The followings are the available columns in table 'staff_list':
 * @property integer $ID
 * @property string $name
 * @property string $address
 * @property string $zip code
 * @property string $phone
 * @property string $city
 * @property string $country
 * @property integer $SID
 */
class StaffList extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return StaffList the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'staff_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SID', 'required'),
			array('ID, SID', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>91),
			array('address, city, country', 'length', 'max'=>50),
			array('zip code', 'length', 'max'=>10),
			array('phone', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, name, address, zip code, phone, city, country, SID', 'safe', 'on'=>'search'),
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
			'ID' => 'ID',
			'name' => 'Name',
			'address' => 'Address',
			'zip code' => 'Zip Code',
			'phone' => 'Phone',
			'city' => 'City',
			'country' => 'Country',
			'SID' => 'Sid',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('zip code',$this->zip code,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('SID',$this->SID);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}