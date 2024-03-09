<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Integration;
class SlackChannelConnectPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|Integration|null $integration, public Optional|bool $success, public Optional|bool $addBot, public Optional|bool|null $nudgeToConnectMainSlackIntegration, public Optional|bool|null $nudgeToUpdateMainSlackIntegration)
    {
    }
}
