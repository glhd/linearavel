<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationMcpServerConnectionScopeType */
enum AiConversationMcpServerConnectionScopeType: string
{
	case user = 'user';
	case team = 'team';
	case workflowDefinition = 'workflowDefinition';
	case workflowDefinitionDraft = 'workflowDefinitionDraft';
}
