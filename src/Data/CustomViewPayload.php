<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CustomViewPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|CustomView $customView, public Optional|bool $success)
	{
	}
}
