<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationQueryUpdatesToolCallArgsUpdateType */
enum AiConversationQueryUpdatesToolCallArgsUpdateType: string
{
	case ProjectUpdate = 'ProjectUpdate';
	case InitiativeUpdate = 'InitiativeUpdate';
}
