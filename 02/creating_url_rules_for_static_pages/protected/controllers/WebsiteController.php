<?php
class WebsiteController extends CController
{
	public function actionPage($alias)
	{
		echo "Page is $alias.";
	}
}
