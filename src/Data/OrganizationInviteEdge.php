<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/OrganizationInviteEdge */
class OrganizationInviteEdge extends Data
{
	public function __construct(public Optional|OrganizationInvite $node, public Optional|string $cursor)
	{
	}
}
