<?php

/**
 * This is the model class for table "film".
 *
 * The followings are the available columns in table 'film':
 * @property integer $film_id
 * @property string $title
 * @property string $description
 * @property string $release_year
 * @property integer $language_id
 * @property integer $original_language_id
 * @property integer $rental_duration
 * @property string $rental_rate
 * @property integer $length
 * @property string $replacement_cost
 * @property string $rating
 * @property string $special_features
 * @property string $last_update
 *
 * The followings are the available model relations:
 * @property Language $language
 * @property Language $originalLanguage
 * @property Actor[] $actors
 * @property Category[] $categories
 * @property Inventory[] $inventories
 */
class Film extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Film the static model class
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
		return 'film';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('language_id, last_update', 'required'),
			array('language_id, original_language_id, rental_duration, length', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('release_year, rental_rate', 'length', 'max'=>4),
			array('replacement_cost, rating', 'length', 'max'=>5),
			array('description, special_features', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('film_id, title, description, release_year, language_id, original_language_id, rental_duration, rental_rate, length, replacement_cost, rating, special_features, last_update', 'safe', 'on'=>'search'),
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
			'language' => array(self::BELONGS_TO, 'Language', 'language_id'),
			'originalLanguage' => array(self::BELONGS_TO, 'Language', 'original_language_id'),
			'actors' => array(self::MANY_MANY, 'Actor', 'film_actor(film_id, actor_id)'),
			'categories' => array(self::MANY_MANY, 'Category', 'film_category(film_id, category_id)'),
			'inventories' => array(self::HAS_MANY, 'Inventory', 'film_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'film_id' => 'Film',
			'title' => 'Title',
			'description' => 'Description',
			'release_year' => 'Release Year',
			'language_id' => 'Language',
			'original_language_id' => 'Original Language',
			'rental_duration' => 'Rental Duration',
			'rental_rate' => 'Rental Rate',
			'length' => 'Length',
			'replacement_cost' => 'Replacement Cost',
			'rating' => 'Rating',
			'special_features' => 'Special Features',
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

		$criteria->compare('film_id',$this->film_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('release_year',$this->release_year,true);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('original_language_id',$this->original_language_id);
		$criteria->compare('rental_duration',$this->rental_duration);
		$criteria->compare('rental_rate',$this->rental_rate,true);
		$criteria->compare('length',$this->length);
		$criteria->compare('replacement_cost',$this->replacement_cost,true);
		$criteria->compare('rating',$this->rating,true);
		$criteria->compare('special_features',$this->special_features,true);
		$criteria->compare('last_update',$this->last_update,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}