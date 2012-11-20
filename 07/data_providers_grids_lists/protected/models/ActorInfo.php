<?php

/**
 * This is the model class for table "actor_info".
 *
 * The followings are the available columns in table 'actor_info':
 * @property integer $actor_id
 * @property string $first_name
 * @property string $last_name
 * @property string $film_info
 */
class ActorInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ActorInfo the static model class
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
		return 'actor_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('actor_id', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>45),
			array('film_info', 'length', 'max'=>341),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('actor_id, first_name, last_name, film_info', 'safe', 'on'=>'search'),
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
			'actor_id' => 'Actor',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'film_info' => 'Film Info',
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

		$criteria->compare('actor_id',$this->actor_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('film_info',$this->film_info,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}