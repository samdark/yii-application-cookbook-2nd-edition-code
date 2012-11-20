<?php

/**
 * This is the model class for table "rental".
 *
 * The followings are the available columns in table 'rental':
 * @property integer $rental_id
 * @property string $rental_date
 * @property integer $inventory_id
 * @property integer $customer_id
 * @property string $return_date
 * @property integer $staff_id
 * @property string $last_update
 *
 * The followings are the available model relations:
 * @property Payment[] $payments
 * @property Customer $customer
 * @property Inventory $inventory
 * @property Staff $staff
 */
class Rental extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rental the static model class
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
		return 'rental';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('inventory_id, customer_id, staff_id, last_update', 'required'),
			array('inventory_id, customer_id, staff_id', 'numerical', 'integerOnly'=>true),
			array('rental_date, return_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rental_id, rental_date, inventory_id, customer_id, return_date, staff_id, last_update', 'safe', 'on'=>'search'),
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
			'payments' => array(self::HAS_MANY, 'Payment', 'rental_id'),
			'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
			'inventory' => array(self::BELONGS_TO, 'Inventory', 'inventory_id'),
			'staff' => array(self::BELONGS_TO, 'Staff', 'staff_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rental_id' => 'Rental',
			'rental_date' => 'Rental Date',
			'inventory_id' => 'Inventory',
			'customer_id' => 'Customer',
			'return_date' => 'Return Date',
			'staff_id' => 'Staff',
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

		$criteria->compare('rental_id',$this->rental_id);
		$criteria->compare('rental_date',$this->rental_date,true);
		$criteria->compare('inventory_id',$this->inventory_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('return_date',$this->return_date,true);
		$criteria->compare('staff_id',$this->staff_id);
		$criteria->compare('last_update',$this->last_update,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}