<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CommentConnection extends Data
{
	public function __construct(
		/** @var Collection<int, CommentEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Comment> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
