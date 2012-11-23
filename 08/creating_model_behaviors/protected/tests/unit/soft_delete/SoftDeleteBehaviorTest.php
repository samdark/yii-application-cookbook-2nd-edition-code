<?php
class SoftDeleteBehaviorTest extends CDbTestCase
{
	protected $fixtures = array(
		'post' => 'Post',
	);

	function testRemoved()
	{
		$postCount = Post::model()->removed()->count();
		$this->assertEquals(2, $postCount);
	}

	function testNotRemoved()
	{
		$postCount = Post::model()->notRemoved()->count();
		$this->assertEquals(3, $postCount);
	}

	function testRemove()
	{
		$post = Post::model()->findByPk(1);
		$post->remove()->save();

		$this->assertNull(Post::model()->notRemoved()->findByPk(1));
	}

	function testRestore()
	{
		$post = Post::model()->findByPk(2);
		$post->restore()->save();

		$this->assertNotNull(Post::model()->notRemoved()->findByPk(2));
	}

	function testIsDeleted()
	{
		$post = Post::model()->findByPk(1);
		$this->assertFalse($post->isRemoved());

		$post = Post::model()->findByPk(2);
		$this->assertTrue($post->isRemoved());
	}
}