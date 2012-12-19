<?php

class NewCommentEvent extends CModelEvent
{
	/**
	 * @var Comment
	 */
	public $comment;
	/**
	 * @var Post
	 */
	public $post;
}
