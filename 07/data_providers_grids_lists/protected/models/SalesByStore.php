<?php

/**
 * This is the model class for table "sales_by_store".
 *
 * The followings are the available columns in table 'sales_by_store':
 * @property string $store
 * @property string $manager
 * @property string $total_sales
 */
class SalesByStore extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SalesByStore the static model class
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
		return 'sales_by_store';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('store', 'length', 'max'=>101),
			array('manager', 'length', 'max'=>91),
			array('total_sales', 'length', 'max'=>27),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('store, manager, total_sales', 'safe', 'on'=>'search'),
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
			'store' => 'Store',
			'manager' => 'Manager',
			'total_sales' => 'Total Sales',
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

		$criteria->compare('store',$this->store,true);
		$criteria->compare('manager',$this->manager,true);
		$criteria->compare('total_sales',$this->total_sales,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}