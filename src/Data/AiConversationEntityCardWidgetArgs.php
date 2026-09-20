<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\AiConversationEntityCardWidgetArgsAction;
use Glhd\Linearavel\Data\Enums\AiConversationEntityCardWidgetArgsType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationEntityCardWidgetArgs */
class AiConversationEntityCardWidgetArgs extends Data
{
	public function __construct(public Optional|AiConversationEntityCardWidgetArgsType $type, public Optional|string $id, public Optional|string|null $note, public Optional|AiConversationEntityCardWidgetArgsAction|null $action, public Optional|string|null $actionSummary, public Optional|string|null $snapshot)
	{
	}
}
