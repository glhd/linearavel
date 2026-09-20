<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/TriageRuleErrorType */
enum TriageRuleErrorType: string
{
	case cycle = 'cycle';
	case default = 'default';
	case labelGroupConflict = 'labelGroupConflict';
	case codingAgentQuotaExceeded = 'codingAgentQuotaExceeded';
}
