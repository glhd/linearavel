<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/SLAStartMode */
enum SLAStartMode: string
{
	case ruleMatch = 'ruleMatch';
	case issueCreation = 'issueCreation';
}
