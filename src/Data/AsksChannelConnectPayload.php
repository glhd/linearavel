<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AsksChannelConnectPayload extends Data
{
	function __construct(
		public Optional|float $lastSyncId,
		public Optional|Integration|null $integration,
		public Optional|bool $success,
		public Optional|SlackChannelNameMapping $mapping,
		public Optional|bool $addBot
	) {
	}
}
