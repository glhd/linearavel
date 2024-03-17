<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SlackChannelNameMapping extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|string $name,
		/** @var Collection<int, SlackAsksTeamSettings> */
		public Optional|Collection $teams,
		public Optional|bool|null $isPrivate = null,
		public Optional|bool|null $isShared = null,
		public Optional|bool|null $botAdded = null,
		public Optional|bool|null $autoCreateOnMessage = null,
		public Optional|bool|null $autoCreateOnEmoji = null,
		public Optional|bool|null $autoCreateOnBotMention = null,
		public Optional|string|null $autoCreateTemplateId = null
	) {
	}
}
