<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ReactionPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ReactionCreateMutationResponse extends LinearResponse
{
	public function resolve(): ReactionPayload
	{
		return ReactionPayload::from($this->json('data.reactionCreate'));
	}
}
