<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\ExternalEntityInfoMetadata;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ExternalEntityInfoJiraMetadata */
class ExternalEntityInfoJiraMetadata extends Data implements ExternalEntityInfoMetadata
{
	public function __construct(public Optional|string|null $issueKey, public Optional|string|null $projectId, public Optional|string|null $issueTypeId)
	{
	}
}
