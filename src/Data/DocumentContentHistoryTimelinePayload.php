<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/DocumentContentHistoryTimelinePayload */
class DocumentContentHistoryTimelinePayload extends Data
{
	public function __construct(
		/** @var Collection<int, DocumentContentHistoryType> */
		public Optional|Collection $history,
		/** @var Collection<int, DocumentContentHistoryCheckpointType> */
		public Optional|Collection $checkpoints,
		public Optional|bool $success
	) {
	}
}
