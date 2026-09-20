<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationClientPlatform */
enum AiConversationClientPlatform: string
{
	case web = 'web';
	case desktop = 'desktop';
	case mobile = 'mobile';
}
