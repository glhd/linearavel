<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/** @extends Connection<Template> */
class TemplateConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, TemplateEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Template> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
