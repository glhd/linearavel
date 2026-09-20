<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AgentSessionUpdateInput */
class AgentSessionUpdateInput
{
	public function __construct(
		public ?string $summary = null,
		public ?string $externalLink = null,
		/** @var iterable<AgentSessionExternalUrlInput>|Collection<int, AgentSessionExternalUrlInput> */
		public ?iterable $externalUrls = null,
		/** @var iterable<AgentSessionExternalUrlInput>|Collection<int, AgentSessionExternalUrlInput> */
		public ?iterable $addedExternalUrls = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $removedExternalUrls = null,
		public ?string $plan = null,
		public ?DateTimeInterface $dismissedAt = null,
		/** @var iterable<AgentSessionUserStateInput>|Collection<int, AgentSessionUserStateInput> */
		public ?iterable $userState = null
	) {
	}
}
