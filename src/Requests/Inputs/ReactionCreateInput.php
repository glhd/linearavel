<?php

namespace Glhd\Linearavel\Requests\Inputs;

class ReactionCreateInput
{
	function __construct(public ?string $id = null, public ?string $emoji = null, public ?string $commentId = null, public ?string $projectUpdateId = null, public ?string $issueId = null)
	{
	}
}
