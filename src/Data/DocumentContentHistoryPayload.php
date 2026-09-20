<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/DocumentContentHistoryPayload */
class DocumentContentHistoryPayload extends Data
{
	public function __construct(
		/** @var Collection<int, DocumentContentHistoryType> */
		public Optional|Collection $history,
		public Optional|bool $success
	) {
	}
}
