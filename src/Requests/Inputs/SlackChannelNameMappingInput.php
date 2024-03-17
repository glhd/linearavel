<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class SlackChannelNameMappingInput
{
	function __construct(
		public string $id,
		public string $name,
		/** @var Collection<int, SlackAsksTeamSettingsInput> */
		public Collection $teams,
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
