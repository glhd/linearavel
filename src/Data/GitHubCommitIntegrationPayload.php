<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class GitHubCommitIntegrationPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|Integration|null $integration = null, public Optional|bool $success, public Optional|string $webhookSecret)
	{
	}
}
