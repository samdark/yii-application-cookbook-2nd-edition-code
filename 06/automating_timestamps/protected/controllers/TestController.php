<?php
class TestController extends CController
{
	public function actionIndex()
	{
		$post = new Post();
		$post->title = "test title";
		$post->text = "test text";
		$post->save();

		// we need to refresh the model since CTimestampBehavior uses
		// CDbExpression to set creation date which has to be evaluated by the database
		$post->refresh();

		echo "Post has been created on " . date('r', $post->created_on);
	}
}