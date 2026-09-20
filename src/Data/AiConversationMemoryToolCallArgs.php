<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\AiConversationMemoryToolCallArgsAction;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationMemoryToolCallArgs */
class AiConversationMemoryToolCallArgs extends Data
{
	public function __construct(public Optional|AiConversationMemoryToolCallArgsAction $action, public Optional|string|null $name)
	{
	}
}
