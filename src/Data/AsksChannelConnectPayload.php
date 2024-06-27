<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AsksChannelConnectPayload */
class AsksChannelConnectPayload extends Data
{
	public function __construct(
		public Optional|float $lastSyncId,
		public Optional|bool $success,
		public Optional|SlackChannelNameMapping $mapping,
		public Optional|bool $addBot,
		public Optional|Integration|null $integration
	) {
	}
}
