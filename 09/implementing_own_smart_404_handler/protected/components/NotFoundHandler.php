<?php
class NotFoundHandler
{
	public static function handle(CExceptionEvent $event)
	{
		$exception = $event->exception;

		if(get_class($exception)=="CHttpException" && $exception->statusCode===404)
		{
			$pathParts = explode('/', Yii::app()->getRequest()->getRequestUri());
			$pathPart = array_pop($pathParts);

			$criteria = new CDbCriteria();
			$criteria->addSearchCondition('alias', $pathPart);
			$criteria->limit = 5;

			$models = Article::model()->findAll($criteria);

			$controller = new CController(null);
			$controller->renderPartial('//error/404', array(
				'models' => $models,
			));
			$event->handled = true;
		}
	}
}
