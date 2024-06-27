<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/GitHubCommitIntegrationPayload */
class GitHubCommitIntegrationPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|bool $success, public Optional|string $webhookSecret, public Optional|Integration|null $integration)
	{
	}
}
