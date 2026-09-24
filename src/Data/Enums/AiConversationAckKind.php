<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationAckKind */
enum AiConversationAckKind: string
{
	case done = 'done';
	case skipped = 'skipped';
	case ignored = 'ignored';
	case waiting = 'waiting';
}
