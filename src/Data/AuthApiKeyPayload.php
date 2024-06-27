<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AuthApiKeyPayload */
class AuthApiKeyPayload extends Data
{
	public function __construct(public Optional|bool $success, public Optional|AuthApiKey $authApiKey)
	{
	}
}
