<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationPostChatMessageToolCallArgsPlatform */
enum AiConversationPostChatMessageToolCallArgsPlatform: string
{
	case slack = 'slack';
	case microsoftTeams = 'microsoftTeams';
}
