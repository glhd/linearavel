<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\CodingSessionsDisabledReason;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/OAuthApplicationCodingSessionTrustedSource */
class OAuthApplicationCodingSessionTrustedSource extends Data
{
	public function __construct(public Optional|bool $enabled, public Optional|CodingSessionsDisabledReason|null $disabledReason)
	{
	}
}
