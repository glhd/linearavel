<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AgentSessionCreateOnComment */
class AgentSessionCreateOnCommentInput
{
	public function __construct(
		public string $commentId,
		public ?string $externalLink = null,
		/** @var iterable<AgentSessionExternalUrlInput>|Collection<int, AgentSessionExternalUrlInput> */
		public ?iterable $externalUrls = null
	) {
	}
}
