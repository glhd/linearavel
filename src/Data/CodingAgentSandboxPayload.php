<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/CodingAgentSandboxPayload */
class CodingAgentSandboxPayload extends Data
{
	public function __construct(
		public Optional|string $agentSessionId,
		/** @var Collection<int, CodingAgentSandboxEntry> */
		public Optional|Collection $sandboxes,
		public Optional|string|null $datadogLogsUrl,
		public Optional|string|null $temporalWorkflowsUrl
	) {
	}
}
