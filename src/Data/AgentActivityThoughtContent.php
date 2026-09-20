<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\AgentActivityContent;
use Glhd\Linearavel\Data\Enums\AgentActivityType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AgentActivityThoughtContent */
class AgentActivityThoughtContent extends Data implements AgentActivityContent
{
	public function __construct(public Optional|AgentActivityType $type, public Optional|string $body, public Optional|string $bodyData)
	{
	}
}
