<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\CommentPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class CommentResolveMutationResponse extends LinearResponse
{
	public function resolve(): CommentPayload
	{
		return CommentPayload::from($this->json('data.commentResolve'));
	}
}
