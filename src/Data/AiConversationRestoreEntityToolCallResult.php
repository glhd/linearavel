<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationRestoreEntityToolCallResult */
class AiConversationRestoreEntityToolCallResult extends Data
{
	public function __construct(
		/** @var Collection<int, AiConversationCreateEntityToolCallResultCreatedEntities> */
		public Optional|Collection|null $restoredEntities
	) {
	}
}
