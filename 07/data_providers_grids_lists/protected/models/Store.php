<?php

/**
 * This is the model class for table "store".
 *
 * The followings are the available columns in table 'store':
 * @property integer $store_id
 * @property integer $manager_staff_id
 * @property integer $address_id
 * @property string $last_update
 *
 * The followings are the available model relations:
 * @property Customer[] $customers
 * @property Inventory[] $inventories
 * @property Staff[] $staffs
 * @property Address $address
 * @property Staff $managerStaff
 */
class Store extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Store the static model class
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
		return 'store';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('manager_staff_id, address_id, last_update', 'required'),
			array('manager_staff_id, address_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('store_id, manager_staff_id, address_id, last_update', 'safe', 'on'=>'search'),
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
			'customers' => array(self::HAS_MANY, 'Customer', 'store_id'),
			'inventories' => array(self::HAS_MANY, 'Inventory', 'store_id'),
			'staffs' => array(self::HAS_MANY, 'Staff', 'store_id'),
			'address' => array(self::BELONGS_TO, 'Address', 'address_id'),
			'managerStaff' => array(self::BELONGS_TO, 'Staff', 'manager_staff_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'store_id' => 'Store',
			'manager_staff_id' => 'Manager Staff',
			'address_id' => 'Address',
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

		$criteria->compare('store_id',$this->store_id);
		$criteria->compare('manager_staff_id',$this->manager_staff_id);
		$criteria->compare('address_id',$this->address_id);
		$criteria->compare('last_update',$this->last_update,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}