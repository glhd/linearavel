<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class EmojiConnection extends Data
{
	function __construct(
		/** @var Collection<int, EmojiEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Emoji> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
