<?php

class SoftDeleteBehaviorTest extends CDbTestCase
{
	protected $fixtures = array(
		'post' => 'Post',
	);

	public function testRemoved()
	{
		$postCount = Post::model()->removed()->count();
		$this->assertEquals(2, $postCount);
	}

	public function testNotRemoved()
	{
		$postCount = Post::model()->notRemoved()->count();
		$this->assertEquals(3, $postCount);
	}

	public function testRemove()
	{
		$post = Post::model()->findByPk(1);
		$post->remove()->save();

		$this->assertNull(Post::model()->notRemoved()->findByPk(1));
	}

	public function testRestore()
	{
		$post = Post::model()->findByPk(2);
		$post->restore()->save();

		$this->assertNotNull(Post::model()->notRemoved()->findByPk(2));
	}

	public function testIsDeleted()
	{
		$post = Post::model()->findByPk(1);
		$this->assertFalse($post->isRemoved());

		$post = Post::model()->findByPk(2);
		$this->assertTrue($post->isRemoved());
	}
}