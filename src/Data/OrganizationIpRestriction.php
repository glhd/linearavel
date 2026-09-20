<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/OrganizationIpRestriction */
class OrganizationIpRestriction extends Data
{
	public function __construct(public Optional|string $range, public Optional|string $type, public Optional|bool $enabled, public Optional|string|null $description)
	{
	}
}
