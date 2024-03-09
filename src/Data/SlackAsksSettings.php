<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\SlackChannelNameMapping, Illuminate\Support\Collection, Glhd\Linearavel\Data\UserRoleType;
class SlackAsksSettings extends Data
{
    function __construct(
        public Optional|string|null $teamName,
        public Optional|string|null $teamId,
        /** @var Collection<int, SlackChannelNameMapping> */
        public Collection $slackChannelMapping,
        public Optional|UserRoleType $canAdministrate
    )
    {
    }
}
