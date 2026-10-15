<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OrganizationCodingAgentSettingsInput */
class OrganizationCodingAgentSettingsInput
{
	public function __construct(
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $trustedExternalSources = null,
		public ?OrganizationCodingAgentTrustedSourceUpdateInput $trustedExternalSourceUpdate = null,
		public ?string $model = null,
		public ?string $effort = null,
		public ?bool $commitSigningEnabled = null,
		public ?string $sandboxSize = null,
		public ?bool $regionPinning = null
	) {
	}
}
