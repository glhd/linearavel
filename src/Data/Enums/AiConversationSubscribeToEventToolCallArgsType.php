<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationSubscribeToEventToolCallArgsType */
enum AiConversationSubscribeToEventToolCallArgsType: string
{
	case once = 'once';
	case recurring = 'recurring';
}
