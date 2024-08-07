<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/SlackChannelNameMappingInput */
class SlackChannelNameMappingInput
{
	public function __construct(
		public string $id,
		public string $name,
		/** @var iterable<SlackAsksTeamSettingsInput>|Collection<int, SlackAsksTeamSettingsInput> */
		public iterable $teams,
		public ?bool $isPrivate = null,
		public ?bool $isShared = null,
		public ?bool $botAdded = null,
		public ?bool $autoCreateOnMessage = null,
		public ?bool $autoCreateOnEmoji = null,
		public ?bool $autoCreateOnBotMention = null,
		public ?string $autoCreateTemplateId = null
	) {
	}
}
