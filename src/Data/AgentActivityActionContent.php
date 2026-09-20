<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\AgentActivityContent;
use Glhd\Linearavel\Data\Enums\AgentActivityType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AgentActivityActionContent */
class AgentActivityActionContent extends Data implements AgentActivityContent
{
	public function __construct(public Optional|AgentActivityType $type, public Optional|string $action, public Optional|string $parameter, public Optional|string|null $result, public Optional|string|null $resultData)
	{
	}
}
