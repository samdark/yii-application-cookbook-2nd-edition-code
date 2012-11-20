<?php
class WebsiteController extends CController
{
	public function actionIndex()
	{
		echo "index";
	}

	public function actionPage($alias)
	{
		echo "Page is $alias.";
	}
}
