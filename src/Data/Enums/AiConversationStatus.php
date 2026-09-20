<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationStatus */
enum AiConversationStatus: string
{
	case active = 'active';
	case complete = 'complete';
	case awaitingInput = 'awaitingInput';
	case error = 'error';
	case pending = 'pending';
	case waiting = 'waiting';
}
