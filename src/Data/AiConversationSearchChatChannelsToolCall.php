<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\AiConversationBaseToolCall;
use Glhd\Linearavel\Data\Contracts\AiConversationToolCall;
use Glhd\Linearavel\Data\Enums\AiConversationTool;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationSearchChatChannelsToolCall */
class AiConversationSearchChatChannelsToolCall extends Data implements AiConversationBaseToolCall, AiConversationToolCall
{
	public function __construct(public Optional|AiConversationTool $name, public Optional|AiConversationToolDisplayInfo $displayInfo, public Optional|string|null $rawArgs, public Optional|string|null $rawResult, public Optional|AiConversationSearchChatChannelsToolCallArgs|null $args, public Optional|AiConversationSearchChatChannelsToolCallResult|null $result)
	{
	}
}
