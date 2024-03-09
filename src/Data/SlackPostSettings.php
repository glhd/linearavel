<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\SlackChannelType;
class SlackPostSettings extends Data
{
    function __construct(public Optional|string $channel, public Optional|string $channelId, public Optional|string $configurationUrl, public Optional|SlackChannelType|null $channelType)
    {
    }
}
