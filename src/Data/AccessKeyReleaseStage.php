<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\ReleaseStageType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AccessKeyReleaseStage */
class AccessKeyReleaseStage extends Data
{
	public function __construct(public Optional|string $name, public Optional|ReleaseStageType $type)
	{
	}
}
