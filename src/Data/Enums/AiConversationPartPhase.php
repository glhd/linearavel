<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationPartPhase */
enum AiConversationPartPhase: string
{
	case commentary = 'commentary';
	case answer = 'answer';
}
