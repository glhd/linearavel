<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/SlackChannelConnectPayload */
class SlackChannelConnectPayload extends Data
{
	public function __construct(
		public Optional|float $lastSyncId,
		public Optional|bool $success,
		public Optional|bool $addBot,
		public Optional|Integration|null $integration,
		public Optional|bool|null $nudgeToConnectMainSlackIntegration,
		public Optional|bool|null $nudgeToUpdateMainSlackIntegration
	) {
	}
}
