<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\ExternalEntityInfoMetadata;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ExternalEntitySlackMetadata */
class ExternalEntitySlackMetadata extends Data implements ExternalEntityInfoMetadata
{
	public function __construct(public Optional|bool $isFromSlack, public Optional|string|null $channelId, public Optional|string|null $channelName, public Optional|string|null $messageUrl)
	{
	}
}
