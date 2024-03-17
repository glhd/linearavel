<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssuePriorityValue extends Data
{
	public function __construct(public Optional|int $priority, public Optional|string $label)
	{
	}
}
