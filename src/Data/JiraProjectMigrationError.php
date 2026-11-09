<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\JiraProjectMigrationErrorCode;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/JiraProjectMigrationError */
class JiraProjectMigrationError extends Data
{
	public function __construct(public Optional|JiraProjectMigrationErrorCode $code, public Optional|string $message)
	{
	}
}
