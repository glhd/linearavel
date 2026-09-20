<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\InitiativeUpdateHealthType;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InitiativeUpdateCreateInput */
class InitiativeUpdateCreateInput
{
	public function __construct(public string $initiativeId, public ?string $id = null, public ?string $body = null, public ?string $bodyData = null, public ?InitiativeUpdateHealthType $health = null, public ?bool $isDiffHidden = null)
	{
	}
}
