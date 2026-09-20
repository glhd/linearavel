<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AgentSessionUpdateExternalUrlInput */
class AgentSessionUpdateExternalUrlInput
{
	public function __construct(
		public ?string $externalLink = null,
		/** @var iterable<AgentSessionExternalUrlInput>|Collection<int, AgentSessionExternalUrlInput> */
		public ?iterable $externalUrls = null,
		/** @var iterable<AgentSessionExternalUrlInput>|Collection<int, AgentSessionExternalUrlInput> */
		public ?iterable $addedExternalUrls = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $removedExternalUrls = null
	) {
	}
}
