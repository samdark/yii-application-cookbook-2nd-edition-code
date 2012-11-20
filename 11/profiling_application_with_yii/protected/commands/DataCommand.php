<?php
class DataCommand extends CConsoleCommand
{
	public function actionIndex()
	{
		$db = Yii::app()->db;

		echo "Creating tags.\n";
		for($t=1; $t<=50; $t++)
		{
			$db->createCommand()->insert('tbl_tag', array(
				'name' => "tag $t",
				'frequency' => rand(1, 20),
			));
		}
		echo "Done.\n";

		for($i=1; $i<=1000; $i++)
		{
			$tags = array();
			for($rt=1; $rt<=10; $rt++)
			{
				$tags[] = "tag ".rand(1, 100);
			}

			$db->createCommand()->insert('tbl_post', array(
				'title' => "Post #$i",
				'content' => "<strong>Hello!</strong> This is the content #$i",
				'tags' => implode(", ", $tags),
				'status' => Post::STATUS_PUBLISHED,
				'create_time' => time(),
				'update_time' => time(),
				'author_id' => 1,
			));

			$postId = $db->getLastInsertID();

			for($j=1; $j<=10; $j++)
			{
				$db->createCommand()->insert('tbl_comment', array(
					'content' => "Comment text $j.",
					'status' => Comment::STATUS_APPROVED,
					'create_time' => time(),
					'author' => "Commenter $j",
					'email' => "commenter$j@example.com",
					'url' => "http://example.com/",
					'post_id' => $postId,
				));
			}

			if($i%50==0)
				echo "\nAdded $i posts.\n";
		}

		echo "All done.\n";
	}
}
