<?php

/**
 * This is the model class for table "address".
 *
 * The followings are the available columns in table 'address':
 * @property integer $address_id
 * @property string $address
 * @property string $address2
 * @property string $district
 * @property integer $city_id
 * @property string $postal_code
 * @property string $phone
 * @property string $last_update
 *
 * The followings are the available model relations:
 * @property City $city
 * @property Customer[] $customers
 * @property Staff[] $staffs
 * @property Store[] $stores
 */
class Address extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Address the static model class
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
		return 'address';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_id, last_update', 'required'),
			array('city_id', 'numerical', 'integerOnly'=>true),
			array('address, address2', 'length', 'max'=>50),
			array('district, phone', 'length', 'max'=>20),
			array('postal_code', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('address_id, address, address2, district, city_id, postal_code, phone, last_update', 'safe', 'on'=>'search'),
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
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
			'customers' => array(self::HAS_MANY, 'Customer', 'address_id'),
			'staffs' => array(self::HAS_MANY, 'Staff', 'address_id'),
			'stores' => array(self::HAS_MANY, 'Store', 'address_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'address_id' => 'Address',
			'address' => 'Address',
			'address2' => 'Address2',
			'district' => 'District',
			'city_id' => 'City',
			'postal_code' => 'Postal Code',
			'phone' => 'Phone',
			'last_update' => 'Last Update',
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

		$criteria->compare('address_id',$this->address_id);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('district',$this->district,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('postal_code',$this->postal_code,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('last_update',$this->last_update,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}