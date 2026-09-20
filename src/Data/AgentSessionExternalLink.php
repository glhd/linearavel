<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AgentSessionExternalLink */
class AgentSessionExternalLink extends Data
{
	public function __construct(public Optional|string $url, public Optional|string $label)
	{
	}
}
