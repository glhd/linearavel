<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReactionCreateInput */
class ReactionCreateInput
{
	public function __construct(public ?string $id = null, public ?string $emoji = null, public ?string $commentId = null, public ?string $projectUpdateId = null, public ?string $issueId = null)
	{
	}
}
