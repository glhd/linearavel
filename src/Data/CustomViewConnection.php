<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CustomViewConnection extends Data
{
	public function __construct(
		/** @var Collection<int, CustomViewEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, CustomView> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
