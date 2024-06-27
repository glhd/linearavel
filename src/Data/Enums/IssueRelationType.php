<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/IssueRelationType */
enum IssueRelationType: string
{
	case blocks = 'blocks';
	case duplicate = 'duplicate';
	case related = 'related';
}
