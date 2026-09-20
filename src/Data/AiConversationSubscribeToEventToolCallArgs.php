<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\AiConversationSubscribeToEventToolCallArgsKind;
use Glhd\Linearavel\Data\Enums\AiConversationSubscribeToEventToolCallArgsType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationSubscribeToEventToolCallArgs */
class AiConversationSubscribeToEventToolCallArgs extends Data
{
	public function __construct(public Optional|AiConversationSubscribeToEventToolCallArgsType $type, public Optional|string|null $subscriptionId, public Optional|AiConversationSubscribeToEventToolCallArgsKind|null $kind, public Optional|string|null $message, public Optional|string|null $endsAt)
	{
	}
}
