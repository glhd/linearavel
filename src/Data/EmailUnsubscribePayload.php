<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/EmailUnsubscribePayload */
class EmailUnsubscribePayload extends Data
{
	public function __construct(public Optional|bool $success)
	{
	}
}
