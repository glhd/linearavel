<?php

namespace Glhd\Linearavel\Data\Casts;

use Attribute;
use DateTimeInterface;
use Spatie\LaravelData\Attributes\GetsCast;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;

#[Attribute(Attribute::TARGET_PROPERTY)]
class LinearDate implements GetsCast
{
	public function get(): Cast
	{
		return new DateTimeInterfaceCast(DateTimeInterface::RFC3339_EXTENDED);
	}
}
