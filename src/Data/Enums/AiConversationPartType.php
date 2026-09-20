<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationPartType */
enum AiConversationPartType: string
{
	case prompt = 'prompt';
	case toolCall = 'toolCall';
	case reasoning = 'reasoning';
	case text = 'text';
	case event = 'event';
	case error = 'error';
	case widget = 'widget';
	case widgetPlaceholder = 'widgetPlaceholder';
	case elicitation = 'elicitation';
	case elicitationResponse = 'elicitationResponse';
	case ack = 'ack';
}
