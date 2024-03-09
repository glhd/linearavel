<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SlackChannelNameMapping extends Data
{
	function __construct(
		public Optional|string $id,
		public Optional|string $name,
		public Optional|bool|null $isPrivate,
		public Optional|bool|null $isShared,
		public Optional|bool|null $botAdded,
		/** @var Collection<int, SlackAsksTeamSettings> */
		public Optional|Collection $teams,
		public Optional|bool|null $autoCreateOnMessage,
		public Optional|bool|null $autoCreateOnEmoji,
		public Optional|bool|null $autoCreateOnBotMention,
		public Optional|string|null $autoCreateTemplateId
	) {
	}
}
