<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TemplateConnection extends Data
{
	function __construct(
		/** @var Collection<int, TemplateEdge> */
		public Collection $edges,
		/** @var Collection<int, Template> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
