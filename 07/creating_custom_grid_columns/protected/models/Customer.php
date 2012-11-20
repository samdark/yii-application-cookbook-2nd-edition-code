<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $customer_id
 * @property integer $store_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property integer $address_id
 * @property integer $active
 * @property string $create_date
 * @property string $last_update
 *
 * The followings are the available model relations:
 * @property Address $address
 * @property Store $store
 * @property Payment[] $payments
 * @property Rental[] $rentals
 */
class Customer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Customer the static model class
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
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('store_id, address_id, last_update', 'required'),
			array('store_id, address_id, active', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>45),
			array('email', 'length', 'max'=>50),
			array('create_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('customer_id, store_id, first_name, last_name, email, address_id, active, create_date, last_update', 'safe', 'on'=>'search'),
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
			'address' => array(self::BELONGS_TO, 'Address', 'address_id'),
			'store' => array(self::BELONGS_TO, 'Store', 'store_id'),
			'payments' => array(self::HAS_MANY, 'Payment', 'customer_id'),
			'rentals' => array(self::HAS_MANY, 'Rental', 'customer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'customer_id' => 'Customer',
			'store_id' => 'Store',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'address_id' => 'Address',
			'active' => 'Active',
			'create_date' => 'Create Date',
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

		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('store_id',$this->store_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address_id',$this->address_id);
		$criteria->compare('active',$this->active);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('last_update',$this->last_update,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}