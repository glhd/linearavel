<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/LinearAgentMcpServersMode */
enum LinearAgentMcpServersMode: string
{
	case all = 'all';
	case allowlist = 'allowlist';
}
