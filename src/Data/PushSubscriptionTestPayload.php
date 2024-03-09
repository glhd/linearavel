<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PushSubscriptionTestPayload extends Data
{
	function __construct(public Optional|bool $success)
	{
	}
}
