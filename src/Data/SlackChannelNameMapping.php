<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\SlackAsksTeamSettings, Illuminate\Support\Collection;
class SlackChannelNameMapping extends Data
{
    function __construct(
        public Optional|string $id,
        public Optional|string $name,
        public Optional|bool|null $isPrivate,
        public Optional|bool|null $isShared,
        public Optional|bool|null $botAdded,
        /** @var Collection<int, SlackAsksTeamSettings> */
        public Collection $teams,
        public Optional|bool|null $autoCreateOnMessage,
        public Optional|bool|null $autoCreateOnEmoji,
        public Optional|bool|null $autoCreateOnBotMention,
        public Optional|string|null $autoCreateTemplateId
    )
    {
    }
}
