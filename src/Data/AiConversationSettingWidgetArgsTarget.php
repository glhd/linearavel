<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationSettingWidgetArgsTarget */
class AiConversationSettingWidgetArgsTarget extends Data
{
	public function __construct(public Optional|string $type, public Optional|string|null $id)
	{
	}
}
