<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/LinearAgentTrustedSourcesMode */
enum LinearAgentTrustedSourcesMode: string
{
	case none = 'none';
	case allowlist = 'allowlist';
}
