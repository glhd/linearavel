<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CustomViewConnection extends Data
{
	function __construct(
		/** @var Collection<int, CustomViewEdge> */
		public Collection $edges,
		/** @var Collection<int, CustomView> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
