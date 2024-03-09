<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class EmailIntakeAddressPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|EmailIntakeAddress $emailIntakeAddress, public Optional|bool $success)
	{
	}
}
