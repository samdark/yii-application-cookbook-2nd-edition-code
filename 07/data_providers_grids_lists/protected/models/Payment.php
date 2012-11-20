<?php

/**
 * This is the model class for table "payment".
 *
 * The followings are the available columns in table 'payment':
 * @property integer $payment_id
 * @property integer $customer_id
 * @property integer $staff_id
 * @property integer $rental_id
 * @property string $amount
 * @property string $payment_date
 * @property string $last_update
 *
 * The followings are the available model relations:
 * @property Customer $customer
 * @property Rental $rental
 * @property Staff $staff
 */
class Payment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Payment the static model class
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
		return 'payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_id, staff_id, last_update', 'required'),
			array('customer_id, staff_id, rental_id', 'numerical', 'integerOnly'=>true),
			array('amount', 'length', 'max'=>5),
			array('payment_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('payment_id, customer_id, staff_id, rental_id, amount, payment_date, last_update', 'safe', 'on'=>'search'),
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
			'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
			'rental' => array(self::BELONGS_TO, 'Rental', 'rental_id'),
			'staff' => array(self::BELONGS_TO, 'Staff', 'staff_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'payment_id' => 'Payment',
			'customer_id' => 'Customer',
			'staff_id' => 'Staff',
			'rental_id' => 'Rental',
			'amount' => 'Amount',
			'payment_date' => 'Payment Date',
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

		$criteria->compare('payment_id',$this->payment_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('staff_id',$this->staff_id);
		$criteria->compare('rental_id',$this->rental_id);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('payment_date',$this->payment_date,true);
		$criteria->compare('last_update',$this->last_update,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}