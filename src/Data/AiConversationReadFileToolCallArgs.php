<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\AiConversationReadFileToolCallArgsMode;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationReadFileToolCallArgs */
class AiConversationReadFileToolCallArgs extends Data
{
	public function __construct(public Optional|string|null $assetUrl, public Optional|string|null $name, public Optional|AiConversationReadFileToolCallArgsMode|null $mode, public Optional|string|null $query)
	{
	}
}
