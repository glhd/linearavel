<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationListCodingSessionsToolCallResultAgentSessions */
class AiConversationListCodingSessionsToolCallResultAgentSessions extends Data
{
	public function __construct(
		public Optional|string $type,
		public Optional|string $id,
		/** @var Collection<int, AiConversationSearchEntitiesToolCallResultEntities> */
		public Optional|Collection|null $pullRequests
	) {
	}
}
