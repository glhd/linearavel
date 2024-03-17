<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\PushSubscriptionType;

class PushSubscriptionCreateInput
{
	function __construct(public string $data, public ?string $id = null, public ?string $userId = null, public ?PushSubscriptionType $type = null)
	{
	}
}
