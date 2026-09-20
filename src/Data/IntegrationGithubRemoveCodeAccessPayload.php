<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\GitHubRemoveCodeAccessAction;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IntegrationGithubRemoveCodeAccessPayload */
class IntegrationGithubRemoveCodeAccessPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|GitHubRemoveCodeAccessAction $action)
	{
	}
}
