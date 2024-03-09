<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class NotificationEdge extends Data
{
	function __construct(public Optional|Notification $node, public Optional|string $cursor)
	{
	}
}
