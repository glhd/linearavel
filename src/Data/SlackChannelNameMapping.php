<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/SlackChannelNameMapping */
class SlackChannelNameMapping extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|string $name,
		/** @var Collection<int, SlackAsksTeamSettings> */
		public Optional|Collection $teams,
		public Optional|bool|null $isPrivate,
		public Optional|bool|null $isShared,
		public Optional|bool|null $botAdded,
		public Optional|bool|null $autoCreateOnMessage,
		public Optional|bool|null $autoCreateOnEmoji,
		public Optional|bool|null $autoCreateOnBotMention,
		public Optional|string|null $autoCreateTemplateId
	) {
	}
}
