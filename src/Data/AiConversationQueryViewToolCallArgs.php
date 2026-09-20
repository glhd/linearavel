<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\AiConversationQueryViewToolCallArgsMode;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationQueryViewToolCallArgs */
class AiConversationQueryViewToolCallArgs extends Data
{
	public function __construct(public Optional|AiConversationQueryViewToolCallArgsView $view, public Optional|AiConversationQueryViewToolCallArgsMode $mode, public Optional|string|null $filter)
	{
	}
}
