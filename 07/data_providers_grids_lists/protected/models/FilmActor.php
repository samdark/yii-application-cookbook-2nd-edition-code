<?php

/**
 * This is the model class for table "film_actor".
 *
 * The followings are the available columns in table 'film_actor':
 * @property integer $actor_id
 * @property integer $film_id
 * @property string $last_update
 */
class FilmActor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FilmActor the static model class
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
		return 'film_actor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('actor_id, film_id, last_update', 'required'),
			array('actor_id, film_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('actor_id, film_id, last_update', 'safe', 'on'=>'search'),
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
			'film_id' => 'Film',
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

		$criteria->compare('actor_id',$this->actor_id);
		$criteria->compare('film_id',$this->film_id);
		$criteria->compare('last_update',$this->last_update,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}