<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationNavigateToPageToolCallResult */
class AiConversationNavigateToPageToolCallResult extends Data
{
	public function __construct(
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $urls
	) {
	}
}
