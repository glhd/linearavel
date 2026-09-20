<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\AiConversationGetSlackConversationHistoryToolCallArgsTargetType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationGetSlackConversationHistoryToolCallArgs */
class AiConversationGetSlackConversationHistoryToolCallArgs extends Data
{
	public function __construct(public Optional|AiConversationGetSlackConversationHistoryToolCallArgsTargetType|null $targetType, public Optional|string|null $channel)
	{
	}
}
