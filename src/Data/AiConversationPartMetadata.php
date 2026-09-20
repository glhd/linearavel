<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\AiConversationPartPhase;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationPartMetadata */
class AiConversationPartMetadata extends Data
{
	public function __construct(public Optional|string $turnId, public Optional|string|null $evalLogId, public Optional|string|null $startedAt, public Optional|string|null $endedAt, public Optional|AiConversationPartPhase|null $phase, public Optional|string|null $feedback)
	{
	}
}
