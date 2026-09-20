<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\AiConversationEntityListWidgetArgsAction;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationEntityListWidgetArgs */
class AiConversationEntityListWidgetArgs extends Data
{
	public function __construct(
		/** @var Collection<int, AiConversationEntityListWidgetArgsEntities> */
		public Optional|Collection $entities,
		public Optional|float|null $count,
		public Optional|AiConversationEntityListWidgetArgsAction|null $action
	) {
	}
}
