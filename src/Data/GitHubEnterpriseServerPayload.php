<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/GitHubEnterpriseServerPayload */
class GitHubEnterpriseServerPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|bool $success, public Optional|string $setupUrl, public Optional|string $installUrl, public Optional|string $webhookSecret, public Optional|Integration|null $integration, public Optional|GitHubIntegrationConnectDetails|null $gitHub)
	{
	}
}
