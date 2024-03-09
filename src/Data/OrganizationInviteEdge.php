<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OrganizationInviteEdge extends Data
{
	function __construct(public Optional|OrganizationInvite $node, public Optional|string $cursor)
	{
	}
}
