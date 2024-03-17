<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\SlackChannelType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SlackPostSettings extends Data
{
	public function __construct(public Optional|string $channel, public Optional|string $channelId, public Optional|string $configurationUrl, public Optional|SlackChannelType|null $channelType)
	{
	}
}
