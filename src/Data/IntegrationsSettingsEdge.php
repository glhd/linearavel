<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IntegrationsSettingsEdge extends Data
{
	public function __construct(public Optional|IntegrationsSettings $node, public Optional|string $cursor)
	{
	}
}
