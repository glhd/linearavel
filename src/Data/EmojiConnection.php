<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/** @extends Connection<Emoji> */
class EmojiConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, EmojiEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Emoji> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
