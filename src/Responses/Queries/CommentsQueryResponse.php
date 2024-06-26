<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\CommentConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class CommentsQueryResponse extends LinearResponse
{
	public function resolve(): CommentConnection
	{
		return CommentConnection::from($this->json('data.comments'));
	}
}
