<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/WebhookFailureEvent */
class WebhookFailureEvent extends Data
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		public Optional|Webhook $webhook,
		public Optional|string $url,
		public Optional|string $executionId,
		public Optional|float|null $httpStatus,
		public Optional|string|null $responseOrError
	) {
	}
}
