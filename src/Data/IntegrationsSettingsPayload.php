<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IntegrationsSettingsPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|IntegrationsSettings $integrationsSettings, public Optional|bool $success)
	{
	}
}
