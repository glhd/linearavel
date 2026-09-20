<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationPostChatMessageToolCallResult */
class AiConversationPostChatMessageToolCallResult extends Data
{
	public function __construct(public Optional|bool $posted, public Optional|string|null $error, public Optional|string|null $message, public Optional|string|null $conversationUrl, public Optional|AiConversationPostChatMessageToolCallResultDestination|null $destination)
	{
	}
}
