<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationStartCodingSessionToolCallResult */
class AiConversationStartCodingSessionToolCallResult extends Data
{
	public function __construct(
		public Optional|AiConversationSearchEntitiesToolCallResultEntities $agentSession,
		/** @var Collection<int, AiConversationSearchEntitiesToolCallResultEntities> */
		public Optional|Collection|null $pullRequests,
		/** @var Collection<int, AiConversationSearchEntitiesToolCallResultEntities> */
		public Optional|Collection|null $entities
	) {
	}
}
