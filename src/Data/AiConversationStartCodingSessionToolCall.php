<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\AiConversationBaseToolCall;
use Glhd\Linearavel\Data\Contracts\AiConversationToolCall;
use Glhd\Linearavel\Data\Enums\AiConversationTool;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationStartCodingSessionToolCall */
class AiConversationStartCodingSessionToolCall extends Data implements AiConversationBaseToolCall, AiConversationToolCall
{
	public function __construct(public Optional|AiConversationTool $name, public Optional|AiConversationToolDisplayInfo $displayInfo, public Optional|string|null $rawArgs, public Optional|string|null $rawResult, public Optional|AiConversationStartCodingSessionToolCallArgs|null $args, public Optional|AiConversationStartCodingSessionToolCallResult|null $result)
	{
	}
}
