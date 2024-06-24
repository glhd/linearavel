<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Comment;
use Glhd\Linearavel\Responses\LinearResponse;

class CommentResponse extends LinearResponse
{
	public function resolve(): Comment
	{
		return Comment::from($this->json('data.comment'));
	}
}
