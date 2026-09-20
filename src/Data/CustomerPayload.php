<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/CustomerPayload */
class CustomerPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|Customer $customer, public Optional|bool $success)
	{
	}
}
