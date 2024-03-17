<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CompanyConnection extends Data
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