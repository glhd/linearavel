<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/OrganizationQuota */
class OrganizationQuota extends Data implements Node
{
	public function __construct(public Optional|string $id, public Optional|string $key, public Optional|float $limit, public Optional|string $name, public Optional|string $description)
	{
	}
}
