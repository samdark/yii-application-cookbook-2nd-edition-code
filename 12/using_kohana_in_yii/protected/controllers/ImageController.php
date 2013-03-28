<?php
class ImageController extends CController
{
	public function actionIndex()
	{
		$image = new Image_GD(Yii::getPathOfAlias("system")."/yii-powered.png");
		$image->resize(800, 150);
		Yii::app()->request->sendFile("image.png", $image->render());
	}
}