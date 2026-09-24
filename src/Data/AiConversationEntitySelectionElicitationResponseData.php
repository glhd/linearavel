<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\AiConversationElicitationResponseData;
use Glhd\Linearavel\Data\Enums\AiConversationElicitationKind;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationEntitySelectionElicitationResponseData */
class AiConversationEntitySelectionElicitationResponseData extends Data implements AiConversationElicitationResponseData
{
	public function __construct(
		public Optional|AiConversationElicitationKind $kind,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $selectedEntityIds
	) {
	}
}
