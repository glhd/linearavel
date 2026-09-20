<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/GitLabTestConnectionPayload */
class GitLabTestConnectionPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|bool $success, public Optional|Integration|null $integration, public Optional|GitHubIntegrationConnectDetails|null $gitHub, public Optional|string|null $error, public Optional|string|null $errorResponseBody, public Optional|string|null $errorResponseHeaders, public Optional|string|null $errorRequest)
	{
	}
}
