<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/DocumentContentAgentCheckpointMode */
enum DocumentContentAgentCheckpointMode: string
{
	case draft = 'draft';
	case live = 'live';
}
