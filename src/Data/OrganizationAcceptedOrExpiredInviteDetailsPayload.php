<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OrganizationAcceptedOrExpiredInviteDetailsPayload extends Data
{
	function __construct(public Optional|OrganizationInviteStatus $status)
	{
	}
}
