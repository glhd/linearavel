<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OrganizationInviteConnection extends Data
{
	function __construct(
		/** @var Collection<int, OrganizationInviteEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, OrganizationInvite> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
