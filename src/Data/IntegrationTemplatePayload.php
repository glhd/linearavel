<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IntegrationTemplatePayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|IntegrationTemplate $integrationTemplate, public Optional|bool $success)
	{
	}
}
