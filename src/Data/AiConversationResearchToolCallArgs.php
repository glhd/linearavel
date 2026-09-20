<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationResearchToolCallArgs */
class AiConversationResearchToolCallArgs extends Data
{
	public function __construct(
		public Optional|string $context,
		public Optional|string $query,
		/** @var Collection<int, AiConversationSearchEntitiesToolCallResultEntities> */
		public Optional|Collection|null $subjects
	) {
	}
}
