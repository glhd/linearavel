<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/OriginInstallationDetails */
class OriginInstallationDetails extends Data
{
	public function __construct(public Optional|string $ownerSlug, public Optional|string $repositorySelection, public Optional|bool $installedByMatchesUser, public Optional|string|null $ownerType, public Optional|string|null $installedByEmail, public Optional|string|null $installedByName)
	{
	}
}
