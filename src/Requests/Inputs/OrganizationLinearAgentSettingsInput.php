<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\LinearAgentMcpServersMode;
use Glhd\Linearavel\Data\Enums\LinearAgentTrustedSourcesMode;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OrganizationLinearAgentSettingsInput */
class OrganizationLinearAgentSettingsInput
{
	public function __construct(
		public ?bool $webSearchEnabled = null,
		public ?bool $mcpServersEnabled = null,
		public ?LinearAgentMcpServersMode $mcpServersMode = null,
		/** @var iterable<OrganizationLinearAgentMcpServerAllowlistEntryInput>|Collection<int, OrganizationLinearAgentMcpServerAllowlistEntryInput> */
		public ?iterable $mcpServersAllowlist = null,
		public ?LinearAgentTrustedSourcesMode $trustedSourcesMode = null,
		/** @var iterable<OrganizationLinearAgentTrustedSourcesAllowlistEntryInput>|Collection<int, OrganizationLinearAgentTrustedSourcesAllowlistEntryInput> */
		public ?iterable $trustedSourcesAllowlist = null
	) {
	}
}
