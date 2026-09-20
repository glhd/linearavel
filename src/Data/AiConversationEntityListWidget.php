<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\AiConversationBaseWidget;
use Glhd\Linearavel\Data\Contracts\AiConversationWidget;
use Glhd\Linearavel\Data\Enums\AiConversationWidgetName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationEntityListWidget */
class AiConversationEntityListWidget extends Data implements AiConversationBaseWidget, AiConversationWidget
{
	public function __construct(public Optional|AiConversationWidgetName $name, public Optional|string|null $rawArgs, public Optional|AiConversationWidgetDisplayInfo|null $displayInfo, public Optional|AiConversationEntityListWidgetArgs|null $args)
	{
	}
}
