<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationGetSlackConversationHistoryToolCallArgsTargetType */
enum AiConversationGetSlackConversationHistoryToolCallArgsTargetType: string
{
	case channel = 'channel';
	case thread = 'thread';
}
