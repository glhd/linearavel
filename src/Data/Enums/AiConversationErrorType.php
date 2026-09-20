<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationErrorType */
enum AiConversationErrorType: string
{
	case billing = 'billing';
	case usageLimit = 'usageLimit';
	case untrustedSources = 'untrustedSources';
	case unknown = 'unknown';
}
