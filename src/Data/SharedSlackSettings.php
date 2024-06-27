<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/SharedSlackSettings */
class SharedSlackSettings extends Data
{
	public function __construct(public Optional|string|null $teamName, public Optional|string|null $teamId)
	{
	}
}
