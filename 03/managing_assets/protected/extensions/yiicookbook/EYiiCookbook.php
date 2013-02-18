<?php
class EYiiCookbook extends CWidget
{
	public $object;

	private $loadingImageUrl;
	protected $url = "http://yiicookbook.org/api/%s?callback=?";

	protected function getUrl()
	{
		return sprintf($this->url, urlencode($this->object));
	}

	public function init()
	{
		$assetsDir = dirname(__FILE__).'/assets';
		$cs = Yii::app()->getClientScript();

		$cs->registerCoreScript("jquery");

		// Publishing and registering JavaScript file
		$cs->registerScriptFile(
			Yii::app()->assetManager->publish(
				$assetsDir.'/yiicookbook.js'
			),
			CClientScript::POS_END
		);

		// Publishing and registering CSS file
		$cs->registerCssFile(
			Yii::app()->assetManager->publish(
				$assetsDir.'/yiicookbook.css'
			)
		);

		// Publishing image. publish returns the actual URL
		// asset can be accessed with
		$this->loadingImageUrl = Yii::app()->assetManager->publish(
	    		$assetsDir.'/ajax-loader.gif'
		);
	}

	public function run()
	{
		$this->render("body", array(
			'url' => $this->getUrl(),
			'loadingImageUrl' => $this->loadingImageUrl,
			'object' => $this->object,
		));
	}
}
