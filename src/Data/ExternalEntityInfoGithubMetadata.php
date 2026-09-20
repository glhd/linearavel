<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\ExternalEntityInfoMetadata;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ExternalEntityInfoGithubMetadata */
class ExternalEntityInfoGithubMetadata extends Data implements ExternalEntityInfoMetadata
{
	public function __construct(public Optional|string|null $repo, public Optional|string|null $owner, public Optional|float|null $number)
	{
	}
}
