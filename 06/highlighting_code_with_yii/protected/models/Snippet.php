<?php

/**
 * This is the model class for table "snippet".
 *
 * The followings are the available columns in table 'snippet':
 * @property string $id
 * @property string $title
 * @property string $code
 * @property string $html
 * @property string $language
 */
class Snippet extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Snippet the static model class
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
		return 'snippet';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('title, code, language', 'required'),
			array('title', 'length', 'max'=>255),
			array('language', 'length', 'max' => 20),
		);
	}

	protected function afterValidate()
	{
		$highlighter = new CTextHighlighter();
		$highlighter->language = $this->language;
		$this->html = $highlighter->highlight($this->code);

		return parent::afterValidate();
	}

	public function getSupportedLanguages()
	{
		return array(
			'php' => 'PHP',
			'css' => 'CSS',
			'html' => 'HTML',
			'javascript' => 'JavaScript',
		);
	}
}