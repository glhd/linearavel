<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/** @extends Connection<OrganizationInvite> */
class OrganizationInviteConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, OrganizationInviteEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, OrganizationInvite> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
