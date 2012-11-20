<?php

/**
 * This is the model class for table "inventory".
 *
 * The followings are the available columns in table 'inventory':
 * @property integer $inventory_id
 * @property integer $film_id
 * @property integer $store_id
 * @property string $last_update
 *
 * The followings are the available model relations:
 * @property Film $film
 * @property Store $store
 * @property Rental[] $rentals
 */
class Inventory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Inventory the static model class
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
		return 'inventory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('film_id, store_id, last_update', 'required'),
			array('film_id, store_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('inventory_id, film_id, store_id, last_update', 'safe', 'on'=>'search'),
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
			'film' => array(self::BELONGS_TO, 'Film', 'film_id'),
			'store' => array(self::BELONGS_TO, 'Store', 'store_id'),
			'rentals' => array(self::HAS_MANY, 'Rental', 'inventory_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'inventory_id' => 'Inventory',
			'film_id' => 'Film',
			'store_id' => 'Store',
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

		$criteria->compare('inventory_id',$this->inventory_id);
		$criteria->compare('film_id',$this->film_id);
		$criteria->compare('store_id',$this->store_id);
		$criteria->compare('last_update',$this->last_update,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}