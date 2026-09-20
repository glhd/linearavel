<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/OAuthApplicationCreatePayload */
class OAuthApplicationCreatePayload extends Data
{
	public function __construct(public Optional|bool $success, public Optional|OAuthApplication $application, public Optional|string|null $clientSecret, public Optional|string|null $webhookSecret)
	{
	}
}
