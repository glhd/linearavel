<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationNavigateToPageToolCallArgs */
class AiConversationNavigateToPageToolCallArgs extends Data
{
	public function __construct(
		/** @var Collection<int, AiConversationNavigateToPageToolCallArgsEntities> */
		public Optional|Collection $entities
	) {
	}
}
