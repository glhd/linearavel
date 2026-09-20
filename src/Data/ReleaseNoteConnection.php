<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<ReleaseNote>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ReleaseNoteConnection
 */
class ReleaseNoteConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, ReleaseNoteEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ReleaseNote> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
