<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AgentSessionCreateOnIssue */
class AgentSessionCreateOnIssueInput
{
	public function __construct(
		public string $issueId,
		public ?string $externalLink = null,
		/** @var iterable<AgentSessionExternalUrlInput>|Collection<int, AgentSessionExternalUrlInput> */
		public ?iterable $externalUrls = null
	) {
	}
}
