<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationElicitationKind */
enum AiConversationElicitationKind: string
{
	case multipleChoice = 'multipleChoice';
	case mcpServerConnection = 'mcpServerConnection';
	case integrationConnection = 'integrationConnection';
	case confirmation = 'confirmation';
	case entitySelection = 'entitySelection';
}
