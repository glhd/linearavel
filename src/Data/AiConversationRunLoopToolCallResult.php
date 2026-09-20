<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationRunLoopToolCallResult */
class AiConversationRunLoopToolCallResult extends Data
{
	public function __construct(
		public Optional|string $conversationId,
		public Optional|string $url,
		/** @var Collection<int, AiConversationCreateEntityToolCallResultCreatedEntities> */
		public Optional|Collection|null $createdEntities
	) {
	}
}
