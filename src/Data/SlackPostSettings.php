<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\SlackChannelType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/SlackPostSettings */
class SlackPostSettings extends Data
{
	public function __construct(public Optional|string $channel, public Optional|string $channelId, public Optional|string $configurationUrl, public Optional|SlackChannelType|null $channelType)
	{
	}
}
