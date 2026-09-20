<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationGetSlackConversationHistoryToolCallResult */
class AiConversationGetSlackConversationHistoryToolCallResult extends Data
{
	public function __construct(public Optional|string|null $conversationUrl, public Optional|float|null $messageCount, public Optional|bool|null $hasMore, public Optional|string|null $error)
	{
	}
}
