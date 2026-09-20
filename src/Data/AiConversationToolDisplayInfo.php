<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationToolDisplayInfo */
class AiConversationToolDisplayInfo extends Data
{
	public function __construct(public Optional|string $icon, public Optional|string $activeLabel, public Optional|string $inactiveLabel, public Optional|string|null $detail, public Optional|string|null $result)
	{
	}
}
