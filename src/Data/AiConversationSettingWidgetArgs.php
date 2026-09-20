<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationSettingWidgetArgs */
class AiConversationSettingWidgetArgs extends Data
{
	public function __construct(public Optional|string $id, public Optional|AiConversationSettingWidgetArgsTarget|null $target)
	{
	}
}
