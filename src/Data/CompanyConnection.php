<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/** @extends Connection<Company> */
class CompanyConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, CompanyEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Company> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
