<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<AiPromptProgress>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiPromptProgressConnection
 */
class AiPromptProgressConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, AiPromptProgressEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, AiPromptProgress> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
