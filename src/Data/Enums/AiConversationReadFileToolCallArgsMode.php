<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationReadFileToolCallArgsMode */
enum AiConversationReadFileToolCallArgsMode: string
{
	case read = 'read';
	case search = 'search';
}
