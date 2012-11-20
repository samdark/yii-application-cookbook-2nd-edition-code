<?php

/**
 * This is the model class for table "staff".
 *
 * The followings are the available columns in table 'staff':
 * @property integer $staff_id
 * @property string $first_name
 * @property string $last_name
 * @property integer $address_id
 * @property string $picture
 * @property string $email
 * @property integer $store_id
 * @property integer $active
 * @property string $username
 * @property string $password
 * @property string $last_update
 *
 * The followings are the available model relations:
 * @property Payment[] $payments
 * @property Rental[] $rentals
 * @property Address $address
 * @property Store $store
 * @property Store[] $stores
 */
class Staff extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Staff the static model class
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
		return 'staff';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('address_id, store_id, last_update', 'required'),
			array('address_id, store_id, active', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>45),
			array('email', 'length', 'max'=>50),
			array('username', 'length', 'max'=>16),
			array('password', 'length', 'max'=>40),
			array('picture', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('staff_id, first_name, last_name, address_id, picture, email, store_id, active, username, password, last_update', 'safe', 'on'=>'search'),
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
			'payments' => array(self::HAS_MANY, 'Payment', 'staff_id'),
			'rentals' => array(self::HAS_MANY, 'Rental', 'staff_id'),
			'address' => array(self::BELONGS_TO, 'Address', 'address_id'),
			'store' => array(self::BELONGS_TO, 'Store', 'store_id'),
			'stores' => array(self::HAS_MANY, 'Store', 'manager_staff_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'staff_id' => 'Staff',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'address_id' => 'Address',
			'picture' => 'Picture',
			'email' => 'Email',
			'store_id' => 'Store',
			'active' => 'Active',
			'username' => 'Username',
			'password' => 'Password',
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

		$criteria->compare('staff_id',$this->staff_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('address_id',$this->address_id);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('store_id',$this->store_id);
		$criteria->compare('active',$this->active);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('last_update',$this->last_update,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}