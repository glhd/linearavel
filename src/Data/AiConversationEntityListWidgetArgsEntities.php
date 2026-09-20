<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\AiConversationEntityListWidgetArgsEntitiesType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationEntityListWidgetArgsEntities */
class AiConversationEntityListWidgetArgsEntities extends Data
{
	public function __construct(public Optional|AiConversationEntityListWidgetArgsEntitiesType $type, public Optional|string $id, public Optional|string|null $note, public Optional|string|null $snapshot)
	{
	}
}
