<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\SLADayCountType;
use Glhd\Linearavel\Data\Enums\SLAStartMode;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/SlaConfiguration */
class SlaConfiguration extends Data
{
	public function __construct(public Optional|string $id, public Optional|string $name, public Optional|string $conditions, public Optional|bool $removesSla, public Optional|float|null $sla, public Optional|SLADayCountType|null $slaType, public Optional|SLAStartMode|null $startMode)
	{
	}
}
