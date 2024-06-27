<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\PushSubscriptionType;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/PushSubscriptionCreateInput */
class PushSubscriptionCreateInput
{
	public function __construct(public string $data, public ?string $id = null, public ?string $userId = null, public ?PushSubscriptionType $type = null)
	{
	}
}
