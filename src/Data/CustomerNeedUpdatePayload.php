<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/CustomerNeedUpdatePayload */
class CustomerNeedUpdatePayload extends Data
{
	public function __construct(
		public Optional|float $lastSyncId,
		public Optional|CustomerNeed $need,
		public Optional|bool $success,
		/** @var Collection<int, CustomerNeed> */
		public Optional|Collection $updatedRelatedNeeds
	) {
	}
}
