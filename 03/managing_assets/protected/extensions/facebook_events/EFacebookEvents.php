<?php
class EFacebookEvents extends CWidget
{
	public $keyword;

	private $loadingImageUrl;
	protected $url = "https://graph.facebook.com/search?q=%s&type=event&callback=?";

	protected function getUrl()
	{
		return sprintf($this->url, urlencode($this->keyword));
	}

	public function init()
	{
		$assetsDir = dirname(__FILE__).'/assets';
		$cs = Yii::app()->getClientScript();

		$cs->registerCoreScript("jquery");

		// Publishing and registering JavaScript file
		$cs->registerScriptFile(
			Yii::app()->assetManager->publish(
				$assetsDir.'/facebook_events.js'
			),
			CClientScript::POS_END
		);

		// Publishing and registering CSS file
		$cs->registerCssFile(
			Yii::app()->assetManager->publish(
				$assetsDir.'/facebook_events.css'
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
			'keyword' => $this->keyword,
		));
	}
}
