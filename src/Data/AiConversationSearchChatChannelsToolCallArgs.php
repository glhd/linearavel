<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\AiConversationPostChatMessageToolCallArgsPlatform;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationSearchChatChannelsToolCallArgs */
class AiConversationSearchChatChannelsToolCallArgs extends Data
{
	public function __construct(public Optional|AiConversationPostChatMessageToolCallArgsPlatform $platform, public Optional|string $filter)
	{
	}
}
