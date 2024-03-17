<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SlackAsksTeamSettings extends Data
{
	public function __construct(public Optional|string $id, public Optional|bool $hasDefaultAsk)
	{
	}
}
